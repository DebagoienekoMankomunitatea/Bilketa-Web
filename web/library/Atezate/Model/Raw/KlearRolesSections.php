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
class KlearRolesSections extends ModelAbstract
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
    protected $_klearRoleId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_klearSectionId;


    /**
     * Parent relation KlearRolesSections_ibfk_1
     *
     * @var \Atezate\Model\Raw\KlearRoles
     */
    protected $_KlearRole;

    /**
     * Parent relation KlearRolesSections_ibfk_2
     *
     * @var \Atezate\Model\Raw\KlearSections
     */
    protected $_KlearSection;



    protected $_columnsList = array(
        'id'=>'id',
        'klearRoleId'=>'klearRoleId',
        'klearSectionId'=>'klearSectionId',
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
            'KlearRolesSectionsIbfk1'=> array(
                    'property' => 'KlearRole',
                    'table_name' => 'KlearRoles',
                ),
            'KlearRolesSectionsIbfk2'=> array(
                    'property' => 'KlearSection',
                    'table_name' => 'KlearSections',
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
     * @return \Atezate\Model\Raw\KlearRolesSections
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
     * @return \Atezate\Model\Raw\KlearRolesSections
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
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\KlearRolesSections
     */
    public function setKlearSectionId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_klearSectionId != $data) {
            $this->_logChange('klearSectionId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_klearSectionId = $data;
        } else if (!is_null($data)) {
            $this->_klearSectionId = (int) $data;
        } else {
            $this->_klearSectionId = $data;
        }
        return $this;
    }

    /**
     * Gets column klearSectionId
     *
     * @return int
     */
    public function getKlearSectionId()
    {
            return $this->_klearSectionId;
    }


    /**
     * Sets parent relation KlearRole
     *
     * @param \Atezate\Model\Raw\KlearRoles $data
     * @return \Atezate\Model\Raw\KlearRolesSections
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

        $this->_setLoaded('KlearRolesSectionsIbfk1');
        return $this;
    }

    /**
     * Gets parent KlearRole
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\KlearRoles
     */
    public function getKlearRole($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'KlearRolesSectionsIbfk1';

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
     * Sets parent relation KlearSection
     *
     * @param \Atezate\Model\Raw\KlearSections $data
     * @return \Atezate\Model\Raw\KlearRolesSections
     */
    public function setKlearSection(\Atezate\Model\Raw\KlearSections $data)
    {
        $this->_KlearSection = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setKlearSectionId($primaryKey);
        }

        $this->_setLoaded('KlearRolesSectionsIbfk2');
        return $this;
    }

    /**
     * Gets parent KlearSection
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\KlearSections
     */
    public function getKlearSection($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'KlearRolesSectionsIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_KlearSection = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_KlearSection;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\KlearRolesSections
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\KlearRolesSections')) {

                $this->setMapper(new \Atezate\Mapper\Sql\KlearRolesSections);

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
     * @return null | \Atezate\Model\Validator\KlearRolesSections
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\KlearRolesSections')) {

                $this->setValidator(new \Atezate\Validator\KlearRolesSections);
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
     * @see \Mapper\Sql\KlearRolesSections::delete
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
