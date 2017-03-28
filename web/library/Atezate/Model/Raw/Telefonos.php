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
class Telefonos extends ModelAbstract
{

    protected $_tipoAcceptedValues = array(
        'movil',
        'fijo',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_telefonoId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_contribuyenteId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_telefono;

    /**
     * [enum:movil|fijo]
     * Database var type varchar
     *
     * @var string
     */
    protected $_tipo;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;


    /**
     * Parent relation telefonos_ibfk_1
     *
     * @var \Atezate\Model\Raw\Contribuyentes
     */
    protected $_Contribuyente;



    protected $_columnsList = array(
        'telefonoId'=>'telefonoId',
        'contribuyenteId'=>'contribuyenteId',
        'telefono'=>'telefono',
        'tipo'=>'tipo',
        'createdOn'=>'createdOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'tipo'=> array('enum:movil|fijo'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'TelefonosIbfk1'=> array(
                    'property' => 'Contribuyente',
                    'table_name' => 'Contribuyentes',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'tipo' => 'movil',
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
     * @return \Atezate\Model\Raw\Telefonos
     */
    public function setTelefonoId($data)
    {

        if ($this->_telefonoId != $data) {
            $this->_logChange('telefonoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_telefonoId = $data;
        } else if (!is_null($data)) {
            $this->_telefonoId = (int) $data;
        } else {
            $this->_telefonoId = $data;
        }
        return $this;
    }

    /**
     * Gets column telefonoId
     *
     * @return int
     */
    public function getTelefonoId()
    {
            return $this->_telefonoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Telefonos
     */
    public function setContribuyenteId($data)
    {

        if ($this->_contribuyenteId != $data) {
            $this->_logChange('contribuyenteId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_contribuyenteId = $data;
        } else if (!is_null($data)) {
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
     * @param string $data
     * @return \Atezate\Model\Raw\Telefonos
     */
    public function setTelefono($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @param string $data
     * @return \Atezate\Model\Raw\Telefonos
     */
    public function setTipo($data)
    {

        if ($this->_tipo != $data) {
            $this->_logChange('tipo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipo = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_tipoAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for tipo'));
            }
            $this->_tipo = (string) $data;
        } else {
            $this->_tipo = $data;
        }
        return $this;
    }

    /**
     * Gets column tipo
     *
     * @return string
     */
    public function getTipo()
    {
            return $this->_tipo;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Telefonos
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
     * Sets parent relation Contribuyente
     *
     * @param \Atezate\Model\Raw\Contribuyentes $data
     * @return \Atezate\Model\Raw\Telefonos
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

        $this->_setLoaded('TelefonosIbfk1');
        return $this;
    }

    /**
     * Gets parent Contribuyente
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyente($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TelefonosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Contribuyente = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Contribuyente;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Telefonos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Telefonos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Telefonos);

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
     * @return null | \Atezate\Model\Validator\Telefonos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Telefonos')) {

                $this->setValidator(new \Atezate\Validator\Telefonos);
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
     * @see \Mapper\Sql\Telefonos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getTelefonoId() === null) {
            $this->_logger->log('The value for TelefonoId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'telefonoId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getTelefonoId())
        );
    }
}
