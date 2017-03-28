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
class LogSms extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_smsMensajeId;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_mensaje;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_incidenciaId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_telefono;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_plantillasSmsId;


    /**
     * Parent relation LogSms_ibfk_1
     *
     * @var \Atezate\Model\Raw\Incidencias
     */
    protected $_Incidencia;

    /**
     * Parent relation LogSms_ibfk_2
     *
     * @var \Atezate\Model\Raw\PlantillasSms
     */
    protected $_PlantillasSms;



    protected $_columnsList = array(
        'smsMensajeId'=>'smsMensajeId',
        'mensaje'=>'mensaje',
        'createdOn'=>'createdOn',
        'incidenciaId'=>'incidenciaId',
        'telefono'=>'telefono',
        'plantillasSmsId'=>'plantillasSmsId',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'incidenciaId'=> array(''),
            'plantillasSmsId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'LogSmsIbfk1'=> array(
                    'property' => 'Incidencia',
                    'table_name' => 'Incidencias',
                ),
            'LogSmsIbfk2'=> array(
                    'property' => 'PlantillasSms',
                    'table_name' => 'PlantillasSms',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'createdOn' => 'CURRENT_TIMESTAMP',
            'telefono' => '',
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
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setSmsMensajeId($data)
    {

        if ($this->_smsMensajeId != $data) {
            $this->_logChange('smsMensajeId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_smsMensajeId = $data;
        } else if (!is_null($data)) {
            $this->_smsMensajeId = (int) $data;
        } else {
            $this->_smsMensajeId = $data;
        }
        return $this;
    }

    /**
     * Gets column smsMensajeId
     *
     * @return int
     */
    public function getSmsMensajeId()
    {
            return $this->_smsMensajeId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setMensaje($data)
    {

        if ($this->_mensaje != $data) {
            $this->_logChange('mensaje');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_mensaje = $data;
        } else if (!is_null($data)) {
            $this->_mensaje = (string) $data;
        } else {
            $this->_mensaje = $data;
        }
        return $this;
    }

    /**
     * Gets column mensaje
     *
     * @return text
     */
    public function getMensaje()
    {
            return $this->_mensaje;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\LogSms
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
     * @param int $data
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setIncidenciaId($data)
    {

        if ($this->_incidenciaId != $data) {
            $this->_logChange('incidenciaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_incidenciaId = $data;
        } else if (!is_null($data)) {
            $this->_incidenciaId = (int) $data;
        } else {
            $this->_incidenciaId = $data;
        }
        return $this;
    }

    /**
     * Gets column incidenciaId
     *
     * @return int
     */
    public function getIncidenciaId()
    {
            return $this->_incidenciaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setTelefono($data)
    {

        if ($this->_telefono != $data) {
            $this->_logChange('telefono');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_telefono = $data;
        } else if (!is_null($data)) {
            $this->_telefono = (string) $data;
        } else {
            $this->_telefono = $data;
        }
        return $this;
    }

    /**
     * Gets column telefono
     *
     * @return string
     */
    public function getTelefono()
    {
            return $this->_telefono;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setPlantillasSmsId($data)
    {

        if ($this->_plantillasSmsId != $data) {
            $this->_logChange('plantillasSmsId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasSmsId = $data;
        } else if (!is_null($data)) {
            $this->_plantillasSmsId = (int) $data;
        } else {
            $this->_plantillasSmsId = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasSmsId
     *
     * @return int
     */
    public function getPlantillasSmsId()
    {
            return $this->_plantillasSmsId;
    }


    /**
     * Sets parent relation Incidencia
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setIncidencia(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['incidenciaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setIncidenciaId($primaryKey);
        }

        $this->_setLoaded('LogSmsIbfk1');
        return $this;
    }

    /**
     * Gets parent Incidencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogSmsIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Incidencia = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Incidencia;
    }

    /**
     * Sets parent relation PlantillasSms
     *
     * @param \Atezate\Model\Raw\PlantillasSms $data
     * @return \Atezate\Model\Raw\LogSms
     */
    public function setPlantillasSms(\Atezate\Model\Raw\PlantillasSms $data)
    {
        $this->_PlantillasSms = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setPlantillasSmsId($primaryKey);
        }

        $this->_setLoaded('LogSmsIbfk2');
        return $this;
    }

    /**
     * Gets parent PlantillasSms
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PlantillasSms
     */
    public function getPlantillasSms($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogSmsIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PlantillasSms = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PlantillasSms;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\LogSms
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\LogSms')) {

                $this->setMapper(new \Atezate\Mapper\Sql\LogSms);

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
     * @return null | \Atezate\Model\Validator\LogSms
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\LogSms')) {

                $this->setValidator(new \Atezate\Validator\LogSms);
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
     * @see \Mapper\Sql\LogSms::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getSmsMensajeId() === null) {
            $this->_logger->log('The value for SmsMensajeId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'smsMensajeId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getSmsMensajeId())
        );
    }
}
