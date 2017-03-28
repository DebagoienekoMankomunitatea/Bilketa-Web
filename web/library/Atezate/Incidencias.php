<?php
namespace Atezate;
use Atezate\Mapper\Sql as Mapper;
use Atezate\Model as Model;

class Incidencias
{
    const HORA_LLAMADA_INICIO = '10';
    const HORA_LLAMADA_FINAL = '20';

    protected $_activarLlamadas = false;

    protected $_idIncidencia;
    protected $_mapper;

    private $_incidencia;
    private $_tipoIncidencia;

    private $_configuration;

    public function __construct()
    {
        $this->_mapper = new Mapper\Incidencias;
        $bootstrap = \Zend_Controller_Front::getInstance()->getParam('bootstrap');

        if (is_null($bootstrap)) {
            $conf = new \Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini',APPLICATION_ENV);
            $conf = $conf->toArray();
        } else {
            $conf = $bootstrap->getOptions();
        }

        $this->_configuration = $conf;
    }

    public function activarLlamadas ($activar)
    {
        $this->_activarLlamadas = (boolean) $activar;
    }

    public function getLlamadasActivadas()
    {
        return $this->_activarLlamadas;
    }

    public function setIdIncidencia($id)
    {
        $this->_idIncidencia = $id;
        return $this;
    }

    public function getIdIncidencia()
    {
        return $this->_idIncidencia;
    }

    public function gestionarIncidenciaAutomatica()
    {
        $ordenResolucion = $this->_getOrdenResolucion();
        if (!$ordenResolucion) {
            return false;
        }

        $numItemsResolucion = count($ordenResolucion);
        for ($i=1; $i <= $numItemsResolucion; $i++) {

            $resuelta = false;
            foreach ($ordenResolucion[$i] as $opcion) {

                switch ($opcion) {
                    // Las incidencias telefónicas se realizan asincronamente
                    case 'telefono':
                        if (count($ordenResolucion[$i]) == 1) {
                            //Nos salimos y dejamos la llamada en manos del daemon
                            if ($this->getLlamadasActivadas()) {
                                $resuelta = $this->lanzarLlamada();
                            }

                            return true;
                        }
                        break;
                    case 'sms':
                        $resuelta = $this->enviarSms();
                        break;
                    case 'email':
                        $resuelta = $this->enviarEmail();
                        break;
                }
            }

            if ($resuelta === true) {
                $this->resolverIncidencia();
                return true;
            }
        }

        return false;
    }

    protected function _getOrdenResolucion()
    {
        if (!$this->_loadIncidencia()) {
            return false;
        }
        if (!$this->_loadTipoIncidencia()) {
            return false;
        }

        $ordenResolucion = array();
        if (
            ($prioridad = $this->_tipoIncidencia->getPlantillasEmailPrioridad())
            && $this->_tipoIncidencia->getPlantillasEmail()
        ) {
            if (! array_key_exists($prioridad, $ordenResolucion)) {
                $ordenResolucion[$prioridad] = array();
            }
            $ordenResolucion[$prioridad][] = 'email';
        }

        if (
            ($prioridad = $this->_tipoIncidencia->getPlantillasSmsPrioridad())
            && $this->_tipoIncidencia->getPlantillasSms()
        ) {
            if (! array_key_exists($prioridad, $ordenResolucion)) {
                $ordenResolucion[$prioridad] = array();
            }
            $ordenResolucion[$prioridad][] = 'sms';
        }

        if (
            ($prioridad = $this->_tipoIncidencia->getPlantillasTelefonoPrioridad())
            && $this->_tipoIncidencia->getPlantillasTelefono()
        ) {
            if (! array_key_exists($prioridad, $ordenResolucion)) {
                $ordenResolucion[$prioridad] = array();
            }
            $ordenResolucion[$prioridad][] = 'telefono';
        }

        return $ordenResolucion;
    }

    protected function _checkValidMailingConfiguration()
    {
        if (!$this->_configuration) {
            return false;
        }
        if (! array_key_exists('resources', $this->_configuration)) {
            return false;
        }
        if (! array_key_exists('mail', $this->_configuration['resources'])) {
            return false;
        }
        if (! array_key_exists('from', $this->_configuration['resources']['mail'])) {
            return false;
        }
        if (empty($this->_configuration['resources']['mail']['from'])) {
            return false;
        }
        if (! array_key_exists('fromName', $this->_configuration['resources']['mail'])) {
            return false;
        }

        return true;
    }

    public function enviarEmail()
    {
        if (!$this->_checkValidMailingConfiguration()) {
            return false;
        }
        if (!$this->_loadIncidencia()) {
            return false;
        }
        if (!$this->_loadTipoIncidencia()) {
            return false;
        }

        $plantillaEmail = $this->_tipoIncidencia->getPlantillasEmail();
        if (!$plantillaEmail) {
            return false;
        }

        $contribuyente = $this->_incidencia->getContribuyente();
        $emails = $contribuyente->getEmails();

        $emailsStr = array();
        foreach ($emails as $email) {
            $emailsStr[] = $email->getEmail();
        }

        if (count($emails) < 1) {
            return false;
        }

        $mailer = new \Zend_Mail('UTF-8');
        $mailer->setSubject($plantillaEmail->getAsunto());
        $mailer->setBodyText($plantillaEmail->getMensaje());
        $mailer->setFrom(
            $this->_configuration['resources']['mail']['from'],
            $this->_configuration['resources']['mail']['fromName']
        );

        for ($i=0; $i < count($emailsStr); $i++) {
            if ($i == 0) {
                $mailer->addTo($emailsStr[$i], $contribuyente->getNombre());
            } else {
                $mailer->addCc($emailsStr[$i], $contribuyente->getNombre());
            }
        }

        $response = $mailer->send();

        $logLlamada = new Model\LogEmails;
        $logLlamada->setIncidenciaId($this->getIdIncidencia())
                   ->setEmail(implode(", ", $emailsStr))
                   ->setAsunto($plantillaEmail->getAsunto())
                   ->setMensaje($plantillaEmail->getMensaje())
                   ->save();

        return $response;
    }

    protected function _checkValidSmsConfiguration()
    {
        if (!$this->_configuration) {
            return false;
        }
        if (! array_key_exists('services', $this->_configuration)) {
            return false;
        }
        if (! array_key_exists('sms', $this->_configuration['services'])) {
            return false;
        }
        if (! array_key_exists('user', $this->_configuration['services']['sms'])) {
            return false;
        }
        if (empty($this->_configuration['services']['sms']['user'])) {
            return false;
        }
        if (! array_key_exists('passwd', $this->_configuration['services']['sms'])) {
            return false;
        }
        if (empty($this->_configuration['services']['sms']['passwd'])) {
            return false;
        }
        if (! array_key_exists('from', $this->_configuration['services']['sms'])) {
            return false;
        }
        if (empty($this->_configuration['services']['sms']['from'])) {
            return false;
        }

        return true;
    }

    public function enviarSms()
    {
        if (!$this->_checkValidSmsConfiguration()) {
            return false;
        }
        if (!$this->_loadIncidencia()) {
            return false;
        }
        if (!$this->_loadTipoIncidencia()) {
            return false;
        }
        $plantillaSms = $this->_tipoIncidencia->getPlantillasSms();
        if (!$plantillaSms) {
            return false;
        }

        $contribuyente = $this->_incidencia->getContribuyente();

        if (!$contribuyente) {
            return false;
        }

        $telefonosMoviles = array();
        $telefonos = $contribuyente->getTelefonos();

        foreach ($telefonos as $telefono) {
            if ($telefono->getTipo() == 'movil') {
                $telefonosMoviles[] = $telefono;
            }
        }

        if (empty($telefonosMoviles)) {
            return false;
        }

        shuffle($telefonosMoviles);
        $telefono = current($telefonosMoviles);

        $user = $this->_configuration['services']['sms']['user'];
        $pass = $this->_configuration['services']['sms']['passwd'];

        $text = urlencode($plantillaSms->getMensaje());
        $remite = urlencode($this->_configuration['services']['sms']['from']);
        $number = $telefono->getTelefono();
        $format = 'json';
        $dc = '1';

        $response = file_get_contents("http://sms.irontec.com/api/send.php?u=" . $user . "&p=" . $pass . "&t=" . $text . "&r=" . $remite . "&n=" . $number . "&f=" . $format . "&dc=" . $dc);
        $response = json_decode($response);

        if ($response->result->code == 1) {

            $logLlamada = new Model\LogSms;
            $logLlamada->setIncidenciaId($this->getIdIncidencia())
                       ->setTelefono($telefono->getTelefono())
                       ->setPlantillasSmsId($plantillaSms->getPrimaryKey())
                       ->setMensaje($plantillaSms->getMensaje())
                       ->save();
        }

        return $response->result->code == 1;
    }

    protected function _horarioLlamadaValido()
    {
        $horaActual = date("H");
        if ($horaActual <= self::HORA_LLAMADA_FINAL && $horaActual >= self::HORA_LLAMADA_INICIO) {
            return true;
        }

        return false;
    }

    public function lanzarLlamada()
    {
        if (!$this->_horarioLlamadaValido()) {
            return false;
        }
        if (!$this->_loadIncidencia()) {
            return false;
        }
        if (!$this->_loadTipoIncidencia()) {
            return false;
        }

        $plantillaTelefono = $this->_tipoIncidencia->getPlantillasTelefono();
        if (!$plantillaTelefono) {
            return false;
        }

        $locucion = $plantillaTelefono->fetchEsLocCodificado();
        if (!$locucion || !$locucion->getBaseName()) {
            return false;
        }

        $pathLocucion = 'es/' . str_replace($locucion->getStoragePath(), '', $locucion->getFilePath());
        $extension = pathinfo($pathLocucion, PATHINFO_EXTENSION);
        if ($extension) {
            $pathLocucion = substr($pathLocucion, 0, (strlen($extension)*-1)-1);
        }

        $contribuyente = $this->_incidencia->getContribuyente();

        if (!$contribuyente) {
            return false;
        }

        $telefonos = $contribuyente->getTelefonos();

        if (empty($telefonos)) {
            return false;
        }

        shuffle($telefonos);
        $telefono = current($telefonos);

        $dialerView = new \Zend_View();
        $dialerView->number = $telefono->getTelefono();
        $dialerView->pk = $this->_incidencia->getPrimaryKey();
        $dialerView->locucion = $pathLocucion;

        $dialerView->addScriptPath(APPLICATION_PATH . '/views/scripts/');
        $plantilla = $dialerView->render('plantilla/dialer.phtml');

        $tmpfName = "dialer" . $this->_incidencia->getPrimaryKey();

        file_put_contents('/tmp/' . $tmpfName, $plantilla);
        chmod('/tmp/' . $tmpfName, 0777);

        exec("sh " . APPLICATION_PATH . "/bin/rsyncCaller.sh " . escapeshellarg($tmpfName));
        unlink('/tmp/' . $tmpfName);
    }


    public function resolverIncidencia($solucion = 'automatico')
    {
        if (!$this->getIdIncidencia()) {
            return false;
        }

        $this->_incidencia = $this->_mapper->find($this->getIdIncidencia());

        if (!$this->_incidencia) {
            return false;
        }

        return $this->_incidencia->setSolucionada($solucion)->save();
    }

    public function registrarLlamada($contactado = true, $telefono)
    {
        if (!$this->_loadIncidencia()) {
            return false;
        }

        if (!$this->_loadTipoIncidencia()) {
            return false;
        }

        $plantillaTelefono = $this->_tipoIncidencia->getPlantillasTelefono();

        if (!$plantillaTelefono) {
            return false;
        }

        $logLlamada = new Model\LogLlamadas;
        $logLlamada->setIncidenciaId($this->getIdIncidencia())
                   ->setDia(date("Y-m-d"))
                   ->setHora(date("H:i:s"))
                   ->setContactado(intval($contactado))
                   ->setTelefono($telefono)
                   ->setPlantillasTelefonoId($plantillaTelefono->getPrimaryKey())
                   ->save();
    }

    protected function _loadIncidencia()
    {
        if (!$this->getIdIncidencia()) {
            return false;
        }

        $this->_incidencia = $this->_mapper->find($this->getIdIncidencia());
        return !is_null($this->_incidencia);
    }

    protected function _loadTipoIncidencia()
    {
        if (!$this->_incidencia) {
            return false;
        }

        $this->_tipoIncidencia = $this->_incidencia->getTipo();
        return !is_null($this->_tipoIncidencia);
    }
}

