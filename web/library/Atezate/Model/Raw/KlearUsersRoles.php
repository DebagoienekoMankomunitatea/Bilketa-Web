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
class KlearUsersRoles extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_klearUserId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_klearRoleId;


    /**
     * Parent relation KlearUsersRoles_ibfk_1
     *
     * @var \Atezate\Model\Raw\KlearUsers
     */
    protected $_KlearUser;

    /**
     * Parent relation KlearUsersRoles_ibfk_2
     *
     * @var \Atezate\Model\Raw\KlearRoles
     */
    protected $_KlearRole;



    protected $_columnsList = array(
        'id'=>'id',
        'klearUserId'=>'klearUserId',
        'klearRoleId'=>'klearRoleId',
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
            'KlearUsersRolesIbfk1'=> array(
                    'property' => 'KlearUser',
                    'table_name' => 'KlearUsers',
                ),
            'KlearUsersRolesIbfk2'=> array(
                    'property' => 'KlearRole',
                    'table_name' => 'KlearRoles',
                ),
        ));

        $this->setDependentList(array(
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
     * @return \Atezate\Model\Raw\KlearUsersRoles
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
     * @return \Atezate\Model\Raw\KlearUsersRoles
     */
    public function setKlearUserId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_klearUserId != $data) {
            $this->_logChange('klearUserId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_klearUserId = $data;
        } else if (!is_null($data)) {
            $this->_klearUserId = (int) $data;
        } else {
            $this->_klearUserId = $data;
        }
        return $this;
    }

    /**
     * Gets column klearUserId
     *
     * @return int
     */
    public function getKlearUserId()
    {
            return $this->_klearUserId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\KlearUsersRoles
     */
    public function setKlearRoleId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_klearRoleId != $data) {
            $this->_logChange('klearRoleId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_klearRoleId = $data;
        } else if (!is_null($data)) {
            $this->_klearRoleId = (int) $data;
        } else {
            $this->_klearRoleId = $data;
        }
        return $this;
    }

    /**
     * Gets column klearRoleId
     *
     * @return int
     */
    public function getKlearRoleId()
    {
            return $this->_klearRoleId;
    }


    /**
     * Sets parent relation KlearUser
     *
     * @param \Atezate\Model\Raw\KlearUsers $data
     * @return \Atezate\Model\Raw\KlearUsersRoles
     */
    public function setKlearUser(\Atezate\Model\Raw\KlearUsers $data)
    {
        $this->_KlearUser = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['userId'];
        }

        if (!is_null($primaryKey)) {
            $this->setKlearUserId($primaryKey);
        }

        $this->_setLoaded('KlearUsersRolesIbfk1');
        return $this;
    }

    /**
     * Gets parent KlearUser
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\KlearUsers
     */
    public function getKlearUser($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'KlearUsersRolesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_KlearUser = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_KlearUser;
    }

    /**
     * Sets parent relation KlearRole
     *
     * @param \Atezate\Model\Raw\KlearRoles $data
     * @return \Atezate\Model\Raw\KlearUsersRoles
     */
    public function setKlearRole(\Atezate\Model\Raw\KlearRoles $data)
    {
        $this->_KlearRole = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setKlearRoleId($primaryKey);
        }

        $this->_setLoaded('KlearUsersRolesIbfk2');
        return $this;
    }

    /**
     * Gets parent KlearRole
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\KlearRoles
     */
    public function getKlearRole($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'KlearUsersRolesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_KlearRole = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_KlearRole;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\KlearUsersRoles
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\KlearUsersRoles')) {

                $this->setMapper(new \Atezate\Mapper\Sql\KlearUsersRoles);

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
     * @return null | \Atezate\Model\Validator\KlearUsersRoles
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\KlearUsersRoles')) {

                $this->setValidator(new \Atezate\Validator\KlearUsersRoles);
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
     * @see \Mapper\Sql\KlearUsersRoles::delete
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
