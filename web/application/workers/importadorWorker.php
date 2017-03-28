<?php
class importadorWorker extends Iron_Gearman_Worker
{
    protected $_timeout = 30000; // 1000 = 1 second
    
    protected $_frontend;
    
    protected $_importadorEstado;
    
    protected function initRegisterFunctions()
    {
        $this->_registerFunction = array(
                'importador' => '_importadorEntity'
        );
    }

    protected function init()
    {
        
    }

    protected function timeout()
    {
        $pMapper = new \Atezate\Mapper\Sql\Camiones;
        $pMapper->getDbTable()->getAdapter()->closeConnection();
    }

    public function _importadorEntity($job)
    {
        $job = unserialize($job->workload());

        $mapperImportador = new \Atezate\Mapper\Sql\Importadores;
        $this->_importadorEstado = $mapperImportador->find($job->getId());

        //Genera la ruta del archivo csv (después de haberlo convertido de un archivo .mdb)
        $conditionNow = $this->_importadorEstado->getEstado();

        $this->_importadorEstado->setEstado('importando');
        $this->_importadorEstado->save();
        //Nombre de una de las opciones del campo ENUM
        $funcion = $job->getClassName();
        $ruta = $this->ruta($job,$funcion);

        if ($ruta && ($conditionNow != 'importando') && ($conditionNow != 'importado')) {
            
            if (($gestor = fopen($ruta, "r")) !== FALSE) {

                //Enviaremos los datos del job y el gestor para importar los datos
                $importador = $this->$funcion($job,$gestor);

                if ($importador) {
                    fclose($gestor);
                    
                    $this->_importadorEstado->setEstado('importado');
                    $this->_importadorEstado->save();
                    
                    
                } else {
                    $this->_importadorEstado->setEstado('error');
                    $this->_importadorEstado->save();
                }
                
                if (file_exists($ruta)) {
                    unlink($ruta);
                }
            }
        }
    }

    protected function ruta($job,$funtion = false)
    {
        $nameDB = null;
        if ($funtion == 'debagoiena') {
            $nameDB = 'Zergadunak'; // Nombre de la base de datos
        } elseif ($funtion == 'debagoiena2') {
            $nameDB = 'HERRITARRAK-ARE'; // Nombre de la base de datos
        }

        //ubicación del fichero original
        $rutaFicheroOriginal = $job->getSourceFilePath();

        //ruta del archivo donde se copiará el archivo original en formato CSV
        $rutaName = tempnam(sys_get_temp_dir(),'toCSV');
        $rutaFicheroOrigen = $rutaName.'.csv';

        if ($nameDB) {
            $ret = $retValues = false;
            exec('mdb-export '.$rutaFicheroOriginal.' '.$nameDB.' > '.$rutaFicheroOrigen, $ret, $retValue);
        } else {
            $ret = copy( $rutaFicheroOriginal , $rutaFicheroOrigen);
        }

        if (file_exists($rutaName)) {
            unlink($rutaName);
        }

        if ($ret != 0) {
            return $rutaFicheroOrigen;
        } else {
            $this->_importadorEstado->setEstado('error');
            $this->_importadorEstado->save();
        }
    }

    protected function saveTel($idContribuyente,$num) 
    {
        $telefonoMapper = new \Atezate\Mapper\Sql\Telefonos();

        $telefono = $telefonoMapper->findOneByField(array('contribuyenteId','telefono'),array($idContribuyente,$num));

        if (!$telefono) {
            $telefonoModel = new \Atezate\Model\Telefonos();
            $telefonoModel->setContribuyenteId($idContribuyente);
            $telefonoModel->setTelefono($num);
            if (substr($num,0,1) == 9) {
                $telefonoModel->setTipo('fijo');
            }
            $telefonoModel->save();
        }
    }

    protected function _log($message, $filename)
    {
        file_put_contents("/tmp/" . $filename . ".log", $message . "\r\n", FILE_APPEND);
    }

    // IMPORTADOR PARA OÑATI
    protected function debagoiena($job,$gestor) 
    {
        $fila = 1;
        $datos = fgetcsv($gestor, 1000, ",");

        $telefonoModel = new \Atezate\Model\Telefonos();
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            if ($fila >= 2) {

                $mapper = new \Atezate\Mapper\Sql\Contribuyentes();
                $model = new \Atezate\Model\Contribuyentes();
    
                //Si se trata de Contribuyentes
                if ($job->getEntity() == 'Contribuyentes') {

                    $tmpModel = $mapper->findOneByField('contribuyenteIden',substr($datos[0], -12));
                    if ($tmpModel) {
                        $model = $tmpModel;
                    }

                    $model->setContribuyenteIden(substr($datos[0], -12));
                    $model->setCoeficienteEntornoContribuyente('A');
                    $model->setCoeficienteEntornoZona('B');
                    $model->setCoeficienteEntornoPueblo('C');

                    $datos[25] = substr($datos[25], 0, 7);
                    $model->setIdContribuyenteUsoa(isset($datos[25]) ? $datos[25] : '');
                    $model->setNombre($datos[1]);
                    $model->setNif($datos[2]);

                    $model->setIntuitivo($datos[3]);
                    $model->setCodigoCalle('');
                    $model->setDireccion($datos[5]);
                    $model->setPortal($datos[6]);
                    $model->setBis($datos[7]);
                    $model->setEscalera($datos[8]);
                    $model->setPiso($datos[9]);
                    $model->setMano($datos[10]);
                    $model->setOtrosDomicilio($datos[11]);
                    $model->setMunicipioId(58); // Columna 10 Municipio de Oñati

                    $model->setTarifa($datos[23] ? substr($datos[23], 0, 10) : '');
                    $model->setLocalidadFiscal($datos[24]);
                    $model->setDireccionFiscal('');
                    $model->setProvinciaFiscal($datos[25]);
                    $model->setPortalFiscal('3');
                    
                    try {
                        $model->save();
                    } catch (\Exception $e) {
                        $this->_log(print_r($model->toArray(), true) . " --> " . $e->getMessage(), "onati");
                    }

                    if ($model->getContribuyenteId()) {
                        try {
                            if ($datos[16] && is_numeric($datos[16])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[16]);
                            }
    
                            if ($datos[13] && is_numeric($datos[13])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[13]);
                            }
    
                            if ($datos[14] && is_numeric($datos[14])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[14]);
                            }
    
                            if ($datos[15] && is_numeric($datos[15])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[15]);
                            }
                        } catch (\Exception $e) {
//                             print_r($telefonoModel->toArray());
                            print $e->getMessage();
                        }
                    }
    
                }
            }
            $fila++;
        }

        $this->_log("DONE", "onati");
        return true;
    }

    // MDB para aretxabaleta
    protected function debagoiena2($job,$gestor) 
    {
        $fila = 1;
    
        $datos = fgetcsv($gestor, 1000, ",");
    
        $telefonoModel = new \Atezate\Model\Telefonos();
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            if ($fila >= 2) {

                $mapper = new \Atezate\Mapper\Sql\Contribuyentes();
                $model = new \Atezate\Model\Contribuyentes();

                //Si se trata de Contribuyentes
                if ($job->getEntity() == 'Contribuyentes') {

                    $tmpModel = $mapper->findOneByField('contribuyenteIden',substr($datos[0], -12));
                    if ($tmpModel) {
                        $model = $tmpModel;
                    }

                    $model->setContribuyenteIden(substr($datos[0], -12));
                    $model->setCoeficienteEntornoContribuyente('');
                    $model->setCoeficienteEntornoZona('');
                    $model->setCoeficienteEntornoPueblo('');
                    $model->setIdContribuyenteUsoa('');
                    
                    
                    $model->setNombre($datos[2]);
                    $model->setNif($datos[3]);
                    $model->setIntuitivo($datos[1]);
                    $model->setDireccion($datos[4]);
                    $model->setPortal($datos[5]);
                    $model->setBis($datos[6]);
                    $model->setEscalera($datos[7]);
                    $model->setPiso($datos[8]);
                    $model->setMano($datos[9]);
                    $model->setMunicipioId(15); // Columna 10 Municipio de Aretxabaleta
                    
                    
                    // hobaria 11
                    if ($datos[11] == 'BAI') {
                        $model->setExcluido(1);
                    }

                    // paper komunitarioa 12
                    
                    // hartzaileraren izena 13
                    
                    // hartzailear nan  14
                    
                    // autokomposta 17
                    
                    // ausokomposta 18
                    
                    // gaztelera 19 //es //eu
                    
                    if ($datos[19] == 'BAI') {
                        $model->setIvr('es');
                    }
                    
                    // puntuak 20
                    $codigoCalle = explode("e+", $datos[20]); 
                    $model->setCodigoCalle($codigoCalle[0] * pow(10, $codigoCalle[1]));
                    
                    $model->setTarifa('');
                    $model->setLocalidadFiscal('');
                    $model->setDireccionFiscal('');
                    $model->setProvinciaFiscal('');
                    $model->setPortalFiscal('');
                    
                    try {
                        $model->save();
                    } catch (\Exception $e) {
//                         exit;
                    }
    
                    if ($model->getContribuyenteId()) {
                        try {
                            if ($datos[16] && is_numeric($datos[16])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[16]);
                            }
    
                            if ($datos[13] && is_numeric($datos[13])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[13]);
                            }
    
                        } catch (\Exception $e) {
                            //                             print_r($telefonoModel->toArray());
                            print $e->getMessage();
                        }
                    }
                }
            }
            $fila++;
        }
    
        return true;
    }

    // CSV para eskoriatza
    protected function eskoriatza($job,$gestor) 
    {
        $fila = 1;
        $datos = fgetcsv($gestor, 1000, ",");

        $telefonoModel = new \Atezate\Model\Telefonos();
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

            if ($fila >= 1) {

                $mapper = new \Atezate\Mapper\Sql\Contribuyentes();
                $model = new \Atezate\Model\Contribuyentes();

                //Si se trata de Contribuyentes
                if ($job->getEntity() == 'Contribuyentes') {

                    $tmpModel = $mapper->findOneByField('contribuyenteIden',substr($datos[4], -12));
                    if ($tmpModel) {
                        $model = $tmpModel;
                    }

                    $model->setContribuyenteIden(substr($datos[4], -12));
                    $model->setCoeficienteEntornoContribuyente('');
                    $model->setCoeficienteEntornoZona('');
                    $model->setCoeficienteEntornoPueblo('');
                    $model->setIdContribuyenteUsoa(isset($datos[0]) ? $datos[0] : '');

                    $model->setNombre($datos[1]);
                    $model->setNif($datos[5]);
                    $model->setIntuitivo($datos[3]);
                    $model->setDireccion($datos[7]);
                    $model->setPortal($datos[8]);
                    $model->setBis($datos[9]);
                    $model->setEscalera($datos[10]);
                    $model->setPiso($datos[11]);
                    $model->setMano($datos[12]);
                    $model->setMunicipioId(36); // 
                    $model->setCodigoCalle($datos['6']);

                    // hobaria
                    if ($datos[14] != '0') {
                        $model->setExcluido(1);
                    }

                    if ($datos[20] != '') {
                        $model->setIvr('es');
                    } else {
                        $model->setIvr('eu');
                    }

                    $model->setTarifa($datos['13']);
                    $model->setLocalidadFiscal('');
                    $model->setDireccionFiscal('');
                    $model->setProvinciaFiscal('');
                    $model->setPortalFiscal('');

                    try {
                        $model->save();
                    } catch (\Exception $e) {
//                         exit;
                    }
    
                    if ($model->getContribuyenteId()) {
                        try {
                            if ($datos[16] && is_numeric($datos[16])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[16]);
                            }
    
                            if ($datos[17] && is_numeric($datos[17])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[17]);
                            }
    
                        } catch (\Exception $e) {
                            //print_r($telefonoModel->toArray());
                            print $e->getMessage();
                        }
                    }
                }
            }
            $fila++;
        }
    
        return true;
    }


    // CSV para Bergara
    protected function bergara($job,$gestor) 
    {
        $fila = 1;
        $datos = fgetcsv($gestor, 1000, ",");

        $telefonoModel = new \Atezate\Model\Telefonos();
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

            if ($fila >= 1 && count($datos) > 25) {
                
                $mapper = new \Atezate\Mapper\Sql\Contribuyentes();
                $model = new \Atezate\Model\Contribuyentes();

                //Si se trata de Contribuyentes
                if ($job->getEntity() == 'Contribuyentes') {

                    $tmpModel = $mapper->findOneByField('contribuyenteIden',substr($datos[1], -12));
                    if ($tmpModel) {
                        $model = $tmpModel;
                    }

                    $model->setContribuyenteIden(substr($datos[1], -12));
                    $model->setCoeficienteEntornoContribuyente('');
                    $model->setCoeficienteEntornoZona('');
                    $model->setCoeficienteEntornoPueblo('');
                    $model->setIdContribuyenteUsoa(isset($datos[0]) ? $datos[0] : '');

                    $model->setNombre($datos[3]);
                    $model->setNif($datos[5]);
                    $model->setIntuitivo($datos[6]);
                    $model->setDireccion($datos[8]);
                    $model->setPortal($datos[9]);
                    $model->setBis($datos[10]);
                    $model->setEscalera($datos[11]);
                    $model->setPiso($datos[12]);
                    $model->setMano($datos[13]);
                    $model->setOtrosDomicilio($datos[14]);
                    $model->setMunicipioId(25); // 
                    $model->setCodigoCalle($datos['7']);

                    // hobaria 22
                    if ($datos[22] == '1') {
                        $model->setExcluido(1);
                    }

                    if ($datos[23] != '0') {
                        $model->setIvr('es');
                    } else {
                        $model->setIvr('eu');
                    }

                    $model->setTarifa($datos['13']);
                    $model->setLocalidadFiscal('');
                    $model->setDireccionFiscal('');
                    $model->setProvinciaFiscal('');
                    $model->setPortalFiscal('');

                    try {
                        $model->save();
                    } catch (\Exception $e) {
//                      exit;
                    }
    
                    if ($model->getContribuyenteId()) {
                        try {
                            if ($datos[15] && is_numeric($datos[15])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[15]);
                            }

                            if ($datos[16] && is_numeric($datos[16])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[16]);
                            }

                            if ($datos[17] && is_numeric($datos[17])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[17]);
                            }

                            if ($datos[18] && is_numeric($datos[18])) {
                                $this->saveTel($model->getContribuyenteId(), $datos[18]);
                            }

                        } catch (\Exception $e) {
                            //print_r($telefonoModel->toArray());
                            print $e->getMessage();
                        }
                    }
                }
            } else {
                print "Something wrong with: " . var_export($datos, true); 
            }
            $fila++;
        }
    
        return true;
    }
}
?>
