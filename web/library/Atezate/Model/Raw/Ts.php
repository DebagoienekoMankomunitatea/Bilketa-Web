<?php

/**
 * Application Model
 *
 * @package Atezate\Model\Raw
 * @subpackage Model
 * @author Victor Vargas
 * @copyright ZF model generator Rev. 170

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
class Ts extends ModelAbstract
{
    /**
     * Database var type mediumint(8) unsigned
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type varchar(255)
     *
     * @var string
     */
    protected $_marca;

    /**
     * Database var type varchar(255)
     *
     * @var string
     */
    protected $_imei;



    /**
     * Dependent relation TurnosRelCamiones_ibfk_4
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\TurnosRelCamiones[]
     */
    protected $_TurnosRelCamiones;

    protected $_columnsList = array(
        'id'=>'id',
        'marca'=>'marca',
        'imei'=>'imei',
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
            'TurnosRelCamionesIbfk4' => array(
                    'property' => 'TurnosRelCamiones',
                    'table_name' => 'TurnosRelCamiones',
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
     * Sets column id
     *
     * @param int $data
     * @return \Atezate\Model\Ts
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
     * Sets column marca
     *
     * @param string $data
     * @return \Atezate\Model\Ts
     */
    public function setMarca($data)
    {
        if ($this->_marca != $data) {

            $this->_logChange('marca');
        }
		if (!is_null($data)) {
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
     * Sets column imei
     *
     * @param string $data
     * @return \Atezate\Model\Ts
     */
    public function setImei($data)
    {
        if ($this->_imei != $data) {

            $this->_logChange('imei');
        }
		if (!is_null($data)) {
        	$this->_imei = (string) $data;
       	} else {
       	    $this->_imei = $data;
       	}
        return $this;
    }

    /**
     * Gets column imei
     *
     * @return string
     */
    public function getImei()
    {
    
        return $this->_imei;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_4
     *
     * @param array $data An array of \Atezate\Model\TurnosRelCamiones
     * @return \Atezate\Model\Ts
     */
    public function setTurnosRelCamiones(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_TurnosRelCamiones === null) {

                $this->getTurnosRelCamiones();
            }

            $oldRelations = $this->_TurnosRelCamiones;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    if (is_numeric($pk = $newItem->getPrimaryKey())) {

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

        $this->_TurnosRelCamiones = array();

        foreach ($data as $object) {
            $this->addTurnosRelCamiones($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_4
     *
     * @param \Atezate\Model\TurnosRelCamiones $data
     * @return \Atezate\Model\Ts
     */
    public function addTurnosRelCamiones(\Atezate\Model\TurnosRelCamiones $data)
    {
        $this->_TurnosRelCamiones[] = $data;
        $this->_setLoaded('TurnosRelCamionesIbfk4');
        return $this;
    }

    /**
     * Gets dependent TurnosRelCamiones_ibfk_4
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\TurnosRelCamiones
     */
    public function getTurnosRelCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk4';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_TurnosRelCamiones = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_TurnosRelCamiones;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Ts
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Ts')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Ts);

            } else {

                Throw new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \Atezate\Model\Validator\Ts
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Ts')) {

                $this->setValidator(new \Atezate\Validator\Ts);
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
     * @see \Mapper\Sql\Ts::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getId() === null) {
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'id = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getId())
        );
    }
}
