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
class Operarios extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_operarioId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nombre;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_rolId;


    /**
     * Parent relation Operarios_ibfk_1
     *
     * @var \Atezate\Model\Raw\Roles
     */
    protected $_Rol;


    /**
     * Dependent relation Revision_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Revision[]
     */
    protected $_Revision;

    /**
     * Dependent relation TurnosCamionesRelOperarios_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TurnosCamionesRelOperarios[]
     */
    protected $_TurnosCamionesRelOperarios;


    protected $_columnsList = array(
        'operarioId'=>'operarioId',
        'nombre'=>'nombre',
        'rolId'=>'rolId',
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
            'OperariosIbfk1'=> array(
                    'property' => 'Rol',
                    'table_name' => 'Roles',
                ),
        ));

        $this->setDependentList(array(
            'RevisionIbfk2' => array(
                    'property' => 'Revision',
                    'table_name' => 'Revision',
                ),
            'TurnosCamionesRelOperariosIbfk2' => array(
                    'property' => 'TurnosCamionesRelOperarios',
                    'table_name' => 'TurnosCamionesRelOperarios',
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
     * @return \Atezate\Model\Raw\Operarios
     */
    public function setOperarioId($data)
    {

        if ($this->_operarioId != $data) {
            $this->_logChange('operarioId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_operarioId = $data;
        } else if (!is_null($data)) {
            $this->_operarioId = (int) $data;
        } else {
            $this->_operarioId = $data;
        }
        return $this;
    }

    /**
     * Gets column operarioId
     *
     * @return int
     */
    public function getOperarioId()
    {
            return $this->_operarioId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Operarios
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
     * @param int $data
     * @return \Atezate\Model\Raw\Operarios
     */
    public function setRolId($data)
    {

        if ($this->_rolId != $data) {
            $this->_logChange('rolId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_rolId = $data;
        } else if (!is_null($data)) {
            $this->_rolId = (int) $data;
        } else {
            $this->_rolId = $data;
        }
        return $this;
    }

    /**
     * Gets column rolId
     *
     * @return int
     */
    public function getRolId()
    {
            return $this->_rolId;
    }


    /**
     * Sets parent relation Rol
     *
     * @param \Atezate\Model\Raw\Roles $data
     * @return \Atezate\Model\Raw\Operarios
     */
    public function setRol(\Atezate\Model\Raw\Roles $data)
    {
        $this->_Rol = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setRolId($primaryKey);
        }

        $this->_setLoaded('OperariosIbfk1');
        return $this;
    }

    /**
     * Gets parent Rol
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Roles
     */
    public function getRol($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'OperariosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Rol = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Rol;
    }

    /**
     * Sets dependent relations Revision_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Revision
     * @return \Atezate\Model\Raw\Operarios
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
     * Sets dependent relations Revision_ibfk_2
     *
     * @param \Atezate\Model\Raw\Revision $data
     * @return \Atezate\Model\Raw\Operarios
     */
    public function addRevision(\Atezate\Model\Raw\Revision $data)
    {
        $this->_Revision[] = $data;
        $this->_setLoaded('RevisionIbfk2');
        return $this;
    }

    /**
     * Gets dependent Revision_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Revision
     */
    public function getRevision($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RevisionIbfk2';

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
     * Sets dependent relations TurnosCamionesRelOperarios_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\TurnosCamionesRelOperarios
     * @return \Atezate\Model\Raw\Operarios
     */
    public function setTurnosCamionesRelOperarios(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_TurnosCamionesRelOperarios === null) {

                $this->getTurnosCamionesRelOperarios();
            }

            $oldRelations = $this->_TurnosCamionesRelOperarios;

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

        $this->_TurnosCamionesRelOperarios = array();

        foreach ($data as $object) {
            $this->addTurnosCamionesRelOperarios($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations TurnosCamionesRelOperarios_ibfk_2
     *
     * @param \Atezate\Model\Raw\TurnosCamionesRelOperarios $data
     * @return \Atezate\Model\Raw\Operarios
     */
    public function addTurnosCamionesRelOperarios(\Atezate\Model\Raw\TurnosCamionesRelOperarios $data)
    {
        $this->_TurnosCamionesRelOperarios[] = $data;
        $this->_setLoaded('TurnosCamionesRelOperariosIbfk2');
        return $this;
    }

    /**
     * Gets dependent TurnosCamionesRelOperarios_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TurnosCamionesRelOperarios
     */
    public function getTurnosCamionesRelOperarios($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosCamionesRelOperariosIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_TurnosCamionesRelOperarios = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_TurnosCamionesRelOperarios;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Operarios
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Operarios')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Operarios);

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
     * @return null | \Atezate\Model\Validator\Operarios
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Operarios')) {

                $this->setValidator(new \Atezate\Validator\Operarios);
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
     * @see \Mapper\Sql\Operarios::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getOperarioId() === null) {
            $this->_logger->log('The value for OperarioId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'operarioId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getOperarioId())
        );
    }
}
