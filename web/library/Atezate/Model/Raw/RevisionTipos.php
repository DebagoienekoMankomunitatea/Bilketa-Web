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
class RevisionTipos extends ModelAbstract
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
    protected $_tipo;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_descripcion;



    /**
     * Dependent relation Revision_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Revision[]
     */
    protected $_Revision;


    protected $_columnsList = array(
        'id'=>'id',
        'tipo'=>'tipo',
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
            'RevisionIbfk3' => array(
                    'property' => 'Revision',
                    'table_name' => 'Revision',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Revision_ibfk_3'
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
     * @return \Atezate\Model\Raw\RevisionTipos
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
     * @return \Atezate\Model\Raw\RevisionTipos
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
     * @param text $data
     * @return \Atezate\Model\Raw\RevisionTipos
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
     * Sets dependent relations Revision_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\Revision
     * @return \Atezate\Model\Raw\RevisionTipos
     */
    public function setRevision(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Revision === null) {

                $this->getRevision();
            }

            $oldRelations = $this->_Revision;

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

        $this->_Revision = array();

        foreach ($data as $object) {
            $this->addRevision($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Revision_ibfk_3
     *
     * @param \Atezate\Model\Raw\Revision $data
     * @return \Atezate\Model\Raw\RevisionTipos
     */
    public function addRevision(\Atezate\Model\Raw\Revision $data)
    {
        $this->_Revision[] = $data;
        $this->_setLoaded('RevisionIbfk3');
        return $this;
    }

    /**
     * Gets dependent Revision_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Revision
     */
    public function getRevision($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RevisionIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Revision = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Revision;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\RevisionTipos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\RevisionTipos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\RevisionTipos);

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
     * @return null | \Atezate\Model\Validator\RevisionTipos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\RevisionTipos')) {

                $this->setValidator(new \Atezate\Validator\RevisionTipos);
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
     * @see \Mapper\Sql\RevisionTipos::delete
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
