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
class CodigoApertura extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_centroEmergenciaId;

    /**
     * Database var type date
     *
     * @var string
     */
    protected $_fechaInicio;

    /**
     * Database var type date
     *
     * @var string
     */
    protected $_fechaVencimiento;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_codigo;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_contribuyenteId;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;

    /**
     * Campo que indica si la puerta ha recibido correctamente el\ncódigo de apertura.
     * Database var type tinyint
     *
     * @var int
     */
    protected $_grabado;


    /**
     * Parent relation CodigoApertura_ibfk_1
     *
     * @var \Atezate\Model\Raw\CentrosEmergencia
     */
    protected $_CentroEmergencia;

    /**
     * Parent relation CodigoApertura_ibfk_2
     *
     * @var \Atezate\Model\Raw\Contribuyentes
     */
    protected $_Contribuyente;



    protected $_columnsList = array(
        'id'=>'id',
        'centroEmergenciaId'=>'centroEmergenciaId',
        'fechaInicio'=>'fechaInicio',
        'fechaVencimiento'=>'fechaVencimiento',
        'codigo'=>'codigo',
        'contribuyenteId'=>'contribuyenteId',
        'createdOn'=>'createdOn',
        'grabado'=>'grabado',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'grabado'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'CodigoAperturaIbfk1'=> array(
                    'property' => 'CentroEmergencia',
                    'table_name' => 'CentrosEmergencia',
                ),
            'CodigoAperturaIbfk2'=> array(
                    'property' => 'Contribuyente',
                    'table_name' => 'Contribuyentes',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'createdOn' => 'CURRENT_TIMESTAMP',
            'grabado' => '0',
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
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        if (!is_null($data)) {
            $this->_id = (int) $data;
        } else {
            $this->_id = $data;
        }
        return $this;
    }

    /**
     * Gets column id
     *
     * @return int
     */
    public function getId()
    {
            return $this->_id;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setCentroEmergenciaId($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_centroEmergenciaId != $data) {
            $this->_logChange('centroEmergenciaId');
        }

        if (!is_null($data)) {
            $this->_centroEmergenciaId = (int) $data;
        } else {
            $this->_centroEmergenciaId = $data;
        }
        return $this;
    }

    /**
     * Gets column centroEmergenciaId
     *
     * @return int
     */
    public function getCentroEmergenciaId()
    {
            return $this->_centroEmergenciaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setFechaInicio($data)
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
        if ($this->_fechaInicio != $data) {
            $this->_logChange('fechaInicio');
        }

        $this->_fechaInicio = $data;
        return $this;
    }

    /**
     * Gets column fechaInicio
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaInicio($returnZendDate = false)
    {
    
        if (is_null($this->_fechaInicio)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaInicio->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaInicio->format('Y-m-d');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setFechaVencimiento($data)
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
        if ($this->_fechaVencimiento != $data) {
            $this->_logChange('fechaVencimiento');
        }

        $this->_fechaVencimiento = $data;
        return $this;
    }

    /**
     * Gets column fechaVencimiento
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaVencimiento($returnZendDate = false)
    {
    
        if (is_null($this->_fechaVencimiento)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaVencimiento->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaVencimiento->format('Y-m-d');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setCodigo($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_codigo != $data) {
            $this->_logChange('codigo');
        }

        if (!is_null($data)) {
            $this->_codigo = (string) $data;
        } else {
            $this->_codigo = $data;
        }
        return $this;
    }

    /**
     * Gets column codigo
     *
     * @return string
     */
    public function getCodigo()
    {
            return $this->_codigo;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setContribuyenteId($data)
    {

        if ($this->_contribuyenteId != $data) {
            $this->_logChange('contribuyenteId');
        }

        if (!is_null($data)) {
            $this->_contribuyenteId = (int) $data;
        } else {
            $this->_contribuyenteId = $data;
        }
        return $this;
    }

    /**
     * Gets column contribuyenteId
     *
     * @return int
     */
    public function getContribuyenteId()
    {
            return $this->_contribuyenteId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\CodigoApertura
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
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setGrabado($data)
    {

        if ($this->_grabado != $data) {
            $this->_logChange('grabado');
        }

        if (!is_null($data)) {
            $this->_grabado = (int) $data;
        } else {
            $this->_grabado = $data;
        }
        return $this;
    }

    /**
     * Gets column grabado
     *
     * @return int
     */
    public function getGrabado()
    {
            return $this->_grabado;
    }


    /**
     * Sets parent relation CentroEmergencia
     *
     * @param \Atezate\Model\Raw\CentrosEmergencia $data
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setCentroEmergencia(\Atezate\Model\Raw\CentrosEmergencia $data)
    {
        $this->_CentroEmergencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setCentroEmergenciaId($primaryKey);
        }

        $this->_setLoaded('CodigoAperturaIbfk1');
        return $this;
    }

    /**
     * Gets parent CentroEmergencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function getCentroEmergencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigoAperturaIbfk1';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_CentroEmergencia = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_CentroEmergencia;
    }

    /**
     * Sets parent relation Contribuyente
     *
     * @param \Atezate\Model\Raw\Contribuyentes $data
     * @return \Atezate\Model\Raw\CodigoApertura
     */
    public function setContribuyente(\Atezate\Model\Raw\Contribuyentes $data)
    {
        $this->_Contribuyente = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['contribuyenteId'];
        }

        if (!is_null($primaryKey)) {
            $this->setContribuyenteId($primaryKey);
        }

        $this->_setLoaded('CodigoAperturaIbfk2');
        return $this;
    }

    /**
     * Gets parent Contribuyente
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyente($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigoAperturaIbfk2';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Contribuyente = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Contribuyente;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CodigoApertura
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CodigoApertura')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CodigoApertura);

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
     * @return null | \Atezate\Model\Validator\CodigoApertura
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CodigoApertura')) {

                $this->setValidator(new \Atezate\Validator\CodigoApertura);
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
     * @see \Mapper\Sql\CodigoApertura::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getId() === null) {
            $this->_logger->log('The value for Id cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'id = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getId())
        );
    }
}
