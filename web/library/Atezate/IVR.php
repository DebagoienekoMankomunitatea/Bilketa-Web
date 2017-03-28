<?php
namespace Atezate;
use Atezate\Mapper\Sql as Mapper;
use Atezate\Model as Model;

class IVR
{
    protected $_did;
    protected $_contribuyenteIden;

    protected $_zipCode;
    protected $_codigoApertura;

    protected $_language;

    /**
     * @var \Atezate\Model\Contribuyentes
     */
    protected $_contribuyente;

    /**
     * @var \Atezate\Model\Telefonos
     */
    protected $_telefono;

    /**
     * @var \Atezate\Model\Municipios
     */
    protected $_municipioDescarga;

    /**
     * Atezate\Mapper\Sql\Locuciones
     */
    private $_locucionesMapper;

    public function __construct($did = null)
    {
        if ($did) {
            $this->setDid($did);
        }

        $this->_locucionesMapper = new Mapper\Locuciones;
    }

    //////////////////////////////////////////////////////////////////////////////
    //                               métodos públicos
    //////////////////////////////////////////////////////////////////////////////
    /**
     * @return boolean
     */
    public function contribuyenteConocido()
    {
        return ($this->_contribuyente instanceof \Atezate\Model\Contribuyentes);
    }

    /**
     * @return boolean
     */
    public function didContribuyenteConocido()
    {
        return ($this->_telefono instanceof \Atezate\Model\Telefonos);
    }

    /**
     * @return integer PrimaryKey
     */
    public function asociarDidAlContribuyente()
    {
        if (! $this->getDid()) {
            return;
        }

        $telefono = new Model\Telefonos;
        return $telefono->setContribuyenteId($this->_contribuyente->getPrimaryKey())
                        ->setTelefono($this->getDid())
                        ->setTipo('fijo') //TODO regexp movil|fijo
                        ->save();
    }

    /**
     * @return null |
     */
    public function getMunicipioDescarga()
    {
        if (! $this->_municipioDescarga) {
            if (! $this->getZipCode()) {
                $municipio = $this->_getMunicipioDescargaHabitual();
            } else {
                $municipio = $this->_getMunicipioDescargaByZipCode();
            }

            if ($municipio) {
                $this->_municipioDescarga = $municipio;
            }
        }

        return $this->_municipioDescarga;
    }

    /**
     * @return string
     */
    public function getCodigoApertura()
    {
        if ($this->_codigoApertura) {
            return $this->_codigoApertura;
        }

        $codigosPrivados = $this->_getCodigosAperturaPrivados();

        while (true) {
            $this->_codigoApertura = $this->_generarCodigoApertura();
            if (!in_array($this->_codigoApertura, $codigosPrivados)) {
                break;
            }
        }

        return $this->_codigoApertura;
    }

    protected function _getCodigosAperturaPrivados()
    {
        $where = '"municipioId" is null ';
        $municipio = $this->getMunicipioDescarga();
        if ($municipio) {
            $where .= ' or "municipioId" = ' . intval($municipio->getMunicipioId());    
        }

        $codigosAperturaPrivadosMapper = new Mapper\CodigosAperturaPrivados;
        $codigosAperturaPrivados = $codigosAperturaPrivadosMapper->fetchList($where);
        $codigosPrivados = array();

        foreach ($codigosAperturaPrivados as $codigo) {
            $codigosPrivados[] = $codigo->getCodigoApertura();
        }

        return $codigosPrivados;     
    }

    protected function _generarCodigoApertura()
    {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * @return bool
     */
    public function confirmarCodigoApertura()
    {
        if (!$this->_codigoApertura) {
            throw new \Exception("Codigo de apertura vacío");
        }

        $centrosEmergencia = array();
        $municipio = $this->getMunicipioDescarga();

        foreach ($municipio->getPuntosRecogida() as $puntoRecogida) {
            foreach ($puntoRecogida->getCentrosEmergencia() as $centro) {
                $centrosEmergencia[] = $centro;
            }
        }

        if (count($centrosEmergencia) < 1) {
            throw new \Exception("Ningún centro de emergencia localizado");
        }

        $openTime = new \DateTime(date("Y-m-d H:i:s", time()), new \DateTimeZone('Europe/Madrid'));
        $closeTime = new \DateTime(date("Y-m-d H:i:s", time()+60*60*24), new \DateTimeZone('Europe/Madrid'));

        $puerta = new \Atezate\Puertas;
        $puerta->setCode($this->_codigoApertura);

        $puerta->setOpenTime($openTime);
        $puerta->setCloseTime($closeTime);

        foreach ($centrosEmergencia as $centroEmergencia) {

            $success = false;
            $puerta->setIp($centroEmergencia->getIp());
            $puerta->setPort($centroEmergencia->getPuerto());

            if ($puerta->abrir()) {
                $success = true;
            }

            $openTime->setTimezone(new \DateTimeZone('UTC'));

            $codigosApertura = new Model\CodigosApertura;
            $codigosApertura->setFechaLlamada($openTime)
                            ->setContribuyenteId($this->getContribuyente()->getPrimaryKey())
                            ->setCodigoApertura($this->_codigoApertura)
                            ->setCentroEmergenciaId($centroEmergencia->getPrimaryKey())
                            ->setMunicipioId($municipio->getPrimaryKey())
                            ->setActivado(intval($success))
                            ->save();
        }

        return $success;
    }

    //////////////////////////////////////////////////////////////////////////////
    //                             locuciones
    //////////////////////////////////////////////////////////////////////////////

    /**
     * @return \Atezate\IVR\Locuciones
     */
    private function _fetchLocucionPath($iden)
    {
        $locucionModel = $this->_locucionesMapper->findOneByField('iden', $iden);
        if (!$locucionModel) {
            Throw new \Exception("Locucion $iden not found");
        }

        $fsoFetcher = $this->_getEncodedLocucionFetcherName();
        $file = $locucionModel->$fsoFetcher();

        if (!$file) {
            Throw new \Exception("Locucion $iden not found");
        }

        if (! $file->getBaseName()) {
            Throw new \Exception("Locucion $iden not found");
        }

        $path = $this->getLanguage() . '/' . str_replace($file->getStoragePath(), '', $file->getFilePath());
        return $this->_limpiarExtension($path);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    private function _fetchLocucionMunicipio()
    {
        if (!$this->_municipioDescarga) {
            Throw new \Exception("Municipio desconocido, imposible cargar su locución");
        }

        switch($this->getLanguage()) {
            case 'es':
                $fsoFetcher = 'fetchEsLocCodificado';
                break;
            default:
                $fsoFetcher = 'fetchEuLocCodificado';
                break;
        }

        $file = $this->_municipioDescarga->$fsoFetcher();

        if (!$file) {
            Throw new \Exception("Locucion de ". $this->_municipioDescarga->getMunicipio() ." not found");
        }

        if (! $file->getBaseName()) {
            Throw new \Exception("Locucion de ". $this->_municipioDescarga->getMunicipio() ." not found");
        }

        $path = str_replace($file->getStoragePath(), '', $file->getFilePath());
        return $this->_limpiarExtension($path);
    }


    private function _limpiarExtension($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if (!$extension) {
            return $file;
        }

        return substr($file, 0, (strlen($extension)*-1)-1);
    }

    public function getLocucionSeleccionarIdioma()
    {
        $path = 'eu' . $this->_fetchLocucionPath('seleccionarIdioma');
        $datos = array(
            $path => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    public function getLocucionEspere()
    {
        $path = $this->_fetchLocucionPath('Espere');
        $datos = array(
        $path => 'playback'
        );
        return new \Atezate\IVR\Locuciones($datos);
    }


    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionInsertarCodCliente()
    {
        $path = $this->_fetchLocucionPath('insertarCodCliente');
        $datos = array(
            $path => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionConfirmarCentro()
    {
        $municipio = $this->getMunicipioDescarga();
        if (! $municipio) {
            return null;
        }

        $datos = array(
            $this->_fetchLocucionPath('entradillaConfirmarCentro') => 'playback',
            $this->getLanguage() . '/' . $this->_fetchLocucionMunicipio() => 'playback',
            $this->_fetchLocucionPath('finalConfirmarCentro') => 'playback',
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionMarqueCodPostal()
    {
        $datos = array(
            $this->_fetchLocucionPath('marqueCodPostal')  => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionReintentar()
    {
        $datos = array(
            $this->_fetchLocucionPath('reintentar') => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionConfirmarCodApertura()
    {
        $codigo = $this->getCodigoApertura();
        $datos = array(
            $this->_fetchLocucionPath('entradillaConfirmarCodApertura')  => 'playback',
            $codigo => 'digit',
            $this->_fetchLocucionPath('finalConfirmarCodApertura') => 'playback',
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionConfirmado()
    {
        $datos = array(
            $this->_fetchLocucionPath('codAperturaConfirmado') => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionAsociarDid()
    {
        $datos = array(
            $this->_fetchLocucionPath('asociarDid') => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionDespedida()
    {
        $datos = array(
            $this->_fetchLocucionPath('despedida') => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionCodPostalInvalido()
    {
        $datos = array(
            $this->_fetchLocucionPath('codPostalInvalido') => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    /**
     * @return \Atezate\IVR\Locuciones
     */
    public function getLocucionProblemasTecnicos()
    {
        $datos = array(
            $this->_fetchLocucionPath('problemasTecnicos') => 'playback'
        );

        return new \Atezate\IVR\Locuciones($datos);
    }

    //////////////////////////////////////////////////////////////////////////////
    //                             métodos privados
    //////////////////////////////////////////////////////////////////////////////
    protected function _getMunicipioDescargaHabitual ()
    {
        if (! $this->contribuyenteConocido()) {
            return null;
        }

        $municipio = $this->_contribuyente->getMunicipio();

        if (!$municipio) {
            return null;
        }

        foreach ($municipio->getPuntosRecogida() as $puntoRecogida) {
            if (count($puntoRecogida->getCentrosEmergencia()) > 0) {
                return $municipio;
            }
        }

        //TODO MunicipiosRelCercania
        return null;
    }


    /**
     * @return \Atezate\Model\Municipios
     */
    protected function _getMunicipioDescargaByZipCode()
    {
        $this->_municipioDescarga = null;

        if (!$this->getZipCode()) {
            return null;
        }

        $codigosPostalesMapper = new Mapper\CodigosPostales;
        $codigoPostal = $codigosPostalesMapper->findOneByField('codigoPostal', $this->getZipCode());

        if (!$codigoPostal) {
            return;
        }

        $municipiosRelCodigosPostales = $codigoPostal->getMunicipiosRelCodigosPostales();

        foreach ($municipiosRelCodigosPostales as $relacion) {
            $municipio = $relacion->getMunicipio();

            if (!$municipio) {
                continue;
            }

            foreach ($municipio->getPuntosRecogida() as $puntoRecogida) {
                if (count($puntoRecogida->getCentrosEmergencia()) > 0) {
                    return $municipio;
                }
            }

        }
    }

    protected function _getEncodedLocucionFetcherName()
    {
        $lang = empty($this->_language) ?  'eu' : $this->_language;
        return 'fetch' . ucfirst($lang) .  'LocCodificado';
    }

    //////////////////////////////////////////////////////////////////////////////
    //                      getters/setters objetos relacionados
    //////////////////////////////////////////////////////////////////////////////
    public function getContribuyente()
    {
        return $this->_contribuyente;
    }

    public function getTelefono()
    {
        return $this->_telefono;
    }

    //////////////////////////////////////////////////////////////////////////////
    //                              getters/setters
    //////////////////////////////////////////////////////////////////////////////
    public function setDid($did)
    {
        $this->_did = $did;

        $telefonosMapper = new Mapper\Telefonos;
        $this->_telefono = $telefonosMapper->findOneByField("telefono", $did);

        if ($this->_telefono ) {

            $this->_contribuyente = $this->_telefono->getContribuyente();
        }

        return $this;
    }

    public function getDid()
    {
        return $this->_did;
    }

    public function setContribuyenteIden($iden)
    {
        $this->_contribuyenteIden = $iden;

        if (!$this->_contribuyente || $this->_contribuyente->getContribuyenteIden() != $iden) {
            $contribuyentesMapper = new Mapper\Contribuyentes;
            $this->_contribuyente =  $contribuyentesMapper->findOneByField("contribuyenteIden", $iden);
        }

        return $this;
    }

    public function getContribuyenteIden()
    {
        return $this->_contribuyenteIden;
    }

    public function setZipCode($zipCode)
    {
        $this->_municipioDescarga = null;

        $codigosPostalesMapper = new Mapper\CodigosPostales;
        $codigoPostal = $codigosPostalesMapper->findOneByField('codigoPostal', $zipCode);

        if (! $codigoPostal) {
            return false;
        }

        $this->_zipCode = $zipCode;

        if (is_null($this->_getMunicipioDescargaByZipCode())) {
            $this->_zipCode = null;
            return false;
        } 

        return true;
    }

    public function getZipCode()
    {
        return $this->_zipCode;
    }

    public function setLanguage($language)
    {
        $this->_language = $language;
        return $this;
    }

    public function getLanguage()
    {
        return $this->_language;
    }
}

