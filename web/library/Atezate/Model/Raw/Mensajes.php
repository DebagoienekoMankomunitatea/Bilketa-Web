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
 * 
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class Mensajes extends ModelAbstract
{
    /**
     * Database var type mediumint(8) unsigned
     *
     * @var int
     */
    protected $_mensajeId;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_mensaje;



    /**
     * Dependent relation Llamadas_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Llamadas[]
     */
    protected $_Llamadas;

    protected $_columnsList = array(
        'mensajeId'=>'mensajeId',
        'mensaje'=>'mensaje',
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
            'LlamadasIbfk2' => array(
                    'property' => 'Llamadas',
                    'table_name' => 'Llamadas',
                ),
        ));

        $this->setOnDeleteCascadeRelationships(array(
            'Llamadas_ibfk_2'
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
     * Sets column mensajeId
     *
     * @param int $data
     * @return \Atezate\Model\Mensajes
     */
    public function setMensajeId($data)
    {
        if ($this->_mensajeId != $data) {

            $this->_logChange('mensajeId');
        }
		if (!is_null($data)) {
        	$this->_mensajeId = (int) $data;
       	} else {
       	    $this->_mensajeId = $data;
       	}
        return $this;
    }

    /**
     * Gets column mensajeId
     *
     * @return int
     */
    public function getMensajeId()
    {
    
        return $this->_mensajeId;
    }


    /**
     * Sets column mensaje
     *
     * @param text $data
     * @return \Atezate\Model\Mensajes
     */
    public function setMensaje($data)
    {
        if ($this->_mensaje != $data) {

            $this->_logChange('mensaje');
        }
		if (!is_null($data)) {
        	$this->_mensaje = (string) $data;
       	} else {
       	    $this->_mensaje = $data;
       	}
        return $this;
    }

    /**
     * Gets column mensaje
     *
     * @return text
     */
    public function getMensaje()
    {
    
        return $this->_mensaje;
    }

    /**
     * Sets dependent relations Llamadas_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Llamadas
     * @return \Atezate\Model\Mensajes
     */
    public function setLlamadas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Llamadas === null) {

                $this->getLlamadas();
            }

            $oldRelations = $this->_Llamadas;

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

        $this->_Llamadas = array();

        foreach ($data as $object) {
            $this->addLlamadas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Llamadas_ibfk_2
     *
     * @param \Atezate\Model\Llamadas $data
     * @return \Atezate\Model\Mensajes
     */
    public function addLlamadas(\Atezate\Model\Llamadas $data)
    {
        $this->_Llamadas[] = $data;
        $this->_setLoaded('LlamadasIbfk2');
        return $this;
    }

    /**
     * Gets dependent Llamadas_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Llamadas
     */
    public function getLlamadas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LlamadasIbfk2';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Llamadas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Llamadas;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Mensajes
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Mensajes')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Mensajes);

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
     * @return null | \Atezate\Model\Validator\Mensajes
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Mensajes')) {

                $this->setValidator(new \Atezate\Validator\Mensajes);
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
     * @see \Mapper\Sql\Mensajes::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getMensajeId() === null) {
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'mensajeId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getMensajeId())
        );
    }
}
