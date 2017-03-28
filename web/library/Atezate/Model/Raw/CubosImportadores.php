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
class CubosImportadores extends ModelAbstract
{
    /*
     * @var \Iron_Model_Fso
     */
    protected $_csvFso;

    protected $_estadoAcceptedValues = array(
        'pendiente',
        'importando',
        'importado',
        'error',
    );

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
    protected $_csvFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_csvMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_csvBaseName;

    /**
     * [enum:pendiente|importando|importado|error]
     * Database var type varchar
     *
     * @var string
     */
    protected $_estado;




    protected $_columnsList = array(
        'id'=>'id',
        'csvFileSize'=>'csvFileSize',
        'csvMimeType'=>'csvMimeType',
        'csvBaseName'=>'csvBaseName',
        'estado'=>'estado',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'csvFileSize'=> array('FSO'),
            'estado'=> array('enum:pendiente|importando|importado|error'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'estado' => 'pendiente',
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
        $this->_csvFso = new \Iron_Model_Fso($this, $this->getCsvSpecs());

        return $this;
    }

    public function getFileObjects()
    {

        return array('csv');
    }

    public function getCsvSpecs()
    {
        return array(
            'basePath' => 'csv',
            'sizeName' => 'csvFileSize',
            'mimeName' => 'csvMimeType',
            'baseNameName' => 'csvBaseName',
        );
    }

    public function putCsv($filePath = '',$baseName = '')
    {
        $this->_csvFso->put($filePath);

        if (!empty($baseName)) {

            $this->_csvFso->setBaseName($baseName);
        }
    }

    public function fetchCsv($autoload = true)
    {
        if ($autoload === true && $this->getcsvFileSize() > 0) {

            $this->_csvFso->fetch();
        }

        return $this->_csvFso;
    }

    public function removeCsv()
    {
        $this->_csvFso->remove();

        $this->_csvFso = null;

        return true;
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CubosImportadores
     */
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_id = $data;
        } else if (!is_null($data)) {
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
     * @return \Atezate\Model\Raw\CubosImportadores
     */
    public function setCsvFileSize($data)
    {

        if ($this->_csvFileSize != $data) {
            $this->_logChange('csvFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_csvFileSize = $data;
        } else if (!is_null($data)) {
            $this->_csvFileSize = (int) $data;
        } else {
            $this->_csvFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column csvFileSize
     *
     * @return int
     */
    public function getCsvFileSize()
    {
            return $this->_csvFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CubosImportadores
     */
    public function setCsvMimeType($data)
    {

        if ($this->_csvMimeType != $data) {
            $this->_logChange('csvMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_csvMimeType = $data;
        } else if (!is_null($data)) {
            $this->_csvMimeType = (string) $data;
        } else {
            $this->_csvMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column csvMimeType
     *
     * @return string
     */
    public function getCsvMimeType()
    {
            return $this->_csvMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CubosImportadores
     */
    public function setCsvBaseName($data)
    {

        if ($this->_csvBaseName != $data) {
            $this->_logChange('csvBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_csvBaseName = $data;
        } else if (!is_null($data)) {
            $this->_csvBaseName = (string) $data;
        } else {
            $this->_csvBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column csvBaseName
     *
     * @return string
     */
    public function getCsvBaseName()
    {
            return $this->_csvBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CubosImportadores
     */
    public function setEstado($data)
    {

        if ($this->_estado != $data) {
            $this->_logChange('estado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_estado = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_estadoAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for estado'));
            }
            $this->_estado = (string) $data;
        } else {
            $this->_estado = $data;
        }
        return $this;
    }

    /**
     * Gets column estado
     *
     * @return string
     */
    public function getEstado()
    {
            return $this->_estado;
    }


    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CubosImportadores
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CubosImportadores')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CubosImportadores);

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
     * @return null | \Atezate\Model\Validator\CubosImportadores
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CubosImportadores')) {

                $this->setValidator(new \Atezate\Validator\CubosImportadores);
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
     * @see \Mapper\Sql\CubosImportadores::delete
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
