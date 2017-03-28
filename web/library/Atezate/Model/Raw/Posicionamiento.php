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
class Posicionamiento extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_posicionamientoId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_turnosCamionesId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_precision;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_fecha;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;

    /**
     * geometry column :: 4326
     * Database var type float
     *
     * @var float
     */
    protected $_posicion;

    /**
     * [map]
     * Database var type varchar
     *
     * @var string
     */
    protected $_posicionAddr;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_posicionLat;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_posicionLng;


    /**
     * Parent relation Posicionamiento_ibfk_1
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones
     */
    protected $_TurnosCamiones;



    protected $_columnsList = array(
        'posicionamientoId'=>'posicionamientoId',
        'turnosCamionesId'=>'turnosCamionesId',
        'precision'=>'precision',
        'fecha'=>'fecha',
        'createdOn'=>'createdOn',
        'posicion'=>'posicion',
        'posicionAddr'=>'posicionAddr',
        'posicionLat'=>'posicionLat',
        'posicionLng'=>'posicionLng',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'posicion'=> array(''),
            'posicionAddr'=> array('map'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'PosicionamientoIbfk1'=> array(
                    'property' => 'TurnosCamiones',
                    'table_name' => 'TurnosRelCamiones',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
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
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicionamientoId($data)
    {

        if ($this->_posicionamientoId != $data) {
            $this->_logChange('posicionamientoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionamientoId = $data;
        } else if (!is_null($data)) {
            $this->_posicionamientoId = (int) $data;
        } else {
            $this->_posicionamientoId = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionamientoId
     *
     * @return int
     */
    public function getPosicionamientoId()
    {
            return $this->_posicionamientoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Posicionamiento
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
     * @param string $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPrecision($data)
    {

        if ($this->_precision != $data) {
            $this->_logChange('precision');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_precision = $data;
        } else if (!is_null($data)) {
            $this->_precision = (string) $data;
        } else {
            $this->_precision = $data;
        }
        return $this;
    }

    /**
     * Gets column precision
     *
     * @return string
     */
    public function getPrecision()
    {
            return $this->_precision;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Posicionamiento
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


        return $this->_fecha->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Posicionamiento
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
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicion($data)
    {

        if ($this->_posicion != $data) {
            $this->_logChange('posicion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicion = $data;
        } else if (!is_null($data)) {
            $this->_posicion = (float) $data;
        } else {
            $this->_posicion = $data;
        }
        return $this;
    }

    /**
     * Gets column posicion
     *
     * @return float
     */
    public function getPosicion()
    {
            return $this->_posicion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicionAddr($data)
    {

        if ($this->_posicionAddr != $data) {
            $this->_logChange('posicionAddr');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionAddr = $data;
        } else if (!is_null($data)) {
            $this->_posicionAddr = (string) $data;
        } else {
            $this->_posicionAddr = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionAddr
     *
     * @return string
     */
    public function getPosicionAddr()
    {
            return $this->_posicionAddr;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicionLat($data)
    {

        if ($this->_posicionLat != $data) {
            $this->_logChange('posicionLat');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionLat = $data;
        } else if (!is_null($data)) {
            $this->_posicionLat = (float) $data;
        } else {
            $this->_posicionLat = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionLat
     *
     * @return float
     */
    public function getPosicionLat()
    {
            return $this->_posicionLat;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicionLng($data)
    {

        if ($this->_posicionLng != $data) {
            $this->_logChange('posicionLng');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionLng = $data;
        } else if (!is_null($data)) {
            $this->_posicionLng = (float) $data;
        } else {
            $this->_posicionLng = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionLng
     *
     * @return float
     */
    public function getPosicionLng()
    {
            return $this->_posicionLng;
    }


    /**
     * Sets parent relation TurnosCamiones
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\Posicionamiento
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

        $this->_setLoaded('PosicionamientoIbfk1');
        return $this;
    }

    /**
     * Gets parent TurnosCamiones
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PosicionamientoIbfk1';

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
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Posicionamiento
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Posicionamiento')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Posicionamiento);

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
     * @return null | \Atezate\Model\Validator\Posicionamiento
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Posicionamiento')) {

                $this->setValidator(new \Atezate\Validator\Posicionamiento);
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
     * @see \Mapper\Sql\Posicionamiento::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPosicionamientoId() === null) {
            $this->_logger->log('The value for PosicionamientoId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'posicionamientoId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPosicionamientoId())
        );
    }
}
