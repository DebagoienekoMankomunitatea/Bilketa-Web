<?php
class importadorCubosWorker extends Iron_Gearman_Worker
{
    protected $_timeout = 30000; // 1000 = 1 second
    protected $_frontend;
    protected $_fileToImport;

    protected function initRegisterFunctions()
    {
        $this->_registerFunction = array(
                'importadorCubos' => '_importadorEntity'
        );
    }

    protected function init()
    {
        file_put_contents("/tmp/cubos.log", "init\n", FILE_APPEND);
    }

    protected function timeout()
    {
        $pMapper = new \Atezate\Mapper\Sql\Camiones;
        $pMapper->getDbTable()->getAdapter()->closeConnection();
    }

    public function _importadorEntity($job)
    {
        $job = unserialize($job->workload());

        $mapperImportadorCubos = new \Atezate\Mapper\Sql\CubosImportadores;
        $this->_fileToImport = $mapperImportadorCubos->find($job->getId());

        file_put_contents("/tmp/cubos.log", "Loading id#" . $job->getId() . "\n", FILE_APPEND);
        if (! $this->_fileToImport) {

            file_put_contents("/tmp/cubos.log", "Record not found" . "\n", FILE_APPEND);
            return;
        }
        file_put_contents("/tmp/cubos.log", print_r($this->_fileToImport->toArray(), true) . "\n", FILE_APPEND);

        //Genera la ruta del archivo csv (después de haberlo convertido de un archivo .mdb)
        $conditionNow = $this->_fileToImport->getEstado();

        file_put_contents("/tmp/cubos.log", "Condition: {$conditionNow} \n", FILE_APPEND);

        $this->_fileToImport->setEstado('importando');
        $this->_fileToImport->save();

        $fso = $this->_fileToImport->fetchCsv();

        $filePath = $fso->getFilePath();
        if (! file_exists($filePath)) {
            file_put_contents("/tmp/cubos.log", "File {$filePath} not found \n", FILE_APPEND);
            throw new \Exception("File {$filePath} not found");
        }       
        file_put_contents("/tmp/cubos.log", "Csv file path: {$filePath} \n", FILE_APPEND);

        if (! in_array($conditionNow, array('importando', 'importado'))) {

            $done = $this->_importCsvCubos($filePath);
            $estado = $done ? 'importado' : 'error';

            $this->_fileToImport->setEstado($estado);
            $this->_fileToImport->save();
        }
    }

    protected function _importCsvCubos($filePath)
    {
        $gestor = fopen($filePath, "r");
        if ($gestor === false) {
            return false;
        }

        $fila = 1;
        $datos = fgetcsv($gestor, 1000, ";");

        $telefonoModel = new \Atezate\Model\Telefonos();
        while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {

            try {
                $success = $this->_importRow($datos);
            } catch (\Exception $e) {

                $dueTo = $e->getMessage();    
                file_put_contents("/tmp/cubos.log", "Record #{$fila} was not imported due to: {$dueTo}:\n". print_r($datos, true) ."\n\n", FILE_APPEND);
            }

            if ($fila % 1000 == 0) {
                file_put_contents("/tmp/cubos.log", "|/-\\|/-\\| #{$fila} \n", FILE_APPEND);
            }

            $fila++;
        }

        return true;
    }

    /**
     * @return bool success
     */
    protected function _importRow(array $data)
    {
        /************************
        "Cubo ID"                   ?Cubos.cuboId                       : '1'
        "Tiene Punto de Recogida"   *Check (empty | bool)*              : 'SI'
        "Punto de Recogida ID"      *->PuntosRecogida.nombreDescriptivo : '001 gunea'
        "Poste ID"                  *->Postes.postesIden                : '059ZT000000'
        "Contribuyente ID"          *->Contribuyentes.contribuyenteIden : '59110001060'
        "Cubos Tipo ID"             *->CubosTipos.tipo                  : 'ONA01'
        "Día Asignado"              ->Cubos.diaAsignado                 : 'M-V-D'
        "Baja"                      ->(empty | bool) Cubos.baja         : ''
        "Día Baja"                  ->Cubos.diaBaja                     : ''
        "RFID"                      ->Cubos.rfid                        : '59110001060000000000000'
         *************************/

        list(
            $cuboId,
            $tienePuntoRecogida, 
            $puntoRecogidaNombreDescriptivo,
            $postesIden,
            $contribuyenteIden,
            $cubosTipo,
            $diaAsignado,
            $baja,
            $diaBaja,
            $rfid
        ) = $data;

        //Data normalization
        $baja = !empty($baja);
        $tienePuntoRecogida = strtoupper($tienePuntoRecogida) == 'SI';

        //Required relationships
        $contribuyenteModel = $this->_getContribuyenteByContribuyenteIden($contribuyenteIden);
        $puntoRecogidaModel = $this->_getPuntoRecogidaByNombreDescriptivo($puntoRecogidaNombreDescriptivo);
        $posteModel         = $this->_retriveOrCreatePosteIfPosibleByIden($postesIden, $puntoRecogidaModel);

        $cubosTipoStr = $cubosTipo;
        $cubosTipo          = $this->_getCubosTipoByTypo($cubosTipo);

if (!$contribuyenteModel) {
    file_put_contents("/tmp/cubos.log", $contribuyenteIden . " contribuyenteIden not found\n", FILE_APPEND);
}
if (!$posteModel) {
    file_put_contents("/tmp/cubos.log", $postesIden . " postesIden not found\n", FILE_APPEND);
}
if (!$cubosTipo) {
    file_put_contents("/tmp/cubos.log", $cubosTipoStr . " cubosTipo not found\n", FILE_APPEND);
}

        $requiredModels = array(
            'contribuyente' => $contribuyenteModel,
            'poste' => $posteModel,
            'cubo_tipo' => $cubosTipo        
        );
        if ($tienePuntoRecogida) {
            $requiredModels['punto_de_recogida'] = $puntoRecogidaModel;
        }

        $noEmptyValues = $this->_assertNoEmptyValuesInArray($requiredModels);
        if (false === $noEmptyValues) {
            return false;
        }

        //Ready 
        $cubosMapper = new \Atezate\Mapper\Sql\Cubos();
        $cuboModel = $cubosMapper->findOneByField("rfid", $rfid);
        if (!$cuboModel) {
            $cuboModel = new \Atezate\Model\Cubos();
        }

        // TODO: En el csv inical no tenían valor
        // `diaAsignado` varchar(13) DEFAULT NULL,
        // `baja` tinyint(1) DEFAULT NULL,

        //$ubicacion = ($tienePuntoRecogida && $puntoRecogidaModel) ?  'puntoRecogida' : 'poste';
        
        $ubicacion = '';
        if ($posteModel) {
			$ubicacion = 'poste';
        } else if ($tienePuntoRecogida && $puntoRecogidaModel) {
			$ubicacion = 'puntoRecogida';
        } else {
        	// Centro de emergencia: no controlado por falta de ejemplos en los excel
			return false ;
        }

        $ubicacion = ($posteModel) ?  'puntoRecogida' : 'poste';
        $ubicacion = 'poste';
        $cuboModel->setRfid($rfid)
                  ->setDiaAsignado($diaAsignado)
                  ->setUbicacion($ubicacion)
                  ->setCubosTiposId($cubosTipo->getPrimaryKey())
                  ->setContribuyenteId($contribuyenteModel->getPrimaryKey())
                  ->setPosteId($posteModel->getPrimaryKey())
                  ->setPuntosRecogidaId($puntoRecogidaModel->getPrimaryKey())
                  ->save();

        return true;
    }

    protected function _assertNoEmptyValuesInArray(array $values)
    {
        foreach ($values as $key => $value) {
            if (empty($value)) {
                //throw new \Exception("{$key} is empty");
                return false;
            }
        }
        return true;
    }

    protected function _getCubosTipoByTypo($cubosTipo)
    {
        //Fix para matchear 
        $cubosTipo = preg_replace("/(.*[a-z])([0-9]){1}$/i", "\${1}0\${2}", $cubosTipo);

        $mapper = new \Atezate\Mapper\Sql\CubosTipos();
        return $mapper->findOneByField('tipo', $cubosTipo);
    }   

    protected function _retriveOrCreatePosteIfPosibleByIden($postesIden, \Atezate\Model\PuntosRecogida $puntoRecogidaModel = null)
    {
        $poste = $this->_getPosteByPostesIden($postesIden);
        if (is_null($poste)) {

            $poste = new \Atezate\Model\Postes();
            $poste->setPostesIden($postesIden);

            if ($puntoRecogidaModel) {
                $poste->setPuntosRecogidaId($puntoRecogidaModel->getPrimaryKey());    
            }

            $poste->save();
        }

        return $poste;   
    }

    protected function _getPosteByPostesIden($postesIden)
    {
        $mapper = new \Atezate\Mapper\Sql\Postes();
        return $mapper->findOneByField('postesIden', $postesIden);
    }

    protected function _getContribuyenteByContribuyenteIden($contribuyenteIden)
    {
        $mapper = new \Atezate\Mapper\Sql\Contribuyentes();
        return $mapper->findOneByField('contribuyenteIden', $contribuyenteIden);
    }

    protected function _getPuntoRecogidaByNombreDescriptivo($nombreDescriptivo)
    {
        //Fix para matchear
        if (APPLICATION_ENV != 'production') {
            $nombreDescriptivo = str_replace("019_1 gunea", "019_1", $nombreDescriptivo);
            $nombreDescriptivo = str_replace("085_1 gunea", "085_1", $nombreDescriptivo);
        }

        $mapper = new \Atezate\Mapper\Sql\PuntosRecogida();
        return $mapper->findOneByField('nombreDescriptivo', $nombreDescriptivo);
    }
}
