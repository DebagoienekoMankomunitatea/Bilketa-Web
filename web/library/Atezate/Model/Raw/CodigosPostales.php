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
class CodigosPostales extends ModelAbstract
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
    protected $_codigoPostal;



    /**
     * Dependent relation MunicipiosRelCodigosPostales_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\MunicipiosRelCodigosPostales[]
     */
    protected $_MunicipiosRelCodigosPostales;


    protected $_columnsList = array(
        'id'=>'id',
        'codigoPostal'=>'codigoPostal',
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
            'MunicipiosRelCodigosPostalesIbfk2' => array(
                    'property' => 'MunicipiosRelCodigosPostales',
                    'table_name' => 'MunicipiosRelCodigosPostales',
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
     * @return \Atezate\Model\Raw\CodigosPostales
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
     * @return \Atezate\Model\Raw\CodigosPostales
     */
    public function setCodigoPostal($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_codigoPostal != $data) {
            $this->_logChange('codigoPostal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_codigoPostal = $data;
        } else if (!is_null($data)) {
            $this->_codigoPostal = (int) $data;
        } else {
            $this->_codigoPostal = $data;
        }
        return $this;
    }

    /**
     * Gets column codigoPostal
     *
     * @return int
     */
    public function getCodigoPostal()
    {
            return $this->_codigoPostal;
    }


    /**
     * Sets dependent relations MunicipiosRelCodigosPostales_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     * @return \Atezate\Model\Raw\CodigosPostales
     */
    public function setMunicipiosRelCodigosPostales(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_MunicipiosRelCodigosPostales === null) {

                $this->getMunicipiosRelCodigosPostales();
            }

            $oldRelations = $this->_MunicipiosRelCodigosPostales;

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

        $this->_MunicipiosRelCodigosPostales = array();

        foreach ($data as $object) {
            $this->addMunicipiosRelCodigosPostales($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations MunicipiosRelCodigosPostales_ibfk_2
     *
     * @param \Atezate\Model\Raw\MunicipiosRelCodigosPostales $data
     * @return \Atezate\Model\Raw\CodigosPostales
     */
    public function addMunicipiosRelCodigosPostales(\Atezate\Model\Raw\MunicipiosRelCodigosPostales $data)
    {
        $this->_MunicipiosRelCodigosPostales[] = $data;
        $this->_setLoaded('MunicipiosRelCodigosPostalesIbfk2');
        return $this;
    }

    /**
     * Gets dependent MunicipiosRelCodigosPostales_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     */
    public function getMunicipiosRelCodigosPostales($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCodigosPostalesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_MunicipiosRelCodigosPostales = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_MunicipiosRelCodigosPostales;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CodigosPostales
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CodigosPostales')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CodigosPostales);

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
     * @return null | \Atezate\Model\Validator\CodigosPostales
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CodigosPostales')) {

                $this->setValidator(new \Atezate\Validator\CodigosPostales);
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
     * @see \Mapper\Sql\CodigosPostales::delete
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
