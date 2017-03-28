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
class Importadores extends ModelAbstract
{
    /*
     * @var \Iron_Model_Fso
     */
    protected $_archivoFso;

    protected $_tipoAcceptedValues = array(
        'contribuyente',
        'poste',
    );
    protected $_classNameAcceptedValues = array(
        'debagoiena',
        'debagoiena2',
        'eskoriatza',
        'bergara',
    );
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
    protected $_archivoFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_archivoMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_archivoBaseName;

    /**
     * [enum:contribuyente|poste]
     * Database var type varchar
     *
     * @var string
     */
    protected $_tipo;

    /**
     * [enum:debagoiena|debagoiena2|eskoriatza|bergara]
     * Database var type varchar
     *
     * @var string
     */
    protected $_className;

    /**
     * [enum:pendiente|importando|importado|error]
     * Database var type varchar
     *
     * @var string
     */
    protected $_estado;




    protected $_columnsList = array(
        'id'=>'id',
        'archivoFileSize'=>'archivoFileSize',
        'archivoMimeType'=>'archivoMimeType',
        'archivoBaseName'=>'archivoBaseName',
        'tipo'=>'tipo',
        'className'=>'className',
        'estado'=>'estado',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'archivoFileSize'=> array('FSO'),
            'tipo'=> array('enum:contribuyente|poste'),
            'className'=> array('enum:debagoiena|debagoiena2|eskoriatza|bergara'),
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
        $this->_archivoFso = new \Iron_Model_Fso($this, $this->getArchivoSpecs());

        return $this;
    }

    public function getFileObjects()
    {

        return array('archivo');
    }

    public function getArchivoSpecs()
    {
        return array(
            'basePath' => 'archivo',
            'sizeName' => 'archivoFileSize',
            'mimeName' => 'archivoMimeType',
            'baseNameName' => 'archivoBaseName',
        );
    }

    public function putArchivo($filePath = '',$baseName = '')
    {
        $this->_archivoFso->put($filePath);

        if (!empty($baseName)) {

            $this->_archivoFso->setBaseName($baseName);
        }
    }

    public function fetchArchivo($autoload = true)
    {
        if ($autoload === true && $this->getarchivoFileSize() > 0) {

            $this->_archivoFso->fetch();
        }

        return $this->_archivoFso;
    }

    public function removeArchivo()
    {
        $this->_archivoFso->remove();

        $this->_archivoFso = null;

        return true;
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Importadores
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
     * @return \Atezate\Model\Raw\Importadores
     */
    public function setArchivoFileSize($data)
    {

        if ($this->_archivoFileSize != $data) {
            $this->_logChange('archivoFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_archivoFileSize = $data;
        } else if (!is_null($data)) {
            $this->_archivoFileSize = (int) $data;
        } else {
            $this->_archivoFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column archivoFileSize
     *
     * @return int
     */
    public function getArchivoFileSize()
    {
            return $this->_archivoFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Importadores
     */
    public function setArchivoMimeType($data)
    {

        if ($this->_archivoMimeType != $data) {
            $this->_logChange('archivoMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_archivoMimeType = $data;
        } else if (!is_null($data)) {
            $this->_archivoMimeType = (string) $data;
        } else {
            $this->_archivoMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column archivoMimeType
     *
     * @return string
     */
    public function getArchivoMimeType()
    {
            return $this->_archivoMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Importadores
     */
    public function setArchivoBaseName($data)
    {

        if ($this->_archivoBaseName != $data) {
            $this->_logChange('archivoBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_archivoBaseName = $data;
        } else if (!is_null($data)) {
            $this->_archivoBaseName = (string) $data;
        } else {
            $this->_archivoBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column archivoBaseName
     *
     * @return string
     */
    public function getArchivoBaseName()
    {
            return $this->_archivoBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Importadores
     */
    public function setTipo($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @param string $data
     * @return \Atezate\Model\Raw\Importadores
     */
    public function setClassName($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_className != $data) {
            $this->_logChange('className');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_className = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_classNameAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for className'));
            }
            $this->_className = (string) $data;
        } else {
            $this->_className = $data;
        }
        return $this;
    }

    /**
     * Gets column className
     *
     * @return string
     */
    public function getClassName()
    {
            return $this->_className;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Importadores
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
     * @return Atezate\Mapper\Sql\Importadores
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Importadores')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Importadores);

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
     * @return null | \Atezate\Model\Validator\Importadores
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Importadores')) {

                $this->setValidator(new \Atezate\Validator\Importadores);
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
     * @see \Mapper\Sql\Importadores::delete
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
