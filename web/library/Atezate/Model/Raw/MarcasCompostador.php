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
class MarcasCompostador extends ModelAbstract
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
    protected $_marca;

    /**
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
     * Dependent relation Compostadores_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Compostadores[]
     */
    protected $_Compostadores;


    protected $_columnsList = array(
        'id'=>'id',
        'marca'=>'marca',
        'tipo'=>'tipo',
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
        ));

        $this->setDependentList(array(
            'CompostadoresIbfk1' => array(
                    'property' => 'Compostadores',
                    'table_name' => 'Compostadores',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Compostadores_ibfk_1'
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
     * @return \Atezate\Model\Raw\MarcasCompostador
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
     * @return \Atezate\Model\Raw\MarcasCompostador
     */
    public function setMarca($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_marca != $data) {
            $this->_logChange('marca');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_marca = $data;
        } else if (!is_null($data)) {
            $this->_marca = (string) $data;
        } else {
            $this->_marca = $data;
        }
        return $this;
    }

    /**
     * Gets column marca
     *
     * @return string
     */
    public function getMarca()
    {
            return $this->_marca;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\MarcasCompostador
     */
    public function setTipo($data)
    {

        if ($this->_tipo != $data) {
            $this->_logChange('tipo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipo = $data;
        } else if (!is_null($data)) {
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
     * @return \Atezate\Model\Raw\MarcasCompostador
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
     * Sets dependent relations Compostadores_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Compostadores
     * @return \Atezate\Model\Raw\MarcasCompostador
     */
    public function setCompostadores(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Compostadores === null) {

                $this->getCompostadores();
            }

            $oldRelations = $this->_Compostadores;

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

        $this->_Compostadores = array();

        foreach ($data as $object) {
            $this->addCompostadores($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Compostadores_ibfk_1
     *
     * @param \Atezate\Model\Raw\Compostadores $data
     * @return \Atezate\Model\Raw\MarcasCompostador
     */
    public function addCompostadores(\Atezate\Model\Raw\Compostadores $data)
    {
        $this->_Compostadores[] = $data;
        $this->_setLoaded('CompostadoresIbfk1');
        return $this;
    }

    /**
     * Gets dependent Compostadores_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Compostadores
     */
    public function getCompostadores($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CompostadoresIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Compostadores = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Compostadores;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\MarcasCompostador
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\MarcasCompostador')) {

                $this->setMapper(new \Atezate\Mapper\Sql\MarcasCompostador);

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
     * @return null | \Atezate\Model\Validator\MarcasCompostador
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\MarcasCompostador')) {

                $this->setValidator(new \Atezate\Validator\MarcasCompostador);
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
     * @see \Mapper\Sql\MarcasCompostador::delete
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
