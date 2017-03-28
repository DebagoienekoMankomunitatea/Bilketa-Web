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
class Turnos extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_turnoId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_rutaId;

    /**
     * Database var type date
     *
     * @var string
     */
    protected $_fecha;

    /**
     * Database var type time
     *
     * @var string
     */
    protected $_horaInicio;

    /**
     * Todos los puntos quemados -> fecha última descarga
     * Database var type time
     *
     * @var string
     */
    protected $_horaFinal;

    /**
     * Database var type float
     *
     * @var float
     */
    protected $_coste;


    /**
     * Parent relation Turnos_ibfk_1
     *
     * @var \Atezate\Model\Raw\Rutas
     */
    protected $_Ruta;


    /**
     * Dependent relation TurnosRelCamiones_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones[]
     */
    protected $_TurnosRelCamiones;


    protected $_columnsList = array(
        'turnoId'=>'turnoId',
        'rutaId'=>'rutaId',
        'fecha'=>'fecha',
        'horaInicio'=>'horaInicio',
        'horaFinal'=>'horaFinal',
        'coste'=>'coste',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'rutaId'=> array(''),
            'horaFinal'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'TurnosIbfk1'=> array(
                    'property' => 'Ruta',
                    'table_name' => 'Rutas',
                ),
        ));

        $this->setDependentList(array(
            'TurnosRelCamionesIbfk1' => array(
                    'property' => 'TurnosRelCamiones',
                    'table_name' => 'TurnosRelCamiones',
                ),
        ));




        $this->_defaultValues = array(
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
     * @return \Atezate\Model\Raw\Turnos
     */
    public function setTurnoId($data)
    {

        if ($this->_turnoId != $data) {
            $this->_logChange('turnoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_turnoId = $data;
        } else if (!is_null($data)) {
            $this->_turnoId = (int) $data;
        } else {
            $this->_turnoId = $data;
        }
        return $this;
    }

    /**
     * Gets column turnoId
     *
     * @return int
     */
    public function getTurnoId()
    {
            return $this->_turnoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Turnos
     */
    public function setRutaId($data)
    {

        if ($this->_rutaId != $data) {
            $this->_logChange('rutaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_rutaId = $data;
        } else if (!is_null($data)) {
            $this->_rutaId = (int) $data;
        } else {
            $this->_rutaId = $data;
        }
        return $this;
    }

    /**
     * Gets column rutaId
     *
     * @return int
     */
    public function getRutaId()
    {
            return $this->_rutaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Turnos
     */
    public function setFecha($data)
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

        if ($this->_fecha != $data) {
            $this->_logChange('fecha');
        }


        $this->_fecha = $data;
        return $this;
    }

    /**
     * Gets column fecha
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFecha($returnZendDate = false)
    {
    
        if (is_null($this->_fecha)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fecha->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fecha->format('Y-m-d');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Turnos
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
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Turnos
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
     * @param float $data
     * @return \Atezate\Model\Raw\Turnos
     */
    public function setCoste($data)
    {

        if ($this->_coste != $data) {
            $this->_logChange('coste');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_coste = $data;
        } else if (!is_null($data)) {
            $this->_coste = (float) $data;
        } else {
            $this->_coste = $data;
        }
        return $this;
    }

    /**
     * Gets column coste
     *
     * @return float
     */
    public function getCoste()
    {
            return $this->_coste;
    }


    /**
     * Sets parent relation Ruta
     *
     * @param \Atezate\Model\Raw\Rutas $data
     * @return \Atezate\Model\Raw\Turnos
     */
    public function setRuta(\Atezate\Model\Raw\Rutas $data)
    {
        $this->_Ruta = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['rutaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setRutaId($primaryKey);
        }

        $this->_setLoaded('TurnosIbfk1');
        return $this;
    }

    /**
     * Gets parent Ruta
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Rutas
     */
    public function getRuta($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Ruta = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Ruta;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\TurnosRelCamiones
     * @return \Atezate\Model\Raw\Turnos
     */
    public function setTurnosRelCamiones(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_TurnosRelCamiones === null) {

                $this->getTurnosRelCamiones();
            }

            $oldRelations = $this->_TurnosRelCamiones;

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

        $this->_TurnosRelCamiones = array();

        foreach ($data as $object) {
            $this->addTurnosRelCamiones($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_1
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\Turnos
     */
    public function addTurnosRelCamiones(\Atezate\Model\Raw\TurnosRelCamiones $data)
    {
        $this->_TurnosRelCamiones[] = $data;
        $this->_setLoaded('TurnosRelCamionesIbfk1');
        return $this;
    }

    /**
     * Gets dependent TurnosRelCamiones_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosRelCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_TurnosRelCamiones = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_TurnosRelCamiones;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Turnos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Turnos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Turnos);

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
     * @return null | \Atezate\Model\Validator\Turnos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Turnos')) {

                $this->setValidator(new \Atezate\Validator\Turnos);
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
     * @see \Mapper\Sql\Turnos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getTurnoId() === null) {
            $this->_logger->log('The value for TurnoId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'turnoId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getTurnoId())
        );
    }
}
