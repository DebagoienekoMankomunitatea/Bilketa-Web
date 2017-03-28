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
 * Data Mapper implementation for Atezate\Model\Municipios
 *
 * @package Atezate\Mapper\Sql
 * @subpackage Raw
 * @author Victor Vargas
 */

namespace Atezate\Mapper\Sql\Raw;
class Municipios extends MapperAbstract
{
    protected $_modelName = 'Atezate\\Model\\Municipios';


    protected $_urlIdentifiers = array();

    /**
     * Returns an array, keys are the field names.
     *
     * @param Atezate\Model\Raw\Municipios $model
     * @return array
     */
    public function toArray($model)
    {
        if (!$model instanceof \Atezate\Model\Raw\Municipios) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \Atezate\Model\Raw\Municipios object in toArray for " . get_class($this);
            } else {
                $message = "$model is not a \\Atezate\Model\\Municipios object in toArray for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to create array: invalid model passed to mapper', 2000);
        }

        $result = array(
            'municipioId' => $model->getMunicipioId(),
            'municipio' => $model->getMunicipio(),
            'esLocFileSize' => $model->getEsLocFileSize(),
            'esLocMimeType' => $model->getEsLocMimeType(),
            'esLocBaseName' => $model->getEsLocBaseName(),
            'euLocFileSize' => $model->getEuLocFileSize(),
            'euLocMimeType' => $model->getEuLocMimeType(),
            'euLocBaseName' => $model->getEuLocBaseName(),
            'esLocCodificadoFileSize' => $model->getEsLocCodificadoFileSize(),
            'esLocCodificadoMimeType' => $model->getEsLocCodificadoMimeType(),
            'esLocCodificadoBaseName' => $model->getEsLocCodificadoBaseName(),
            'euLocCodificadoFileSize' => $model->getEuLocCodificadoFileSize(),
            'euLocCodificadoMimeType' => $model->getEuLocCodificadoMimeType(),
            'euLocCodificadoBaseName' => $model->getEuLocCodificadoBaseName(),
            'estado' => $model->getEstado(),
            'createdOn' => $model->getCreatedOn(),
        );

        return $result;
    }

    /**
     * Returns the DbTable class associated with this mapper
     *
     * @return Atezate\\Mapper\\Sql\\DbTable\\Municipios
     */
    public function getDbTable()
    {
        if (is_null($this->_dbTable)) {
            $this->setDbTable('Atezate\\Mapper\\Sql\\DbTable\\Municipios');
        }

        return $this->_dbTable;
    }

    /**
     * Deletes the current model
     *
     * @param Atezate\Model\Raw\Municipios $model The model to delete
     * @see Atezate\Mapper\DbTable\TableAbstract::delete()
     * @return int
     */
    public function delete(\Atezate\Model\Raw\ModelAbstract $model)
    {
        if (!$model instanceof \Atezate\Model\Raw\Municipios) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \\Atezate\\Model\\Municipios object in delete for " . get_class($this);
            } else {
                $message = "$model is not a \\Atezate\\Model\\Municipios object in delete for " . get_class($this);
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
                            $references = $relDbAdapter->getReference('Atezate\\Mapper\\Sql\\DbTable\\Municipios', $capitalizedFk);

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
                            $references = $relDbAdapter->getReference('Atezate\\Mapper\\Sql\\DbTable\\Municipios', $capitalizedFk);

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

            $where = $dbAdapter->quoteInto($dbAdapter->quoteIdentifier('municipioId') . ' = ?', $model->getMunicipioId());
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
    public function save(\Atezate\Model\Raw\Municipios $model)
    {
        return $this->_save($model, false, false);
    }

    /**
     * Saves current and all dependent rows
     *
     * @param \Atezate\Model\Raw\Municipios $model
     * @param boolean $useTransaction Flag to indicate if save should be done inside a database transaction
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function saveRecursive(\Atezate\Model\Raw\Municipios $model, $useTransaction = true, $transactionTag = null)
    {
        return $this->_save($model, true, $useTransaction, $transactionTag);
    }

    protected function _save(\Atezate\Model\Raw\Municipios $model,
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

        $primaryKey = $model->getMunicipioId();
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

        unset($data['municipioId']);

        try {
            if (is_null($primaryKey) || empty($primaryKey)) {

                $primaryKey = $this->getDbTable()->insert($data);

                if ($primaryKey) {
                    $model->setMunicipioId($primaryKey);
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
                             $this->getDbTable()->getAdapter()->quoteIdentifier('municipioId') . ' = ?' => $primaryKey
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
                if ($model->getCodigosApertura(null, null, true) !== null) {
                    $codigosApertura = $model->getCodigosApertura();

                    if (!is_array($codigosApertura)) {

                        $codigosApertura = array($codigosApertura);
                    }

                    foreach ($codigosApertura as $value) {
                        $value->setMunicipioId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getCodigosAperturaPrivados(null, null, true) !== null) {
                    $codigosAperturaPrivados = $model->getCodigosAperturaPrivados();

                    if (!is_array($codigosAperturaPrivados)) {

                        $codigosAperturaPrivados = array($codigosAperturaPrivados);
                    }

                    foreach ($codigosAperturaPrivados as $value) {
                        $value->setMunicipioId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getContribuyentes(null, null, true) !== null) {
                    $contribuyentes = $model->getContribuyentes();

                    if (!is_array($contribuyentes)) {

                        $contribuyentes = array($contribuyentes);
                    }

                    foreach ($contribuyentes as $value) {
                        $value->setMunicipioId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getMunicipiosRelCercaniaByMunicipio(null, null, true) !== null) {
                    $municipiosRelCercania = $model->getMunicipiosRelCercaniaByMunicipio();

                    if (!is_array($municipiosRelCercania)) {

                        $municipiosRelCercania = array($municipiosRelCercania);
                    }

                    foreach ($municipiosRelCercania as $value) {
                        $value->setMunicipioId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getMunicipiosRelCercaniaByMunicipioCercano(null, null, true) !== null) {
                    $municipiosRelCercania = $model->getMunicipiosRelCercaniaByMunicipioCercano();

                    if (!is_array($municipiosRelCercania)) {

                        $municipiosRelCercania = array($municipiosRelCercania);
                    }

                    foreach ($municipiosRelCercania as $value) {
                        $value->setMunicipioCercanoId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getMunicipiosRelCodigosPostales(null, null, true) !== null) {
                    $municipiosRelCodigosPostales = $model->getMunicipiosRelCodigosPostales();

                    if (!is_array($municipiosRelCodigosPostales)) {

                        $municipiosRelCodigosPostales = array($municipiosRelCodigosPostales);
                    }

                    foreach ($municipiosRelCodigosPostales as $value) {
                        $value->setMunicipioId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getPuntosRecogida(null, null, true) !== null) {
                    $puntosRecogida = $model->getPuntosRecogida();

                    if (!is_array($puntosRecogida)) {

                        $puntosRecogida = array($puntosRecogida);
                    }

                    foreach ($puntosRecogida as $value) {
                        $value->setMunicipioId($primaryKey)
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
     * @param Atezate\Model\Raw\Municipios|null $entry The object to load the data into, or null to have one created
     * @return Atezate\Model\Raw\Municipios The model with the data provided
     */
    public function loadModel($data, $entry = null)
    {
        if (!$entry) {
            $entry = new \Atezate\Model\Municipios();
        }

        // We don't need to log changes as we will reset them later...
        $entry->stopChangeLog();

        if (is_array($data)) {
            $entry->setMunicipioId($data['municipioId'])
                  ->setMunicipio($data['municipio'])
                  ->setEsLocFileSize($data['esLocFileSize'])
                  ->setEsLocMimeType($data['esLocMimeType'])
                  ->setEsLocBaseName($data['esLocBaseName'])
                  ->setEuLocFileSize($data['euLocFileSize'])
                  ->setEuLocMimeType($data['euLocMimeType'])
                  ->setEuLocBaseName($data['euLocBaseName'])
                  ->setEsLocCodificadoFileSize($data['esLocCodificadoFileSize'])
                  ->setEsLocCodificadoMimeType($data['esLocCodificadoMimeType'])
                  ->setEsLocCodificadoBaseName($data['esLocCodificadoBaseName'])
                  ->setEuLocCodificadoFileSize($data['euLocCodificadoFileSize'])
                  ->setEuLocCodificadoMimeType($data['euLocCodificadoMimeType'])
                  ->setEuLocCodificadoBaseName($data['euLocCodificadoBaseName'])
                  ->setEstado($data['estado'])
                  ->setCreatedOn($data['createdOn']);
        } else if ($data instanceof \Zend_Db_Table_Row_Abstract || $data instanceof \stdClass) {
            $entry->setMunicipioId($data->{'municipioId'})
                  ->setMunicipio($data->{'municipio'})
                  ->setEsLocFileSize($data->{'esLocFileSize'})
                  ->setEsLocMimeType($data->{'esLocMimeType'})
                  ->setEsLocBaseName($data->{'esLocBaseName'})
                  ->setEuLocFileSize($data->{'euLocFileSize'})
                  ->setEuLocMimeType($data->{'euLocMimeType'})
                  ->setEuLocBaseName($data->{'euLocBaseName'})
                  ->setEsLocCodificadoFileSize($data->{'esLocCodificadoFileSize'})
                  ->setEsLocCodificadoMimeType($data->{'esLocCodificadoMimeType'})
                  ->setEsLocCodificadoBaseName($data->{'esLocCodificadoBaseName'})
                  ->setEuLocCodificadoFileSize($data->{'euLocCodificadoFileSize'})
                  ->setEuLocCodificadoMimeType($data->{'euLocCodificadoMimeType'})
                  ->setEuLocCodificadoBaseName($data->{'euLocCodificadoBaseName'})
                  ->setEstado($data->{'estado'})
                  ->setCreatedOn($data->{'createdOn'});

        } else if ($data instanceof \Atezate\Model\Raw\Municipios) {
            $entry->setMunicipioId($data->getMunicipioId())
                  ->setMunicipio($data->getMunicipio())
                  ->setEsLocFileSize($data->getEsLocFileSize())
                  ->setEsLocMimeType($data->getEsLocMimeType())
                  ->setEsLocBaseName($data->getEsLocBaseName())
                  ->setEuLocFileSize($data->getEuLocFileSize())
                  ->setEuLocMimeType($data->getEuLocMimeType())
                  ->setEuLocBaseName($data->getEuLocBaseName())
                  ->setEsLocCodificadoFileSize($data->getEsLocCodificadoFileSize())
                  ->setEsLocCodificadoMimeType($data->getEsLocCodificadoMimeType())
                  ->setEsLocCodificadoBaseName($data->getEsLocCodificadoBaseName())
                  ->setEuLocCodificadoFileSize($data->getEuLocCodificadoFileSize())
                  ->setEuLocCodificadoMimeType($data->getEuLocCodificadoMimeType())
                  ->setEuLocCodificadoBaseName($data->getEuLocCodificadoBaseName())
                  ->setEstado($data->getEstado())
                  ->setCreatedOn($data->getCreatedOn());

        }

        $entry->resetChangeLog()->initChangeLog()->setMapper($this);

        return $entry;
    }
}
