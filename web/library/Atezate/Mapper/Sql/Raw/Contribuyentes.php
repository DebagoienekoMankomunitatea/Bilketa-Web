<?php

/**
 * Application Model Mapper
 *
 * @package Atezate\Mapper\Sql
 * @subpackage Raw
 * @author Victor Vargas
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Atezate\Model\Contribuyentes
 *
 * @package Atezate\Mapper\Sql
 * @subpackage Raw
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\Raw;
class Contribuyentes extends MapperAbstract
{
    protected $_modelName = 'Atezate\\Model\\Contribuyentes';


    protected $_urlIdentifiers = array();

    /**
     * Returns an array, keys are the field names.
     *
     * @param Atezate\Model\Raw\Contribuyentes $model
     * @return array
     */
    public function toArray($model)
    {
        if (!$model instanceof \Atezate\Model\Raw\Contribuyentes) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \Atezate\Model\Raw\Contribuyentes object in toArray for " . get_class($this);
            } else {
                $message = "$model is not a \\Atezate\Model\\Contribuyentes object in toArray for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to create array: invalid model passed to mapper', 2000);
        }

        $result = array(
            'contribuyenteId' => $model->getContribuyenteId(),
            'contribuyenteIden' => $model->getContribuyenteIden(),
            'coeficienteEntornoContribuyente' => $model->getCoeficienteEntornoContribuyente(),
            'coeficienteEntornoZona' => $model->getCoeficienteEntornoZona(),
            'coeficienteEntornoPueblo' => $model->getCoeficienteEntornoPueblo(),
            'idContribuyenteUsoa' => $model->getIdContribuyenteUsoa(),
            'nombre' => $model->getNombre(),
            'municipioId' => $model->getMunicipioId(),
            'createdOn' => $model->getCreatedOn(),
            'nif' => $model->getNif(),
            'cuenta' => $model->getCuenta(),
            'intuitivo' => $model->getIntuitivo(),
            'codigoCalle' => $model->getCodigoCalle(),
            'direccion' => $model->getDireccion(),
            'portal' => $model->getPortal(),
            'bis' => $model->getBis(),
            'escalera' => $model->getEscalera(),
            'piso' => $model->getPiso(),
            'mano' => $model->getMano(),
            'otrosDomicilio' => $model->getOtrosDomicilio(),
            'tarifa' => $model->getTarifa(),
            'cantidad' => $model->getCantidad(),
            'direccionFiscal' => $model->getDireccionFiscal(),
            'portalFiscal' => $model->getPortalFiscal(),
            'bisFiscal' => $model->getBisFiscal(),
            'escaleraFiscal' => $model->getEscaleraFiscal(),
            'pisoFiscal' => $model->getPisoFiscal(),
            'manoFiscal' => $model->getManoFiscal(),
            'localidadFiscal' => $model->getLocalidadFiscal(),
            'pkFiscal' => $model->getPkFiscal(),
            'provinciaFiscal' => $model->getProvinciaFiscal(),
            'excluido' => $model->getExcluido(),
            'ivr' => $model->getIvr(),
        );

        return $result;
    }

    /**
     * Returns the DbTable class associated with this mapper
     *
     * @return Atezate\\Mapper\\Sql\\DbTable\\Contribuyentes
     */
    public function getDbTable()
    {
        if (is_null($this->_dbTable)) {
            $this->setDbTable('Atezate\\Mapper\\Sql\\DbTable\\Contribuyentes');
        }

        return $this->_dbTable;
    }

    /**
     * Deletes the current model
     *
     * @param Atezate\Model\Raw\Contribuyentes $model The model to delete
     * @see Atezate\Mapper\DbTable\TableAbstract::delete()
     * @return int
     */
    public function delete(\Atezate\Model\Raw\ModelAbstract $model)
    {
        if (!$model instanceof \Atezate\Model\Raw\Contribuyentes) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \\Atezate\\Model\\Contribuyentes object in delete for " . get_class($this);
            } else {
                $message = "$model is not a \\Atezate\\Model\\Contribuyentes object in delete for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to delete: invalid model passed to mapper', 2000);
        }

        $useTransaction = true;

        $dbTable = $this->getDbTable();
        $dbAdapter = $dbTable->getAdapter();

        try {

            $dbAdapter->beginTransaction();

        } catch (\Exception $e) {

            //Transaction already started
            $useTransaction = false;
        }

        try {

            //onDeleteCascades emulation
            if ($this->_simulateReferencialActions && count($deleteCascade = $model->getOnDeleteCascadeRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteCascade as $fk) {

                    $capitalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'Atezate\\Mapper\\Sql\\DbTable\\' . $depList[$capitalizedFk]["table_name"];
                        $depMapperName = 'Atezate\\Mapper\\Sql\\' . $depList[$capitalizedFk]["table_name"];
                        $depModelName = 'Atezate\\Model\\' . $depList[$capitalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('Atezate\\Mapper\\Sql\\DbTable\\Contribuyentes', $capitalizedFk);

                            $targetColumn = array_shift($references["columns"]);
                            $where = $relDbAdapter->getAdapter()->quoteInto($targetColumn . ' = ?', $model->getPrimaryKey());

                            $depMapper = new $depMapperName;
                            $depObjects = $depMapper->fetchList($where);

                            if (count($depObjects) === 0) {

                                continue;
                            }

                            foreach ($depObjects as $item) {

                                $item->delete();
                            }
                        }
                    }
                }
            }

            //onDeleteSetNull emulation
            if ($this->_simulateReferencialActions && count($deleteSetNull = $model->getOnDeleteSetNullRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteSetNull as $fk) {

                    $capitalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'Atezate\\Mapper\\Sql\\DbTable\\' . $depList[$capitalizedFk]["table_name"];
                        $depMapperName = 'Atezate\\Mapper\\Sql\\' . $depList[$capitalizedFk]["table_name"];
                        $depModelName = 'Atezate\\Model\\' . $depList[$capitalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('Atezate\\Mapper\\Sql\\DbTable\\Contribuyentes', $capitalizedFk);

                            $targetColumn = array_shift($references["columns"]);
                            $where = $relDbAdapter->getAdapter()->quoteInto($targetColumn . ' = ?', $model->getPrimaryKey());

                            $depMapper = new $depMapperName;
                            $depObjects = $depMapper->fetchList($where);

                            if (count($depObjects) === 0) {

                                continue;
                            }

                            foreach ($depObjects as $item) {

                                $setterName = 'set' . ucfirst($targetColumn);
                                $item->$setterName(null);
                                $item->save();
                            } //end foreach

                        } //end if
                    } //end else

                }//end foreach ($deleteSetNull as $fk)
            } //end if

            $where = $dbAdapter->quoteInto($dbAdapter->quoteIdentifier('contribuyenteId') . ' = ?', $model->getContribuyenteId());
            $result = $dbTable->delete($where);

            if ($this->_cache) {

                $this->_cache->remove(get_class($model) . "_" . $model->getPrimarykey());
            }

            $fileObjects = array();
            $availableObjects = $model->getFileObjects();

            foreach ($availableObjects as $fso) {

                $removeMethod = 'remove' . $fso;
                $model->$removeMethod();
            }


            if ($useTransaction) {
                $dbAdapter->commit();
            }
        } catch (\Exception $exception) {

            $message = 'Exception encountered while attempting to delete ' . get_class($this);
            if (!empty($where)) {
                $message .= ' Where: ';
                $message .= $where;
            } else {
                $message .= ' with an empty where';
            }

            $message .= ' Exception: ' . $exception->getMessage();
            $this->_logger->log($message, \Zend_Log::ERR);
            $this->_logger->log($exception->getTraceAsString(), \Zend_Log::DEBUG);

            if ($useTransaction) {

                $dbAdapter->rollback();
            }

            throw $exception;
        }

        return $result;
    }

    /**
     * Saves current row
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function save(\Atezate\Model\Raw\Contribuyentes $model)
    {
        return $this->_save($model, false, false);
    }

    /**
     * Saves current and all dependent rows
     *
     * @param \Atezate\Model\Raw\Contribuyentes $model
     * @param boolean $useTransaction Flag to indicate if save should be done inside a database transaction
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function saveRecursive(\Atezate\Model\Raw\Contribuyentes $model, $useTransaction = true, $transactionTag = null)
    {
        return $this->_save($model, true, $useTransaction, $transactionTag);
    }

    protected function _save(\Atezate\Model\Raw\Contribuyentes $model,
        $recursive = false, $useTransaction = true, $transactionTag = null
    )
    {
        $this->_setCleanUrlIdentifiers($model);

        $fileObjects = array();

        $availableObjects = $model->getFileObjects();
        $fileSpects = array();

        foreach ($availableObjects as $item) {

            $objectMethod = 'fetch' . $item;
            $fso = $model->$objectMethod(false);

            if (!is_null($fso) && $fso->mustFlush()) {

                $fileObjects[$item] = $fso;
                $specMethod = 'get' . $item . 'Specs';
                $fileSpects[$item] = $model->$specMethod();

                $fileSizeSetter = 'set' . $fileSpects[$item]['sizeName'];
                $baseNameSetter = 'set' . $fileSpects[$item]['baseNameName'];
                $mimeTypeSetter = 'set' . $fileSpects[$item]['mimeName'];

                $model->$fileSizeSetter($fso->getSize())
                      ->$baseNameSetter($fso->getBaseName())
                      ->$mimeTypeSetter($fso->getMimeType());
            }
        }

        $data = $model->sanitize()->toArray();

        $primaryKey = $model->getContribuyenteId();
        $success = true;

        if ($useTransaction) {

            try {

                if ($recursive && is_null($transactionTag)) {

                    //$this->getDbTable()->getAdapter()->query('SET transaction_allow_batching = 1');
                }

                $this->getDbTable()->getAdapter()->beginTransaction();

            } catch (\Exception $e) {

                //transaction already started
            }


            $transactionTag = 't_' . rand(1, 999) . str_replace(array('.', ' '), '', microtime());
        }

        unset($data['contribuyenteId']);

        try {
            if (is_null($primaryKey) || empty($primaryKey)) {

                $primaryKey = $this->getDbTable()->insert($data);

                if ($primaryKey) {
                    $model->setContribuyenteId($primaryKey);
                } else {
                    throw new \Exception("Insert sentence did not return a valid primary key", 9000);
                }

                if ($this->_cache) {

                    $parentList = $model->getParentList();

                    foreach ($parentList as $constraint => $values) {

                        $refTable = $this->getDbTable();

                        $ref = $refTable->getReference('Atezate\\Mapper\\Sql\\DbTable\\' . $values["table_name"], $constraint);
                        $column = array_shift($ref["columns"]);

                        $cacheHash = 'Atezate\\Model\\' . $values["table_name"] . '_' . $data[$column] .'_' . $constraint;

                        if ($this->_cache->test($cacheHash)) {

                            $cachedRelations = $this->_cache->load($cacheHash);
                            $cachedRelations->results[] = $primaryKey;

                            if ($useTransaction) {

                                $this->_cache->save($cachedRelations, $cacheHash, array($transactionTag));

                            } else {

                                $this->_cache->save($cachedRelations, $cacheHash);
                            }
                        }
                    }
                }
            } else {
                $this->getDbTable()
                     ->update(
                         $data,
                         array(
                             $this->getDbTable()->getAdapter()->quoteIdentifier('contribuyenteId') . ' = ?' => $primaryKey
                         )
                     );
            }

            if (!empty($primaryKey) && !empty($fileObjects)) {

                foreach ($fileObjects as $key => $fso) {

                    $baseName = $fso->getBaseName();
                    if (!empty($baseName)) {
                        $fso->flush($primaryKey);
                    }
                }
            }


            if ($recursive) {
                if ($model->getCodigosAperturaPrivados(null, null, true) !== null) {
                    $codigosAperturaPrivados = $model->getCodigosAperturaPrivados();

                    if (!is_array($codigosAperturaPrivados)) {

                        $codigosAperturaPrivados = array($codigosAperturaPrivados);
                    }

                    foreach ($codigosAperturaPrivados as $value) {
                        $value->setContribuyenteId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getCompostadoresRelContribuyentes(null, null, true) !== null) {
                    $compostadoresRelContribuyentes = $model->getCompostadoresRelContribuyentes();

                    if (!is_array($compostadoresRelContribuyentes)) {

                        $compostadoresRelContribuyentes = array($compostadoresRelContribuyentes);
                    }

                    foreach ($compostadoresRelContribuyentes as $value) {
                        $value->setContribuyenteId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getCubos(null, null, true) !== null) {
                    $cubos = $model->getCubos();

                    if (!is_array($cubos)) {

                        $cubos = array($cubos);
                    }

                    foreach ($cubos as $value) {
                        $value->setContribuyenteId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getEmails(null, null, true) !== null) {
                    $emails = $model->getEmails();

                    if (!is_array($emails)) {

                        $emails = array($emails);
                    }

                    foreach ($emails as $value) {
                        $value->setContribuyenteId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getIncidencias(null, null, true) !== null) {
                    $incidencias = $model->getIncidencias();

                    if (!is_array($incidencias)) {

                        $incidencias = array($incidencias);
                    }

                    foreach ($incidencias as $value) {
                        $value->setContribuyenteId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getTelefonos(null, null, true) !== null) {
                    $telefonos = $model->getTelefonos();

                    if (!is_array($telefonos)) {

                        $telefonos = array($telefonos);
                    }

                    foreach ($telefonos as $value) {
                        $value->setContribuyenteId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

            }

            if ($success === true) {

                foreach ($model->getOrphans() as $itemToDelete) {

                    $itemToDelete->delete();
                }

                $model->resetOrphans();
            }

            if ($useTransaction && $success) {

                $this->getDbTable()->getAdapter()->commit();

            } elseif ($useTransaction) {

                $this->getDbTable()->getAdapter()->rollback();

                if ($this->_cache) {

                    $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($transactionTag));
                }
            }

        } catch (\Exception $e) {
            $message = 'Exception encountered while attempting to save ' . get_class($this);
            if (!empty($primaryKey)) {
                $message .= ' id: ' . $primaryKey;
            } else {
                $message .= ' with an empty primary key ';
            }

            $message .= ' Exception: ' . $e->getMessage();
            $this->_logger->log($message, \Zend_Log::ERR);
            $this->_logger->log($e->getTraceAsString(), \Zend_Log::DEBUG);

            if ($useTransaction) {
                $this->getDbTable()->getAdapter()->rollback();

                if ($this->_cache) {

                    if ($transactionTag) {

                        $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($transactionTag));

                    } else {

                        $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG);
                    }
                }
            }

            throw $e;
        }

        if ($success && $this->_cache) {

            if ($useTransaction) {

                $this->_cache->save($model->toArray(), get_class($model) . "_" . $model->getPrimaryKey(), array($transactionTag));

            } else {

                $this->_cache->save($model->toArray(), get_class($model) . "_" . $model->getPrimaryKey());
            }
        }

        if ($success === true) {

            return $primaryKey;
        }

        return $success;
    }

    /**
     * Loads the model specific data into the model object
     *
     * @param \Zend_Db_Table_Row_Abstract|array $data The data as returned from a \Zend_Db query
     * @param Atezate\Model\Raw\Contribuyentes|null $entry The object to load the data into, or null to have one created
     * @return Atezate\Model\Raw\Contribuyentes The model with the data provided
     */
    public function loadModel($data, $entry = null)
    {
        if (!$entry) {
            $entry = new \Atezate\Model\Contribuyentes();
        }

        // We don't need to log changes as we will reset them later...
        $entry->stopChangeLog();

        if (is_array($data)) {
            $entry->setContribuyenteId($data['contribuyenteId'])
                  ->setContribuyenteIden($data['contribuyenteIden'])
                  ->setCoeficienteEntornoContribuyente($data['coeficienteEntornoContribuyente'])
                  ->setCoeficienteEntornoZona($data['coeficienteEntornoZona'])
                  ->setCoeficienteEntornoPueblo($data['coeficienteEntornoPueblo'])
                  ->setIdContribuyenteUsoa($data['idContribuyenteUsoa'])
                  ->setNombre($data['nombre'])
                  ->setMunicipioId($data['municipioId'])
                  ->setCreatedOn($data['createdOn'])
                  ->setNif($data['nif'])
                  ->setCuenta($data['cuenta'])
                  ->setIntuitivo($data['intuitivo'])
                  ->setCodigoCalle($data['codigoCalle'])
                  ->setDireccion($data['direccion'])
                  ->setPortal($data['portal'])
                  ->setBis($data['bis'])
                  ->setEscalera($data['escalera'])
                  ->setPiso($data['piso'])
                  ->setMano($data['mano'])
                  ->setOtrosDomicilio($data['otrosDomicilio'])
                  ->setTarifa($data['tarifa'])
                  ->setCantidad($data['cantidad'])
                  ->setDireccionFiscal($data['direccionFiscal'])
                  ->setPortalFiscal($data['portalFiscal'])
                  ->setBisFiscal($data['bisFiscal'])
                  ->setEscaleraFiscal($data['escaleraFiscal'])
                  ->setPisoFiscal($data['pisoFiscal'])
                  ->setManoFiscal($data['manoFiscal'])
                  ->setLocalidadFiscal($data['localidadFiscal'])
                  ->setPkFiscal($data['pkFiscal'])
                  ->setProvinciaFiscal($data['provinciaFiscal'])
                  ->setExcluido($data['excluido'])
                  ->setIvr($data['ivr']);
        } else if ($data instanceof \Zend_Db_Table_Row_Abstract || $data instanceof \stdClass) {
            $entry->setContribuyenteId($data->{'contribuyenteId'})
                  ->setContribuyenteIden($data->{'contribuyenteIden'})
                  ->setCoeficienteEntornoContribuyente($data->{'coeficienteEntornoContribuyente'})
                  ->setCoeficienteEntornoZona($data->{'coeficienteEntornoZona'})
                  ->setCoeficienteEntornoPueblo($data->{'coeficienteEntornoPueblo'})
                  ->setIdContribuyenteUsoa($data->{'idContribuyenteUsoa'})
                  ->setNombre($data->{'nombre'})
                  ->setMunicipioId($data->{'municipioId'})
                  ->setCreatedOn($data->{'createdOn'})
                  ->setNif($data->{'nif'})
                  ->setCuenta($data->{'cuenta'})
                  ->setIntuitivo($data->{'intuitivo'})
                  ->setCodigoCalle($data->{'codigoCalle'})
                  ->setDireccion($data->{'direccion'})
                  ->setPortal($data->{'portal'})
                  ->setBis($data->{'bis'})
                  ->setEscalera($data->{'escalera'})
                  ->setPiso($data->{'piso'})
                  ->setMano($data->{'mano'})
                  ->setOtrosDomicilio($data->{'otrosDomicilio'})
                  ->setTarifa($data->{'tarifa'})
                  ->setCantidad($data->{'cantidad'})
                  ->setDireccionFiscal($data->{'direccionFiscal'})
                  ->setPortalFiscal($data->{'portalFiscal'})
                  ->setBisFiscal($data->{'bisFiscal'})
                  ->setEscaleraFiscal($data->{'escaleraFiscal'})
                  ->setPisoFiscal($data->{'pisoFiscal'})
                  ->setManoFiscal($data->{'manoFiscal'})
                  ->setLocalidadFiscal($data->{'localidadFiscal'})
                  ->setPkFiscal($data->{'pkFiscal'})
                  ->setProvinciaFiscal($data->{'provinciaFiscal'})
                  ->setExcluido($data->{'excluido'})
                  ->setIvr($data->{'ivr'});

        } else if ($data instanceof \Atezate\Model\Raw\Contribuyentes) {
            $entry->setContribuyenteId($data->getContribuyenteId())
                  ->setContribuyenteIden($data->getContribuyenteIden())
                  ->setCoeficienteEntornoContribuyente($data->getCoeficienteEntornoContribuyente())
                  ->setCoeficienteEntornoZona($data->getCoeficienteEntornoZona())
                  ->setCoeficienteEntornoPueblo($data->getCoeficienteEntornoPueblo())
                  ->setIdContribuyenteUsoa($data->getIdContribuyenteUsoa())
                  ->setNombre($data->getNombre())
                  ->setMunicipioId($data->getMunicipioId())
                  ->setCreatedOn($data->getCreatedOn())
                  ->setNif($data->getNif())
                  ->setCuenta($data->getCuenta())
                  ->setIntuitivo($data->getIntuitivo())
                  ->setCodigoCalle($data->getCodigoCalle())
                  ->setDireccion($data->getDireccion())
                  ->setPortal($data->getPortal())
                  ->setBis($data->getBis())
                  ->setEscalera($data->getEscalera())
                  ->setPiso($data->getPiso())
                  ->setMano($data->getMano())
                  ->setOtrosDomicilio($data->getOtrosDomicilio())
                  ->setTarifa($data->getTarifa())
                  ->setCantidad($data->getCantidad())
                  ->setDireccionFiscal($data->getDireccionFiscal())
                  ->setPortalFiscal($data->getPortalFiscal())
                  ->setBisFiscal($data->getBisFiscal())
                  ->setEscaleraFiscal($data->getEscaleraFiscal())
                  ->setPisoFiscal($data->getPisoFiscal())
                  ->setManoFiscal($data->getManoFiscal())
                  ->setLocalidadFiscal($data->getLocalidadFiscal())
                  ->setPkFiscal($data->getPkFiscal())
                  ->setProvinciaFiscal($data->getProvinciaFiscal())
                  ->setExcluido($data->getExcluido())
                  ->setIvr($data->getIvr());

        }

        $entry->resetChangeLog()->initChangeLog()->setMapper($this);

        return $entry;
    }
}
