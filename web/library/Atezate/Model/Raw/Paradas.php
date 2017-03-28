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
 * [entity]
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class Paradas extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_paradaId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_turnosCamionesId;

    /**
     * Database var type time
     *
     * @var string
     */
    protected $_horaInicio;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_finalizado;

    /**
     * Database var type time
     *
     * @var string
     */
    protected $_horaFinal;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidasId;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;


    /**
     * Parent relation Paradas_ibfk_1
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones
     */
    protected $_TurnosCamiones;

    /**
     * Parent relation Paradas_ibfk_2
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntosRecogidas;


    /**
     * Dependent relation Incidencias_ibfk_12
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation Recogidas_ibfk_5
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Recogidas[]
     */
    protected $_Recogidas;


    protected $_columnsList = array(
        'paradaId'=>'paradaId',
        'turnosCamionesId'=>'turnosCamionesId',
        'horaInicio'=>'horaInicio',
        'finalizado'=>'finalizado',
        'horaFinal'=>'horaFinal',
        'puntosRecogidasId'=>'puntosRecogidasId',
        'createdOn'=>'createdOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'puntosRecogidasId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'ParadasIbfk1'=> array(
                    'property' => 'TurnosCamiones',
                    'table_name' => 'TurnosRelCamiones',
                ),
            'ParadasIbfk2'=> array(
                    'property' => 'PuntosRecogidas',
                    'table_name' => 'PuntosRecogida',
                ),
        ));

        $this->setDependentList(array(
            'IncidenciasIbfk12' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'RecogidasIbfk5' => array(
                    'property' => 'Recogidas',
                    'table_name' => 'Recogidas',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Incidencias_ibfk_12'
        ));


        $this->_defaultValues = array(
            'finalizado' => '0',
            'createdOn' => 'CURRENT_TIMESTAMP',
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
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setParadaId($data)
    {

        if ($this->_paradaId != $data) {
            $this->_logChange('paradaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_paradaId = $data;
        } else if (!is_null($data)) {
            $this->_paradaId = (int) $data;
        } else {
            $this->_paradaId = $data;
        }
        return $this;
    }

    /**
     * Gets column paradaId
     *
     * @return int
     */
    public function getParadaId()
    {
            return $this->_paradaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setTurnosCamionesId($data)
    {

        if ($this->_turnosCamionesId != $data) {
            $this->_logChange('turnosCamionesId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_turnosCamionesId = $data;
        } else if (!is_null($data)) {
            $this->_turnosCamionesId = (int) $data;
        } else {
            $this->_turnosCamionesId = $data;
        }
        return $this;
    }

    /**
     * Gets column turnosCamionesId
     *
     * @return int
     */
    public function getTurnosCamionesId()
    {
            return $this->_turnosCamionesId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setHoraInicio($data)
    {

        if ($data == '0000-00-00 00:00:00') {
            $data = null;
        }

        if ($data === 'CURRENT_TIMESTAMP' || is_null($data)) {
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


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_horaInicio != $data) {
            $this->_logChange('horaInicio');
        }


        $this->_horaInicio = $data;
        return $this;
    }

    /**
     * Gets column horaInicio
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getHoraInicio($returnZendDate = false)
    {
    
        if (is_null($this->_horaInicio)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_horaInicio->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_horaInicio->format('H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setFinalizado($data)
    {

        if ($this->_finalizado != $data) {
            $this->_logChange('finalizado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_finalizado = $data;
        } else if (!is_null($data)) {
            $this->_finalizado = (int) $data;
        } else {
            $this->_finalizado = $data;
        }
        return $this;
    }

    /**
     * Gets column finalizado
     *
     * @return int
     */
    public function getFinalizado()
    {
            return $this->_finalizado;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setHoraFinal($data)
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


        if ($this->_horaFinal != $data) {
            $this->_logChange('horaFinal');
        }


        $this->_horaFinal = $data;
        return $this;
    }

    /**
     * Gets column horaFinal
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getHoraFinal($returnZendDate = false)
    {
    
        if (is_null($this->_horaFinal)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_horaFinal->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_horaFinal->format('H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setPuntosRecogidasId($data)
    {

        if ($this->_puntosRecogidasId != $data) {
            $this->_logChange('puntosRecogidasId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosRecogidasId = $data;
        } else if (!is_null($data)) {
            $this->_puntosRecogidasId = (int) $data;
        } else {
            $this->_puntosRecogidasId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosRecogidasId
     *
     * @return int
     */
    public function getPuntosRecogidasId()
    {
            return $this->_puntosRecogidasId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setCreatedOn($data)
    {

        if ($data == '0000-00-00 00:00:00') {
            $data = null;
        }

        if ($data === 'CURRENT_TIMESTAMP' || is_null($data)) {
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


        if ($this->_createdOn != $data) {
            $this->_logChange('createdOn');
        }


        $this->_createdOn = $data;
        return $this;
    }

    /**
     * Gets column createdOn
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getCreatedOn($returnZendDate = false)
    {
    
        if (is_null($this->_createdOn)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_createdOn->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_createdOn->format('Y-m-d H:i:s');

    }


    /**
     * Sets parent relation TurnosCamiones
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setTurnosCamiones(\Atezate\Model\Raw\TurnosRelCamiones $data)
    {
        $this->_TurnosCamiones = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setTurnosCamionesId($primaryKey);
        }

        $this->_setLoaded('ParadasIbfk1');
        return $this;
    }

    /**
     * Gets parent TurnosCamiones
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ParadasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_TurnosCamiones = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_TurnosCamiones;
    }

    /**
     * Sets parent relation PuntosRecogidas
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function setPuntosRecogidas(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntosRecogidas = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntosRecogidasId($primaryKey);
        }

        $this->_setLoaded('ParadasIbfk2');
        return $this;
    }

    /**
     * Gets parent PuntosRecogidas
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntosRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ParadasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogidas = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntosRecogidas;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_12
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\Paradas
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
     * Sets dependent relations Incidencias_ibfk_12
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk12');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_12
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk12';

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
     * Sets dependent relations Recogidas_ibfk_5
     *
     * @param array $data An array of \Atezate\Model\Raw\Recogidas
     * @return \Atezate\Model\Raw\Paradas
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
     * Sets dependent relations Recogidas_ibfk_5
     *
     * @param \Atezate\Model\Raw\Recogidas $data
     * @return \Atezate\Model\Raw\Paradas
     */
    public function addRecogidas(\Atezate\Model\Raw\Recogidas $data)
    {
        $this->_Recogidas[] = $data;
        $this->_setLoaded('RecogidasIbfk5');
        return $this;
    }

    /**
     * Gets dependent Recogidas_ibfk_5
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Recogidas
     */
    public function getRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk5';

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
     * @return Atezate\Mapper\Sql\Paradas
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Paradas')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Paradas);

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
     * @return null | \Atezate\Model\Validator\Paradas
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Paradas')) {

                $this->setValidator(new \Atezate\Validator\Paradas);
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
     * @see \Mapper\Sql\Paradas::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getParadaId() === null) {
            $this->_logger->log('The value for ParadaId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'paradaId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getParadaId())
        );
    }
}
