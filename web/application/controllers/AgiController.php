<?php
class AgiController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->viewRenderer->setNoRender(true);
    }
    public function callfilehangupAction()
    {
        $uniqueId = $this->fastagi->get_variable("uniqueid");
        $uniqueId = $uniqueId['data'];
        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . " app starts!"
        );
        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . ", fastagi loaded: " . var_export(isset($this->fastagi), true)
        );
        $ID=$this->fastagi->get_variable("ID");
        $ID=$ID['data'];

        $numDestino = $this->fastagi->get_variable("DIDOUT");
        $numDestino = $numDestino['data'];

        $DIALSTATUS = $this->fastagi->get_variable("DIALSTATUS");
        $DIALSTATUS = $DIALSTATUS['data'];
        $this->_helper->Logger(
        $uniqueId,
        __FUNCTION__. '[' . __LINE__ . ']' . ", llamada: " . $ID ." con respuesta: ".$DIALSTATUS);

        $incidencia = new \Atezate\Incidencias();
        $incidencia->setIdIncidencia($ID)
                   ->registrarLlamada(false, $numDestino);
    }

    public function callfileansweredAction()
    {
        $uniqueId = $this->fastagi->get_variable("uniqueid");
        $uniqueId = $uniqueId['data'];
        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . " app starts!"
        );
        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . ", fastagi loaded: " . var_export(isset($this->fastagi), true)
        );
        $ID=$this->fastagi->get_variable("ID");
        $ID=$ID['data'];

        $numDestino = $this->fastagi->get_variable("DIDOUT");
        $numDestino = $numDestino['data'];

        $DIGITOPULSADO = $this->fastagi->get_variable("DIGITOPULSADO");
        $DIGITOPULSADO = $DIGITOPULSADO['data'];
        $DURATION = $this->fastagi->get_variable("CDR(duration)");
        $DURATION = $DURATION['data'];
        $DIALSTATUS = "ANSWERED";

          $this->_helper->Logger(
          $uniqueId,
          __FUNCTION__. '[' . __LINE__ . ']' . ", llamada: " . $ID ." con respuesta: ".$DIALSTATUS ." duracion de ".$DURATION." segundos y ha pulsado el digito ".$DIGITOPULSADO);

        $incidencia = new \Atezate\Incidencias();
        $incidencia->setIdIncidencia($ID)
                   ->registrarLlamada(true, $numDestino);

        $incidencia->resolverIncidencia();
    }

    public function indexAction()
    {
        $uniqueId = $this->fastagi->get_variable("uniqueid");
        $uniqueId = $uniqueId['data'];
        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . " app starts!"
        );
        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . ", fastagi loaded: " . var_export(isset($this->fastagi), true)
        );

        $did_cliente = $this->fastagi->get_Variable("CALLERID(num)");
        $did_cliente = $did_cliente['data'];

        $ivr = new \Atezate\IVR();
        $ivr->setDid($did_cliente);
        $locIdioma = $ivr->getLocucionSeleccionarIdioma();
        $read_locucion = $locIdioma->getLocucion()->getPath();

        /////////////////////////
        //seleccionamos idiomas//
        /////////////////////////
        $this->fastagi->exec("Read","IDIOMA,/var/lib/asterisk/sounds/es/locuciones/atezate/".$read_locucion.",1,,,5");
        $estado=$this->readcontrol();
        $idioma=$this->fastagi->get_variable("IDIOMA");
        $idioma=$idioma['data'];
        if ($idioma=="2") {
            $ivr->setLanguage('es'); //selección de idioma Castellano
        } else {
            $this->fastagi->exec("SET","CHANNEL(language)=eu");
            $ivr->setLanguage('eu'); //selección de idioma Euskera
        }

        //////////////////////////////////////////////////////////
        //Si no es contribuyente conocido pregunto CODIGOCLIENTE//
        //////////////////////////////////////////////////////////
        $numMaximoIntentos=0;
        while (!$ivr->contribuyenteConocido()) {
            if ($numMaximoIntentos>1) {
                $locError=$ivr->getLocucionReintentar();
                $playback_locucion=$locError->getLocucion()->getPath();
                $this->fastagi->exec("Playback","/var/lib/asterisk/sounds/es/locuciones/atezate/".$playback_locucion);
                exit;
            }
            $numMaximoIntentos++;
            $locCodCliente = $ivr->getLocucionInsertarCodCliente();
            $read_locucion=$locCodCliente->getLocucion()->getPath();
            //seleccionamos idiomas
            $this->fastagi->exec("Read","CODIGOCLIENTE,/var/lib/asterisk/sounds/es/locuciones/atezate/".$read_locucion.",12,,,7");
            $estado=$this->readcontrol();
            $codigocliente=$this->fastagi->get_variable("CODIGOCLIENTE");
            $codigocliente=$codigocliente['data'];
            $ivr->setContribuyenteIden($codigocliente); //pedir cod. Cliente

        }

        ////////////////////////
        //¿Confirmamos CENTRO?//
        ////////////////////////
        $numMaximoIntentos=0;
        $centroConfirmado=$this->confirmacentro($ivr);

        /////////////////////////////////////////////////////////////////////////////
        //Si no hay confirmación preguntamos CODIGO POSTAL y confirmacion de centro//
        /////////////////////////////////////////////////////////////////////////////
        while(!$centroConfirmado) {
            if ($numMaximoIntentos>1) {
                $loc_play=$ivr->getLocucionReintentar()->getLocucion()->getPath();
                $this->fastagi->exec("Playback","/var/lib/asterisk/sounds/es/locuciones/atezate/".$loc_play);
                exit;
            }

            $locCodPostal = $ivr->getLocucionMarqueCodPostal();
            $read_locucion=$locCodPostal->getLocucion()->getPath();
            //seleccionamos codigo postal de otro pueblo
            $this->fastagi->exec("Read","CODIGOPOSTAL,/var/lib/asterisk/sounds/es/locuciones/atezate/".$read_locucion.",5,,,5");
            $estado=$this->readcontrol();
            if ($estado=="OK") {
                $codigopostal=$this->fastagi->get_variable("CODIGOPOSTAL");
                $codigopostal=$codigopostal['data'];
                $codValido = $ivr->setZipCode($codigopostal); //validar cod. Postal
            } else {
                $codValido=false;
            }

            if (!$codValido) {
                $locucionError = $ivr->getLocucionCodPostalInvalido();
                $playback_locucion=$locucionError->getLocucion()->getPath();
                $this->fastagi->exec("playback","/var/lib/asterisk/sounds/es/locuciones/atezate/".$playback_locucion);
                $numMaximoIntentos++;
                continue;
            }
            ////////////////////////
            //¿Confirmamos CENTRO?//
            ////////////////////////
            $numMaximoIntentos=0;
            $centroConfirmado=$this->confirmacentro($ivr);
        }


        /////////////////////
        //CENTRO confirmado//
        /////////////////////
        $codigoConfirmado=$this->confirmacodigo($ivr);

        ////////////////////////
        //¿Confirmamos CODIGO?//
        ////////////////////////
        while(!$codigoConfirmado) { //Confirmado
            $codigoConfirmado = $this->confirmacodigo($ivr);
        }

        /////////////////////
        //CODIGO confirmado//
        /////////////////////
        $locConfirmado=$ivr->getLocucionConfirmado();
        $playback_locucion=$locConfirmado->getLocucion()->getPath();
        $this->fastagi->exec("Playback","/var/lib/asterisk/sounds/es/locuciones/atezate/".$playback_locucion);

        //////////////////
        //¿DID conocido?//
        //////////////////
        if (! $ivr->didContribuyenteConocido()) {
            $locAsociarDid = $ivr->getLocucionAsociarDid();
            $read_locucion = $locAsociarDid->getLocucion()->getPath();
            //seleccionamos codigo postal de otro pueblo
            $this->fastagi->exec("Read","DID_SAVE,/var/lib/asterisk/sounds/es/locuciones/atezate/".$read_locucion.",1,,,5");
            $didSave = $this->fastagi->get_variable("DID_SAVE");
            $didSave = $didSave['data'];

            if ($didSave == "1") { //Acepta asociar número y contribuyente
                //////////////////////////////////////////////
                //Se gurada el DID asociado al contribuyente//
                /////////////////////////////////////////////
                $ivr->asociarDidAlContribuyente();
            }
        }

        /////////////////////////////
        //FIN locucion de despedida//
        /////////////////////////////

        $locDespedida = $ivr->getLocucionDespedida();
        $playback_locucion = $locDespedida->getLocucion()->getPath();
        $this->fastagi->exec("Playback","/var/lib/asterisk/sounds/es/locuciones/atezate/".$playback_locucion);

        $this->_helper->Logger(
            $uniqueId,
            __FUNCTION__. '[' . __LINE__ . ']' . " app ends!"
        );
    }

    protected function confirmacentro($ivr)
    {
        //pregunto confirmacion
        $centroConfirmado = false;
        $locConfirmarCentro = $ivr->getLocucionConfirmarCentro();
        if ($locConfirmarCentro) {
            $read_locucion=null;
            foreach ($locConfirmarCentro->getLocuciones() as $locucion) {
                if (!$locucion->isDigit()) {
                    if (is_null($read_locucion)) {
                        $read_locucion="/var/lib/asterisk/sounds/es/locuciones/atezate/".$locucion->getPath();
                    } else {
                        $read_locucion.="&/var/lib/asterisk/sounds/es/locuciones/atezate/".$locucion->getPath();
                    }
               }
            }

            $this->fastagi->exec("Read","CONFIRMADO,".$read_locucion.",1,,,7");
            $confirmado = $this->fastagi->get_variable("CONFIRMADO");
            $confirmado = $confirmado['data'];

            if ($confirmado == "1"){
                $centroConfirmado = true;
            }

            return $centroConfirmado;

        } else {
            return false;
        }
    }

    protected function confirmacodigo($ivr)
    {
        //pregunto confirmacion
        $codConfirmado = false;
        $locConfirmarCodApertura = $ivr->getLocucionConfirmarCodApertura();
        if ($locConfirmarCodApertura) {
            $read_locucion = null;
            foreach($locConfirmarCodApertura->getLocuciones() as $locucion){
                if(!$locucion->isDigit()){
                    if(is_null($read_locucion)){
                        $read_locucion = "/var/lib/asterisk/sounds/es/locuciones/atezate/".$locucion->getPath();
                        $this->fastagi->exec("playback",$read_locucion);
                    }else{
                        $read_locucion = "/var/lib/asterisk/sounds/es/locuciones/atezate/".$locucion->getPath();
                    }
                }else{
                    $this->fastagi->exec("SayDigits",$locucion->getValue());
                }
            }

            $this->fastagi->exec("Read","CODIGO_CONFIRMADO,".$read_locucion.",1,,,7");
            $estado=$this->readcontrol();
            $confirmado=$this->fastagi->get_variable("CODIGO_CONFIRMADO");
            $confirmado=$confirmado['data'];

            if ($confirmado=="1") {
                $locConfirmarCodApertura = $ivr->getLocucionEspere();
                $locucion_playback = $locConfirmarCodApertura->getLocucion()->getPath();
                $this->fastagi->exec("playback","/var/lib/asterisk/sounds/es/locuciones/atezate/".$locucion_playback);
                $ivr->confirmarCodigoApertura();
                $codConfirmado = true;
            }

            return $codConfirmado;

        } else {

            return false;
        }
    }

    protected function readcontrol()
    {
        $estado = $this->fastagi->get_variable("READSTATUS");
        $estado = $estado['data'];
        if ($estado == "ERROR" || $estado == "HANGUP" || $estado == "INTERRUPTED" || $estado == "SKIPPED") {
            $this->fastagi->exec('NoOp','ha habido un error en la aplicacion Read ');
            $this->fastagi->exec("Hangup","");
            exit;
        }

        return $estado;
    }
}

