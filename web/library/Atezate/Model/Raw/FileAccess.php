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
class FileAccess extends ModelAbstract
{
    /*
     * @var \Iron_Model_Fso
     */
    protected $_accessFso;


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_accessFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_accessMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_accessBaseName;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_uploadOn;




    protected $_columnsList = array(
        'id'=>'id',
        'accessFileSize'=>'accessFileSize',
        'accessMimeType'=>'accessMimeType',
        'accessBaseName'=>'accessBaseName',
        'uploadOn'=>'uploadOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'accessFileSize'=> array('FSO'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'uploadOn' => 'CURRENT_TIMESTAMP',
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
        $this->_accessFso = new \Iron_Model_Fso($this, $this->getAccessSpecs());

        return $this;
    }

    public function getFileObjects()
    {

        return array('access');
    }

    public function getAccessSpecs()
    {
        return array(
            'basePath' => 'access',
            'sizeName' => 'accessFileSize',
            'mimeName' => 'accessMimeType',
            'baseNameName' => 'accessBaseName',
        );
    }

    public function putAccess($filePath = '',$baseName = '')
    {
        $this->_accessFso->put($filePath);

        if (!empty($baseName)) {

            $this->_accessFso->setBaseName($baseName);
        }
    }

    public function fetchAccess($autoload = true)
    {
        if ($autoload === true && $this->getaccessFileSize() > 0) {

            $this->_accessFso->fetch();
        }

        return $this->_accessFso;
    }

    public function removeAccess()
    {
        $this->_accessFso->remove();

        $this->_accessFso = null;

        return true;
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\FileAccess
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
     * @return \Atezate\Model\Raw\FileAccess
     */
    public function setAccessFileSize($data)
    {

        if ($this->_accessFileSize != $data) {
            $this->_logChange('accessFileSize');
        }

        if (!is_null($data)) {
            $this->_accessFileSize = (int) $data;
        } else {
            $this->_accessFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column accessFileSize
     *
     * @return int
     */
    public function getAccessFileSize()
    {
            return $this->_accessFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\FileAccess
     */
    public function setAccessMimeType($data)
    {

        if ($this->_accessMimeType != $data) {
            $this->_logChange('accessMimeType');
        }

        if (!is_null($data)) {
            $this->_accessMimeType = (string) $data;
        } else {
            $this->_accessMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column accessMimeType
     *
     * @return string
     */
    public function getAccessMimeType()
    {
            return $this->_accessMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\FileAccess
     */
    public function setAccessBaseName($data)
    {

        if ($this->_accessBaseName != $data) {
            $this->_logChange('accessBaseName');
        }

        if (!is_null($data)) {
            $this->_accessBaseName = (string) $data;
        } else {
            $this->_accessBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column accessBaseName
     *
     * @return string
     */
    public function getAccessBaseName()
    {
            return $this->_accessBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\FileAccess
     */
    public function setUploadOn($data)
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


        if ($this->_uploadOn != $data) {
            $this->_logChange('uploadOn');
        }

        $this->_uploadOn = $data;
        return $this;
    }

    /**
     * Gets column uploadOn
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getUploadOn($returnZendDate = false)
    {
    
        if (is_null($this->_uploadOn)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_uploadOn->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_uploadOn->format('Y-m-d H:i:s');

    }


    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\FileAccess
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\FileAccess')) {

                $this->setMapper(new \Atezate\Mapper\Sql\FileAccess);

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
     * @return null | \Atezate\Model\Validator\FileAccess
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\FileAccess')) {

                $this->setValidator(new \Atezate\Validator\FileAccess);
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
     * @see \Mapper\Sql\FileAccess::delete
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
