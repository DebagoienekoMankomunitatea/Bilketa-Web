<?php

/**
 * Application Model
 *
 * @package Atezate\Model\Raw
 * @subpackage Model
 * @author Irontec
 * @copyright ZF model generator Rev. 149

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity]
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Irontec
 */

namespace Atezate\Model\Raw;
class Tipos extends ModelAbstract
{
    /**
     * Database var type mediumint(8) unsigned
     *
     * @var int
     */
    protected $_tipoId;

    /**
     * [ml]
     * Database var type varchar(25)
     *
     * @var string
     */
    protected $_tipo;

    /**
     * Database var type varchar(25)
     *
     * @var string
     */
    protected $_tipoEu;

    /**
     * Database var type varchar(25)
     *
     * @var string
     */
    protected $_tipoEs;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_updateOn;



    /**
     * Dependent relation incidencias_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsList(array(
            'tipoId'=>'tipoId',
            'tipo'=>'tipo',
            'tipo_eu'=>'tipoEu',
            'tipo_es'=>'tipoEs',
            'createdOn'=>'createdOn',
            'updateOn'=>'updateOn',
        ));

        $this->setColumnsMeta(array(
            'tipo'=> array('ml'),
        ));

        $this->setMultiLangColumnsList(array(
            'tipo'=>'Tipo',
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'IncidenciasIbfk2' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'incidencias_ibfk_2'
        ));

        $this->_defaultValues = array(
            'tipo' => '',
            'tipoEu' => '',
            'tipoEs' => '',
            'createdOn' => '0000-00-00 00:00:00',
            'updateOn' => 'CURRENT_TIMESTAMP',
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
     * Sets column tipoId
     *
     * @param int $data
     * @return \Atezate\Model\Tipos
     */
    public function setTipoId($data)
    {
        if ($this->_logChanges === true && $this->_tipoId != $data) {

            $this->_logChange('tipoId');
        }

        $this->_tipoId = $data;
        return $this;
    }

    /**
     * Gets column tipoId
     *
     * @return int
     */
    public function getTipoId()
    {
    
        return $this->_tipoId;
    }


    /**
     * Sets column tipo
     *
     * @param string $data
     * @return \Atezate\Model\Tipos
     */
    public function setTipo($data, $language = '')
    {

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setTipo". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            //Throw new \Exception('Unavailable language');
            $this->_tipo = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column tipo
     *
     * @return string
     */
    public function getTipo($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getTipo". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            //Throw new \Exception('Unavailable language');
            return $this->_tipo;
        }

        return $this->$methodName();
    }


    /**
     * Sets column tipo_eu
     *
     * @param string $data
     * @return \Atezate\Model\Tipos
     */
    public function setTipoEu($data)
    {
        if ($this->_logChanges === true && $this->_tipoEu != $data) {

            $this->_logChange('tipoEu');
        }

        $this->_tipoEu = $data;
        return $this;
    }

    /**
     * Gets column tipo_eu
     *
     * @return string
     */
    public function getTipoEu()
    {
    
        return $this->_tipoEu;
    }


    /**
     * Sets column tipo_es
     *
     * @param string $data
     * @return \Atezate\Model\Tipos
     */
    public function setTipoEs($data)
    {
        if ($this->_logChanges === true && $this->_tipoEs != $data) {

            $this->_logChange('tipoEs');
        }

        $this->_tipoEs = $data;
        return $this;
    }

    /**
     * Gets column tipo_es
     *
     * @return string
     */
    public function getTipoEs()
    {
    
        return $this->_tipoEs;
    }


    /**
     * Sets column createdOn. Stored in ISO 8601 format.
     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Tipos
     */
    public function setCreatedOn($data)
    {
    
        if ($data == '0000-00-00 00:00:00') {

            $data = null;
        }
        
        if ($data === 'CURRENT_TIMESTAMP') {
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

        if ($this->_logChanges === true && $this->_createdOn != $data) {

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
     * Sets column updateOn. Stored in ISO 8601 format.
     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Tipos
     */
    public function setUpdateOn($data)
    {
    
        if ($data == '0000-00-00 00:00:00') {

            $data = null;
        }
        
        if ($data === 'CURRENT_TIMESTAMP') {
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

        if ($this->_logChanges === true && $this->_updateOn != $data) {

            $this->_logChange('updateOn');
        }

        $this->_updateOn = $data;
        return $this;
    }

    /**
     * Gets column updateOn
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getUpdateOn($returnZendDate = false)
    {
    
        if (is_null($this->_updateOn)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_updateOn->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }

        
        return $this->_updateOn->format('Y-m-d H:i:s');

    }

    /**
     * Sets dependent relations incidencias_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Incidencias
     * @return \Atezate\Model\Tipos
     */
    public function setIncidencias(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Incidencias === null) {

                $this->getIncidencias();
            }

            $oldRelations = $this->_Incidencias;

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

        $this->_Incidencias = array();

        foreach ($data as $object) {
            $this->addIncidencias($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations incidencias_ibfk_2
     *
     * @param \Atezate\Model\Incidencias $data
     * @return \Atezate\Model\Tipos
     */
    public function addIncidencias(\Atezate\Model\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk2');
        return $this;
    }

    /**
     * Gets dependent incidencias_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk2';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Incidencias = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Incidencias;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Tipos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Tipos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Tipos);

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
     * @return null | \Atezate\Model\Validator\Tipos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Tipos')) {

                $this->setValidator(new \Atezate\Validator\Tipos);
            }
        }

        return $this->_validator;
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
     * @see \Mapper\Sql\Tipos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getTipoId() === null) {
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'tipoId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getTipoId())
        );
    }
}
