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
class PuntosRecogidaTipos extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaTiposId;

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
     * Dependent relation PuntosRecogida_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\PuntosRecogida[]
     */
    protected $_PuntosRecogida;


    protected $_columnsList = array(
        'puntosRecogidaTiposId'=>'puntosRecogidaTiposId',
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
            'PuntosRecogidaIbfk1' => array(
                    'property' => 'PuntosRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'PuntosRecogida_ibfk_1'
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
     * @return \Atezate\Model\Raw\PuntosRecogidaTipos
     */
    public function setPuntosRecogidaTiposId($data)
    {

        if ($this->_puntosRecogidaTiposId != $data) {
            $this->_logChange('puntosRecogidaTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosRecogidaTiposId = $data;
        } else if (!is_null($data)) {
            $this->_puntosRecogidaTiposId = (int) $data;
        } else {
            $this->_puntosRecogidaTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosRecogidaTiposId
     *
     * @return int
     */
    public function getPuntosRecogidaTiposId()
    {
            return $this->_puntosRecogidaTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosRecogidaTipos
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
     * @return \Atezate\Model\Raw\PuntosRecogidaTipos
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
     * Sets dependent relations PuntosRecogida_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\PuntosRecogida
     * @return \Atezate\Model\Raw\PuntosRecogidaTipos
     */
    public function setPuntosRecogida(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_PuntosRecogida === null) {

                $this->getPuntosRecogida();
            }

            $oldRelations = $this->_PuntosRecogida;

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

        $this->_PuntosRecogida = array();

        foreach ($data as $object) {
            $this->addPuntosRecogida($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations PuntosRecogida_ibfk_1
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\PuntosRecogidaTipos
     */
    public function addPuntosRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntosRecogida[] = $data;
        $this->_setLoaded('PuntosRecogidaIbfk1');
        return $this;
    }

    /**
     * Gets dependent PuntosRecogida_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PuntosRecogidaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogida = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_PuntosRecogida;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\PuntosRecogidaTipos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\PuntosRecogidaTipos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\PuntosRecogidaTipos);

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
     * @return null | \Atezate\Model\Validator\PuntosRecogidaTipos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\PuntosRecogidaTipos')) {

                $this->setValidator(new \Atezate\Validator\PuntosRecogidaTipos);
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
     * @see \Mapper\Sql\PuntosRecogidaTipos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPuntosRecogidaTiposId() === null) {
            $this->_logger->log('The value for PuntosRecogidaTiposId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'puntosRecogidaTiposId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPuntosRecogidaTiposId())
        );
    }
}
