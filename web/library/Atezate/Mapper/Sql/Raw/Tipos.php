<?php

/**
 * Application Model Mapper
 *
 * @package Atezate\Mapper\Sql
 * @subpackage Raw
 * @author Irontec
 * @copyright ZF model generator Rev. 149

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Atezate\Model\Tipos
 *
 * @package Atezate\Mapper\Sql
 * @subpackage Raw
 * @author Irontec
 */

namespace Atezate\Mapper\Sql\Raw;
class Tipos extends MapperAbstract
{
    protected $_modelName = 'Atezate\\Model\\Tipos';


    protected $_urlIdentifiers = array();

    /**
     * Returns an array, keys are the field names.
     *
     * @param Atezate\Model\Tipos $model
     * @return array
     */
    public function toArray($model)
    {
        if (!$model instanceof \Atezate\Model\Tipos) {
            throw new \Exception('Unable to create array: invalid model passed to mapper', 2000);
        }

        $result = array(
            'tipoId' => $model->getTipoId(),
            'tipo_eu' => $model->getTipoEu(),
            'tipo_es' => $model->getTipoEs(),
            'createdOn' => $model->getCreatedOn(),
            'updateOn' => $model->getUpdateOn(),
        );

        return $result;
    }

    /**
     * Returns the DbTable class associated with this mapper
     *
     * @return Atezate\\Mapper\\Sql\\DbTable\\Tipos
     */
    public function getDbTable()
    {
        if (is_null($this->_dbTable)) {
            $this->setDbTable('Atezate\\Mapper\\Sql\\DbTable\\Tipos');
        }

        return $this->_dbTable;
    }

    /**
     * Deletes the current model
     *
     * @param Atezate\Model\Tipos $model The model to delete
     * @see Atezate\Mapper\DbTable\TableAbstract::delete()
     * @return int
     */
    public function delete(\Atezate\Model\Raw\ModelAbstract $model)
    {
        if (!$model instanceof \Atezate\Model\Tipos) {
            throw new \Exception('Unable to delete: invalid model passed to mapper', 2000);
        }

        $useTransaction = true;

        try {

            $this->getDbTable()->getAdapter()->beginTransaction();

        } catch (\Exception $e) {

            //Transaction already started
            $useTransaction = false;
        }

        try {

            //onDeleteCascades emulation
            if ($this->_simulateReferencialActions && count($deleteCascade = $model->getOnDeleteCascadeRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteCascade as $fk) {

                    $capitzalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitzalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitzalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'Atezate\\Mapper\\Sql\\DbTable\\' . $depList[$capitzalizedFk]["table_name"];
                        $depMapperName = 'Atezate\\Mapper\\Sql\\' . $depList[$capitzalizedFk]["table_name"];
                        $depModelName = 'Atezate\\Model\\' . $depList[$capitzalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('Atezate\\Mapper\\Sql\\DbTable\\Tipos', $capitzalizedFk);

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

                    $capitzalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitzalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitzalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'Atezate\\Mapper\\Sql\\DbTable\\' . $depList[$capitzalizedFk]["table_name"];
                        $depMapperName = 'Atezate\\Mapper\\Sql\\' . $depList[$capitzalizedFk]["table_name"];
                        $depModelName = 'Atezate\\Model\\' . $depList[$capitzalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('Atezate\\Mapper\\Sql\\DbTable\\Tipos', $capitzalizedFk);

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

            $where = $this->getDbTable()->getAdapter()->quoteInto('tipoId = ?', $model->getTipoId());
            $result = $this->getDbTable()->delete($where);

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
                $this->getDbTable()->getAdapter()->commit();
            }

        } catch (\Exception $exception) {

            if ($useTransaction) {

                $this->getDbTable()->getAdapter()->rollback();
            }

            throw $exception;
        }

        return $result;
    }

    /**
     * Saves current row
     * @return boolean If the save action was successful
     */
    public function save(\Atezate\Model\Tipos $model)
    {
        return $this->_save($model, false, false);
    }

    /**
     * Saves current and all dependent rows
     *
     * @param \Atezate\Model\Tipos $model
     * @param boolean $useTransaction Flag to indicate if save should be done inside a database transaction
     * @return boolean If the save action was successful
     */
    public function saveRecursive(\Atezate\Model\Tipos $model, $useTransaction = true, $transactionTag = null)
    {
        return $this->_save($model, true, $useTransaction, $transactionTag);
    }

    protected function _save(\Atezate\Model\Tipos $model,
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

        $primaryKey = $model->getTipoId();
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

        unset($data['tipoId']);

        try {
            if (is_null($primaryKey) || empty($primaryKey)) {
                $primaryKey = $this->getDbTable()->insert($data);
                if ($primaryKey) {
                    $model->setTipoId($primaryKey);
                } else {
                    Throw new \Exception("Insert sentence did not return a valid primary key", 9000);
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
                                 'tipoId = ?' => $primaryKey
                         )
                     );
            }

            if (is_numeric($primaryKey) && !empty($fileObjects)) {

                foreach ($fileObjects as $key => $fso) {

                    $baseName = $fso->getBaseName();

                    if (!empty($baseName)) {

                        $fso->flush($primaryKey);
                    }
                }
            }


            if ($recursive) {
                if ($model->getIncidencias(null, null, true) !== null) {
                    $incidencias = $model->getIncidencias();

                    if (!is_array($incidencias)) {

                        $incidencias = array($incidencias);
                    }

                    foreach ($incidencias as $value) {
                        $value->setTipoId($primaryKey)
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

            Throw $e;
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
     * @param Atezate\Model\Tipos|null $entry The object to load the data into, or null to have one created
     * @return Atezate\Model\Tipos The model with the data provided
     */
    public function loadModel($data, $entry = null)
    {
        if (!$entry) {
            $entry = new \Atezate\Model\Tipos();
        }

        if (is_array($data)) {
            $entry->setTipoId($data['tipoId'])
                  ->setTipoEu($data['tipo_eu'])
                  ->setTipoEs($data['tipo_es'])
                  ->setCreatedOn($data['createdOn'])
                  ->setUpdateOn($data['updateOn']);
        } else if ($data instanceof \Zend_Db_Table_Row_Abstract || $data instanceof \stdClass) {
            $entry->setTipoId($data->{'tipoId'})
                  ->setTipoEu($data->{'tipo_eu'})
                  ->setTipoEs($data->{'tipo_es'})
                  ->setCreatedOn($data->{'createdOn'})
                  ->setUpdateOn($data->{'updateOn'});

        } else if ($data instanceof \Atezate\Model\Tipos) {
            $entry->setTipoId($data->getTipoId())
                  ->setTipoEu($data->getTipoEu())
                  ->setTipoEs($data->getTipoEs())
                  ->setCreatedOn($data->getCreatedOn())
                  ->setUpdateOn($data->getUpdateOn());

        }

        $entry->resetChangeLog()->initChangeLog()->setMapper($this);

        return $entry;
    }
}
