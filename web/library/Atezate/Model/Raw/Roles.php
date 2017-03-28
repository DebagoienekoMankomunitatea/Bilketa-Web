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
class Roles extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_rol;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_descripcion;

    /**
     * Database var type float
     *
     * @var float
     */
    protected $_costeHora;



    /**
     * Dependent relation Operarios_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Operarios[]
     */
    protected $_Operarios;


    protected $_columnsList = array(
        'id'=>'id',
        'rol'=>'rol',
        'descripcion'=>'descripcion',
        'costeHora'=>'costeHora',
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
        ));

        $this->setDependentList(array(
            'OperariosIbfk1' => array(
                    'property' => 'Operarios',
                    'table_name' => 'Operarios',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Operarios_ibfk_1'
        ));


        $this->_defaultValues = array(
            'costeHora' => '0',
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
     * @return \Atezate\Model\Raw\Roles
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
     * @param string $data
     * @return \Atezate\Model\Raw\Roles
     */
    public function setRol($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_rol != $data) {
            $this->_logChange('rol');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_rol = $data;
        } else if (!is_null($data)) {
            $this->_rol = (string) $data;
        } else {
            $this->_rol = $data;
        }
        return $this;
    }

    /**
     * Gets column rol
     *
     * @return string
     */
    public function getRol()
    {
            return $this->_rol;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Roles
     */
    public function setDescripcion($data)
    {

        if ($this->_descripcion != $data) {
            $this->_logChange('descripcion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_descripcion = $data;
        } else if (!is_null($data)) {
            $this->_descripcion = (string) $data;
        } else {
            $this->_descripcion = $data;
        }
        return $this;
    }

    /**
     * Gets column descripcion
     *
     * @return text
     */
    public function getDescripcion()
    {
            return $this->_descripcion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Roles
     */
    public function setCosteHora($data)
    {

        if ($this->_costeHora != $data) {
            $this->_logChange('costeHora');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_costeHora = $data;
        } else if (!is_null($data)) {
            $this->_costeHora = (float) $data;
        } else {
            $this->_costeHora = $data;
        }
        return $this;
    }

    /**
     * Gets column costeHora
     *
     * @return float
     */
    public function getCosteHora()
    {
            return $this->_costeHora;
    }


    /**
     * Sets dependent relations Operarios_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Operarios
     * @return \Atezate\Model\Raw\Roles
     */
    public function setOperarios(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Operarios === null) {

                $this->getOperarios();
            }

            $oldRelations = $this->_Operarios;

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

        $this->_Operarios = array();

        foreach ($data as $object) {
            $this->addOperarios($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Operarios_ibfk_1
     *
     * @param \Atezate\Model\Raw\Operarios $data
     * @return \Atezate\Model\Raw\Roles
     */
    public function addOperarios(\Atezate\Model\Raw\Operarios $data)
    {
        $this->_Operarios[] = $data;
        $this->_setLoaded('OperariosIbfk1');
        return $this;
    }

    /**
     * Gets dependent Operarios_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Operarios
     */
    public function getOperarios($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'OperariosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Operarios = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Operarios;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Roles
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Roles')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Roles);

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
     * @return null | \Atezate\Model\Validator\Roles
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Roles')) {

                $this->setValidator(new \Atezate\Validator\Roles);
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
     * @see \Mapper\Sql\Roles::delete
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
