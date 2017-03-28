<?php

/**
 * Application Model
 *
 * @package Atezate\Model\Raw
 * @subpackage Model
 * @author Victor Vargas
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity] No es posible eliminar Postes de los que dependan Cubos
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class Postes extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_postesId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_postesTiposId;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_fechaColocacion;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_baja;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_fechaBaja;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_postesIden;


    /**
     * Parent relation Postes_ibfk_1
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntosRecogida;

    /**
     * Parent relation Postes_ibfk_2
     *
     * @var \Atezate\Model\Raw\PostesTipos
     */
    protected $_PostesTipos;


    /**
     * Dependent relation Cubos_ibfk_5
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Cubos[]
     */
    protected $_Cubos;

    /**
     * Dependent relation Incidencias_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation Recogidas_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Recogidas[]
     */
    protected $_Recogidas;


    protected $_columnsList = array(
        'postesId'=>'postesId',
        'puntosRecogidaId'=>'puntosRecogidaId',
        'postesTiposId'=>'postesTiposId',
        'fechaColocacion'=>'fechaColocacion',
        'baja'=>'baja',
        'fechaBaja'=>'fechaBaja',
        'postesIden'=>'postesIden',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'postesTiposId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'PostesIbfk1'=> array(
                    'property' => 'PuntosRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
            'PostesIbfk2'=> array(
                    'property' => 'PostesTipos',
                    'table_name' => 'PostesTipos',
                ),
        ));

        $this->setDependentList(array(
            'CubosIbfk5' => array(
                    'property' => 'Cubos',
                    'table_name' => 'Cubos',
                ),
            'IncidenciasIbfk2' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'RecogidasIbfk3' => array(
                    'property' => 'Recogidas',
                    'table_name' => 'Recogidas',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Incidencias_ibfk_2'
        ));


        $this->_defaultValues = array(
            'baja' => '0',
        );

        $this->_initFileObjects();
        parent::__construct();
    }

    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }
    /**************************************************************************
    ************************** File System Object (FSO)************************
    ***************************************************************************/

    protected function _initFileObjects()
    {

        return $this;
    }

    public function getFileObjects()
    {

        return array();
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setPostesId($data)
    {

        if ($this->_postesId != $data) {
            $this->_logChange('postesId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_postesId = $data;
        } else if (!is_null($data)) {
            $this->_postesId = (int) $data;
        } else {
            $this->_postesId = $data;
        }
        return $this;
    }

    /**
     * Gets column postesId
     *
     * @return int
     */
    public function getPostesId()
    {
            return $this->_postesId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setPuntosRecogidaId($data)
    {

        if ($this->_puntosRecogidaId != $data) {
            $this->_logChange('puntosRecogidaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosRecogidaId = $data;
        } else if (!is_null($data)) {
            $this->_puntosRecogidaId = (int) $data;
        } else {
            $this->_puntosRecogidaId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosRecogidaId
     *
     * @return int
     */
    public function getPuntosRecogidaId()
    {
            return $this->_puntosRecogidaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setPostesTiposId($data)
    {

        if ($this->_postesTiposId != $data) {
            $this->_logChange('postesTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_postesTiposId = $data;
        } else if (!is_null($data)) {
            $this->_postesTiposId = (int) $data;
        } else {
            $this->_postesTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column postesTiposId
     *
     * @return int
     */
    public function getPostesTiposId()
    {
            return $this->_postesTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Postes
     */
    public function setFechaColocacion($data)
    {

        if ($data == '0000-00-00 00:00:00') {
            $data = null;
        }

        if ($data === 'CURRENT_TIMESTAMP') {
            $data = \Zend_Date::now()->setTimezone('UTC');
        }

        if ($data instanceof \Zend_Date) {

            $data = new \DateTime($data->toString('yyyy-MM-dd HH:mm:ss'), new \DateTimeZone($data->getTimezone()));

        } elseif (!is_null($data) && !$data instanceof \DateTime) {

            $data = new \DateTime($data, new \DateTimeZone('UTC'));
        }

        if ($data instanceof \DateTime && $data->getTimezone()->getName() != 'UTC') {

            $data->setTimezone(new \DateTimeZone('UTC'));
        }


        if ($this->_fechaColocacion != $data) {
            $this->_logChange('fechaColocacion');
        }


        $this->_fechaColocacion = $data;
        return $this;
    }

    /**
     * Gets column fechaColocacion
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaColocacion($returnZendDate = false)
    {
    
        if (is_null($this->_fechaColocacion)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaColocacion->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaColocacion->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setBaja($data)
    {

        if ($this->_baja != $data) {
            $this->_logChange('baja');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_baja = $data;
        } else if (!is_null($data)) {
            $this->_baja = (int) $data;
        } else {
            $this->_baja = $data;
        }
        return $this;
    }

    /**
     * Gets column baja
     *
     * @return int
     */
    public function getBaja()
    {
            return $this->_baja;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Postes
     */
    public function setFechaBaja($data)
    {

        if ($data == '0000-00-00 00:00:00') {
            $data = null;
        }

        if ($data === 'CURRENT_TIMESTAMP') {
            $data = \Zend_Date::now()->setTimezone('UTC');
        }

        if ($data instanceof \Zend_Date) {

            $data = new \DateTime($data->toString('yyyy-MM-dd HH:mm:ss'), new \DateTimeZone($data->getTimezone()));

        } elseif (!is_null($data) && !$data instanceof \DateTime) {

            $data = new \DateTime($data, new \DateTimeZone('UTC'));
        }

        if ($data instanceof \DateTime && $data->getTimezone()->getName() != 'UTC') {

            $data->setTimezone(new \DateTimeZone('UTC'));
        }


        if ($this->_fechaBaja != $data) {
            $this->_logChange('fechaBaja');
        }


        $this->_fechaBaja = $data;
        return $this;
    }

    /**
     * Gets column fechaBaja
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaBaja($returnZendDate = false)
    {
    
        if (is_null($this->_fechaBaja)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaBaja->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaBaja->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setPostesIden($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_postesIden != $data) {
            $this->_logChange('postesIden');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_postesIden = $data;
        } else if (!is_null($data)) {
            $this->_postesIden = (string) $data;
        } else {
            $this->_postesIden = $data;
        }
        return $this;
    }

    /**
     * Gets column postesIden
     *
     * @return string
     */
    public function getPostesIden()
    {
            return $this->_postesIden;
    }


    /**
     * Sets parent relation PuntosRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setPuntosRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntosRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntosRecogidaId($primaryKey);
        }

        $this->_setLoaded('PostesIbfk1');
        return $this;
    }

    /**
     * Gets parent PuntosRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PostesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogida = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntosRecogida;
    }

    /**
     * Sets parent relation PostesTipos
     *
     * @param \Atezate\Model\Raw\PostesTipos $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function setPostesTipos(\Atezate\Model\Raw\PostesTipos $data)
    {
        $this->_PostesTipos = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['postesTiposId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPostesTiposId($primaryKey);
        }

        $this->_setLoaded('PostesIbfk2');
        return $this;
    }

    /**
     * Gets parent PostesTipos
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function getPostesTipos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PostesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PostesTipos = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PostesTipos;
    }

    /**
     * Sets dependent relations Cubos_ibfk_5
     *
     * @param array $data An array of \Atezate\Model\Raw\Cubos
     * @return \Atezate\Model\Raw\Postes
     */
    public function setCubos(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Cubos === null) {

                $this->getCubos();
            }

            $oldRelations = $this->_Cubos;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_Cubos = array();

        foreach ($data as $object) {
            $this->addCubos($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Cubos_ibfk_5
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function addCubos(\Atezate\Model\Raw\Cubos $data)
    {
        $this->_Cubos[] = $data;
        $this->_setLoaded('CubosIbfk5');
        return $this;
    }

    /**
     * Gets dependent Cubos_ibfk_5
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Cubos
     */
    public function getCubos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk5';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Cubos = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Cubos;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\Postes
     */
    public function setIncidencias(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Incidencias === null) {

                $this->getIncidencias();
            }

            $oldRelations = $this->_Incidencias;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_Incidencias = array();

        foreach ($data as $object) {
            $this->addIncidencias($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_2
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk2');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Incidencias = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Incidencias;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\Recogidas
     * @return \Atezate\Model\Raw\Postes
     */
    public function setRecogidas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Recogidas === null) {

                $this->getRecogidas();
            }

            $oldRelations = $this->_Recogidas;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_Recogidas = array();

        foreach ($data as $object) {
            $this->addRecogidas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_3
     *
     * @param \Atezate\Model\Raw\Recogidas $data
     * @return \Atezate\Model\Raw\Postes
     */
    public function addRecogidas(\Atezate\Model\Raw\Recogidas $data)
    {
        $this->_Recogidas[] = $data;
        $this->_setLoaded('RecogidasIbfk3');
        return $this;
    }

    /**
     * Gets dependent Recogidas_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Recogidas
     */
    public function getRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Recogidas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Recogidas;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Postes
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Postes')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Postes);

            } else {

                 new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \Atezate\Model\Validator\Postes
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Postes')) {

                $this->setValidator(new \Atezate\Validator\Postes);
            }
        }

        return $this->_validator;
    }

    public function setFromArray($data)
    {
        return $this->getMapper()->loadModel($data, $this);
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
     * @see \Mapper\Sql\Postes::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPostesId() === null) {
            $this->_logger->log('The value for PostesId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'postesId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPostesId())
        );
    }
}
