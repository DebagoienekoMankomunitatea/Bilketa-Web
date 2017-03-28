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
class Emails extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_emailId;

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
    protected $_email;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;


    /**
     * Parent relation emails_ibfk_1
     *
     * @var \Atezate\Model\Raw\Contribuyentes
     */
    protected $_Contribuyente;



    protected $_columnsList = array(
        'emailId'=>'emailId',
        'contribuyenteId'=>'contribuyenteId',
        'email'=>'email',
        'createdOn'=>'createdOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'EmailsIbfk1'=> array(
                    'property' => 'Contribuyente',
                    'table_name' => 'Contribuyentes',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'email' => '',
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
     * @return \Atezate\Model\Raw\Emails
     */
    public function setEmailId($data)
    {

        if ($this->_emailId != $data) {
            $this->_logChange('emailId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_emailId = $data;
        } else if (!is_null($data)) {
            $this->_emailId = (int) $data;
        } else {
            $this->_emailId = $data;
        }
        return $this;
    }

    /**
     * Gets column emailId
     *
     * @return int
     */
    public function getEmailId()
    {
            return $this->_emailId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Emails
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
     * @return \Atezate\Model\Raw\Emails
     */
    public function setEmail($data)
    {

        if ($this->_email != $data) {
            $this->_logChange('email');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_email = $data;
        } else if (!is_null($data)) {
            $this->_email = (string) $data;
        } else {
            $this->_email = $data;
        }
        return $this;
    }

    /**
     * Gets column email
     *
     * @return string
     */
    public function getEmail()
    {
            return $this->_email;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Emails
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
     * @return \Atezate\Model\Raw\Emails
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

        $this->_setLoaded('EmailsIbfk1');
        return $this;
    }

    /**
     * Gets parent Contribuyente
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyente($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'EmailsIbfk1';

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
     * @return Atezate\Mapper\Sql\Emails
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Emails')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Emails);

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
     * @return null | \Atezate\Model\Validator\Emails
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Emails')) {

                $this->setValidator(new \Atezate\Validator\Emails);
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
     * @see \Mapper\Sql\Emails::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getEmailId() === null) {
            $this->_logger->log('The value for EmailId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'emailId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getEmailId())
        );
    }
}
