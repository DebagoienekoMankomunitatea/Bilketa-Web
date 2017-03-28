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
class RecogidaTipos extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_recogidaTiposId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nombre;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_descripcion;



    /**
     * Dependent relation Recogidas_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Recogidas[]
     */
    protected $_Recogidas;


    protected $_columnsList = array(
        'recogidaTiposId'=>'recogidaTiposId',
        'nombre'=>'nombre',
        'descripcion'=>'descripcion',
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
            'RecogidasIbfk1' => array(
                    'property' => 'Recogidas',
                    'table_name' => 'Recogidas',
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
     * @return \Atezate\Model\Raw\RecogidaTipos
     */
    public function setRecogidaTiposId($data)
    {

        if ($this->_recogidaTiposId != $data) {
            $this->_logChange('recogidaTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_recogidaTiposId = $data;
        } else if (!is_null($data)) {
            $this->_recogidaTiposId = (int) $data;
        } else {
            $this->_recogidaTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column recogidaTiposId
     *
     * @return int
     */
    public function getRecogidaTiposId()
    {
            return $this->_recogidaTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\RecogidaTipos
     */
    public function setNombre($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_nombre != $data) {
            $this->_logChange('nombre');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nombre = $data;
        } else if (!is_null($data)) {
            $this->_nombre = (string) $data;
        } else {
            $this->_nombre = $data;
        }
        return $this;
    }

    /**
     * Gets column nombre
     *
     * @return string
     */
    public function getNombre()
    {
            return $this->_nombre;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\RecogidaTipos
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
     * Sets dependent relations Recogidas_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Recogidas
     * @return \Atezate\Model\Raw\RecogidaTipos
     */
    public function setRecogidas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Recogidas === null) {

                $this->getRecogidas();
            }

            $oldRelations = $this->_Recogidas;

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

        $this->_Recogidas = array();

        foreach ($data as $object) {
            $this->addRecogidas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_1
     *
     * @param \Atezate\Model\Raw\Recogidas $data
     * @return \Atezate\Model\Raw\RecogidaTipos
     */
    public function addRecogidas(\Atezate\Model\Raw\Recogidas $data)
    {
        $this->_Recogidas[] = $data;
        $this->_setLoaded('RecogidasIbfk1');
        return $this;
    }

    /**
     * Gets dependent Recogidas_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Recogidas
     */
    public function getRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Recogidas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Recogidas;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\RecogidaTipos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\RecogidaTipos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\RecogidaTipos);

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
     * @return null | \Atezate\Model\Validator\RecogidaTipos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\RecogidaTipos')) {

                $this->setValidator(new \Atezate\Validator\RecogidaTipos);
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
     * @see \Mapper\Sql\RecogidaTipos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getRecogidaTiposId() === null) {
            $this->_logger->log('The value for RecogidaTiposId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'recogidaTiposId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getRecogidaTiposId())
        );
    }
}
