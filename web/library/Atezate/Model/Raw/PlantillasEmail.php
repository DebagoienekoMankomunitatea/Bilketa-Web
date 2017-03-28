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
class PlantillasEmail extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * [ml]
     * Database var type varchar
     *
     * @var string
     */
    protected $_asunto;

    /**
     * [ml]
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_mensaje;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_asuntoEs;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_asuntoEu;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_mensajeEs;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_mensajeEu;



    /**
     * Dependent relation TiposIncidencias_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TiposIncidencias[]
     */
    protected $_TiposIncidencias;


    protected $_columnsList = array(
        'id'=>'id',
        'asunto'=>'asunto',
        'mensaje'=>'mensaje',
        'asunto_es'=>'asuntoEs',
        'asunto_eu'=>'asuntoEu',
        'mensaje_es'=>'mensajeEs',
        'mensaje_eu'=>'mensajeEu',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'asunto'=> array('ml'),
            'mensaje'=> array('ml'),
        ));

        $this->setMultiLangColumnsList(array(
            'asunto'=>'Asunto',
            'mensaje'=>'Mensaje',
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'TiposIncidenciasIbfk1' => array(
                    'property' => 'TiposIncidencias',
                    'table_name' => 'TiposIncidencias',
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
     * @return \Atezate\Model\Raw\PlantillasEmail
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
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setAsunto($data, $language = '')
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setAsunto". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_asunto = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column asunto
     *
     * @return string
     */
    public function getAsunto($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getAsunto". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_asunto;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setMensaje($data, $language = '')
    {

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setMensaje". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_mensaje = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column mensaje
     *
     * @return text
     */
    public function getMensaje($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getMensaje". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_mensaje;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setAsuntoEs($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_asuntoEs != $data) {
            $this->_logChange('asuntoEs');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_asuntoEs = $data;
        } else if (!is_null($data)) {
            $this->_asuntoEs = (string) $data;
        } else {
            $this->_asuntoEs = $data;
        }
        return $this;
    }

    /**
     * Gets column asunto_es
     *
     * @return string
     */
    public function getAsuntoEs()
    {
            return $this->_asuntoEs;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setAsuntoEu($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_asuntoEu != $data) {
            $this->_logChange('asuntoEu');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_asuntoEu = $data;
        } else if (!is_null($data)) {
            $this->_asuntoEu = (string) $data;
        } else {
            $this->_asuntoEu = $data;
        }
        return $this;
    }

    /**
     * Gets column asunto_eu
     *
     * @return string
     */
    public function getAsuntoEu()
    {
            return $this->_asuntoEu;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setMensajeEs($data)
    {

        if ($this->_mensajeEs != $data) {
            $this->_logChange('mensajeEs');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_mensajeEs = $data;
        } else if (!is_null($data)) {
            $this->_mensajeEs = (string) $data;
        } else {
            $this->_mensajeEs = $data;
        }
        return $this;
    }

    /**
     * Gets column mensaje_es
     *
     * @return text
     */
    public function getMensajeEs()
    {
            return $this->_mensajeEs;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setMensajeEu($data)
    {

        if ($this->_mensajeEu != $data) {
            $this->_logChange('mensajeEu');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_mensajeEu = $data;
        } else if (!is_null($data)) {
            $this->_mensajeEu = (string) $data;
        } else {
            $this->_mensajeEu = $data;
        }
        return $this;
    }

    /**
     * Gets column mensaje_eu
     *
     * @return text
     */
    public function getMensajeEu()
    {
            return $this->_mensajeEu;
    }


    /**
     * Sets dependent relations TiposIncidencias_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\TiposIncidencias
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function setTiposIncidencias(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_TiposIncidencias === null) {

                $this->getTiposIncidencias();
            }

            $oldRelations = $this->_TiposIncidencias;

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

        $this->_TiposIncidencias = array();

        foreach ($data as $object) {
            $this->addTiposIncidencias($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations TiposIncidencias_ibfk_1
     *
     * @param \Atezate\Model\Raw\TiposIncidencias $data
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function addTiposIncidencias(\Atezate\Model\Raw\TiposIncidencias $data)
    {
        $this->_TiposIncidencias[] = $data;
        $this->_setLoaded('TiposIncidenciasIbfk1');
        return $this;
    }

    /**
     * Gets dependent TiposIncidencias_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TiposIncidencias
     */
    public function getTiposIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TiposIncidenciasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_TiposIncidencias = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_TiposIncidencias;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\PlantillasEmail
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\PlantillasEmail')) {

                $this->setMapper(new \Atezate\Mapper\Sql\PlantillasEmail);

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
     * @return null | \Atezate\Model\Validator\PlantillasEmail
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\PlantillasEmail')) {

                $this->setValidator(new \Atezate\Validator\PlantillasEmail);
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
     * @see \Mapper\Sql\PlantillasEmail::delete
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
