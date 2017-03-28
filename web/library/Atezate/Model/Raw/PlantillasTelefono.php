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
 *  [entity]
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class PlantillasTelefono extends ModelAbstract
{
    /*
     * @var \Iron_Model_Fso
     */
    protected $_esLocFso;
    /*
     * @var \Iron_Model_Fso
     */
    protected $_euLocFso;
    /*
     * @var \Iron_Model_Fso
     */
    protected $_esLocCodificadoFso;
    /*
     * @var \Iron_Model_Fso
     */
    protected $_euLocCodificadoFso;

    protected $_estadoAcceptedValues = array(
        'pending',
        'encoding',
        'encoded',
        'error',
    );

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
    protected $_asunto;

    /**
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_esLocFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_esLocMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_esLocBaseName;

    /**
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_euLocFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_euLocMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_euLocBaseName;

    /**
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_esLocCodificadoFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_esLocCodificadoMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_esLocCodificadoBaseName;

    /**
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_euLocCodificadoFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_euLocCodificadoMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_euLocCodificadoBaseName;

    /**
     * [enum:pending|encoding|encoded|error]
     * Database var type varchar
     *
     * @var string
     */
    protected $_estado;



    /**
     * Dependent relation LogLlamadas_ibfk_4
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\LogLlamadas[]
     */
    protected $_LogLlamadas;

    /**
     * Dependent relation TiposIncidencias_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TiposIncidencias[]
     */
    protected $_TiposIncidencias;


    protected $_columnsList = array(
        'id'=>'id',
        'asunto'=>'asunto',
        'esLocFileSize'=>'esLocFileSize',
        'esLocMimeType'=>'esLocMimeType',
        'esLocBaseName'=>'esLocBaseName',
        'euLocFileSize'=>'euLocFileSize',
        'euLocMimeType'=>'euLocMimeType',
        'euLocBaseName'=>'euLocBaseName',
        'esLocCodificadoFileSize'=>'esLocCodificadoFileSize',
        'esLocCodificadoMimeType'=>'esLocCodificadoMimeType',
        'esLocCodificadoBaseName'=>'esLocCodificadoBaseName',
        'euLocCodificadoFileSize'=>'euLocCodificadoFileSize',
        'euLocCodificadoMimeType'=>'euLocCodificadoMimeType',
        'euLocCodificadoBaseName'=>'euLocCodificadoBaseName',
        'estado'=>'estado',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'esLocFileSize'=> array('FSO'),
            'euLocFileSize'=> array('FSO'),
            'esLocCodificadoFileSize'=> array('FSO'),
            'euLocCodificadoFileSize'=> array('FSO'),
            'estado'=> array('enum:pending|encoding|encoded|error'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'LogLlamadasIbfk4' => array(
                    'property' => 'LogLlamadas',
                    'table_name' => 'LogLlamadas',
                ),
            'TiposIncidenciasIbfk3' => array(
                    'property' => 'TiposIncidencias',
                    'table_name' => 'TiposIncidencias',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'LogLlamadas_ibfk_4'
        ));


        $this->_defaultValues = array(
            'estado' => 'pending',
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
        $this->_esLocFso = new \Iron_Model_Fso($this, $this->getEsLocSpecs());
        $this->_euLocFso = new \Iron_Model_Fso($this, $this->getEuLocSpecs());
        $this->_esLocCodificadoFso = new \Iron_Model_Fso($this, $this->getEsLocCodificadoSpecs());
        $this->_euLocCodificadoFso = new \Iron_Model_Fso($this, $this->getEuLocCodificadoSpecs());

        return $this;
    }

    public function getFileObjects()
    {

        return array('esLoc','euLoc','esLocCodificado','euLocCodificado');
    }

    public function getEsLocSpecs()
    {
        return array(
            'basePath' => 'esLoc',
            'sizeName' => 'esLocFileSize',
            'mimeName' => 'esLocMimeType',
            'baseNameName' => 'esLocBaseName',
        );
    }

    public function putEsLoc($filePath = '',$baseName = '')
    {
        $this->_esLocFso->put($filePath);

        if (!empty($baseName)) {

            $this->_esLocFso->setBaseName($baseName);
        }
    }

    public function fetchEsLoc($autoload = true)
    {
        if ($autoload === true && $this->getesLocFileSize() > 0) {

            $this->_esLocFso->fetch();
        }

        return $this->_esLocFso;
    }

    public function removeEsLoc()
    {
        $this->_esLocFso->remove();

        $this->_esLocFso = null;

        return true;
    }

    public function getEuLocSpecs()
    {
        return array(
            'basePath' => 'euLoc',
            'sizeName' => 'euLocFileSize',
            'mimeName' => 'euLocMimeType',
            'baseNameName' => 'euLocBaseName',
        );
    }

    public function putEuLoc($filePath = '',$baseName = '')
    {
        $this->_euLocFso->put($filePath);

        if (!empty($baseName)) {

            $this->_euLocFso->setBaseName($baseName);
        }
    }

    public function fetchEuLoc($autoload = true)
    {
        if ($autoload === true && $this->geteuLocFileSize() > 0) {

            $this->_euLocFso->fetch();
        }

        return $this->_euLocFso;
    }

    public function removeEuLoc()
    {
        $this->_euLocFso->remove();

        $this->_euLocFso = null;

        return true;
    }

    public function getEsLocCodificadoSpecs()
    {
        return array(
            'basePath' => 'esLocCodificado',
            'sizeName' => 'esLocCodificadoFileSize',
            'mimeName' => 'esLocCodificadoMimeType',
            'baseNameName' => 'esLocCodificadoBaseName',
        );
    }

    public function putEsLocCodificado($filePath = '',$baseName = '')
    {
        $this->_esLocCodificadoFso->put($filePath);

        if (!empty($baseName)) {

            $this->_esLocCodificadoFso->setBaseName($baseName);
        }
    }

    public function fetchEsLocCodificado($autoload = true)
    {
        if ($autoload === true && $this->getesLocCodificadoFileSize() > 0) {

            $this->_esLocCodificadoFso->fetch();
        }

        return $this->_esLocCodificadoFso;
    }

    public function removeEsLocCodificado()
    {
        $this->_esLocCodificadoFso->remove();

        $this->_esLocCodificadoFso = null;

        return true;
    }

    public function getEuLocCodificadoSpecs()
    {
        return array(
            'basePath' => 'euLocCodificado',
            'sizeName' => 'euLocCodificadoFileSize',
            'mimeName' => 'euLocCodificadoMimeType',
            'baseNameName' => 'euLocCodificadoBaseName',
        );
    }

    public function putEuLocCodificado($filePath = '',$baseName = '')
    {
        $this->_euLocCodificadoFso->put($filePath);

        if (!empty($baseName)) {

            $this->_euLocCodificadoFso->setBaseName($baseName);
        }
    }

    public function fetchEuLocCodificado($autoload = true)
    {
        if ($autoload === true && $this->geteuLocCodificadoFileSize() > 0) {

            $this->_euLocCodificadoFso->fetch();
        }

        return $this->_euLocCodificadoFso;
    }

    public function removeEuLocCodificado()
    {
        $this->_euLocCodificadoFso->remove();

        $this->_euLocCodificadoFso = null;

        return true;
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
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
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setAsunto($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_asunto != $data) {
            $this->_logChange('asunto');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_asunto = $data;
        } else if (!is_null($data)) {
            $this->_asunto = (string) $data;
        } else {
            $this->_asunto = $data;
        }
        return $this;
    }

    /**
     * Gets column asunto
     *
     * @return string
     */
    public function getAsunto()
    {
            return $this->_asunto;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEsLocFileSize($data)
    {

        if ($this->_esLocFileSize != $data) {
            $this->_logChange('esLocFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_esLocFileSize = $data;
        } else if (!is_null($data)) {
            $this->_esLocFileSize = (int) $data;
        } else {
            $this->_esLocFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column esLocFileSize
     *
     * @return int
     */
    public function getEsLocFileSize()
    {
            return $this->_esLocFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEsLocMimeType($data)
    {

        if ($this->_esLocMimeType != $data) {
            $this->_logChange('esLocMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_esLocMimeType = $data;
        } else if (!is_null($data)) {
            $this->_esLocMimeType = (string) $data;
        } else {
            $this->_esLocMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column esLocMimeType
     *
     * @return string
     */
    public function getEsLocMimeType()
    {
            return $this->_esLocMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEsLocBaseName($data)
    {

        if ($this->_esLocBaseName != $data) {
            $this->_logChange('esLocBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_esLocBaseName = $data;
        } else if (!is_null($data)) {
            $this->_esLocBaseName = (string) $data;
        } else {
            $this->_esLocBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column esLocBaseName
     *
     * @return string
     */
    public function getEsLocBaseName()
    {
            return $this->_esLocBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEuLocFileSize($data)
    {

        if ($this->_euLocFileSize != $data) {
            $this->_logChange('euLocFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_euLocFileSize = $data;
        } else if (!is_null($data)) {
            $this->_euLocFileSize = (int) $data;
        } else {
            $this->_euLocFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column euLocFileSize
     *
     * @return int
     */
    public function getEuLocFileSize()
    {
            return $this->_euLocFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEuLocMimeType($data)
    {

        if ($this->_euLocMimeType != $data) {
            $this->_logChange('euLocMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_euLocMimeType = $data;
        } else if (!is_null($data)) {
            $this->_euLocMimeType = (string) $data;
        } else {
            $this->_euLocMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column euLocMimeType
     *
     * @return string
     */
    public function getEuLocMimeType()
    {
            return $this->_euLocMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEuLocBaseName($data)
    {

        if ($this->_euLocBaseName != $data) {
            $this->_logChange('euLocBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_euLocBaseName = $data;
        } else if (!is_null($data)) {
            $this->_euLocBaseName = (string) $data;
        } else {
            $this->_euLocBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column euLocBaseName
     *
     * @return string
     */
    public function getEuLocBaseName()
    {
            return $this->_euLocBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEsLocCodificadoFileSize($data)
    {

        if ($this->_esLocCodificadoFileSize != $data) {
            $this->_logChange('esLocCodificadoFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_esLocCodificadoFileSize = $data;
        } else if (!is_null($data)) {
            $this->_esLocCodificadoFileSize = (int) $data;
        } else {
            $this->_esLocCodificadoFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column esLocCodificadoFileSize
     *
     * @return int
     */
    public function getEsLocCodificadoFileSize()
    {
            return $this->_esLocCodificadoFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEsLocCodificadoMimeType($data)
    {

        if ($this->_esLocCodificadoMimeType != $data) {
            $this->_logChange('esLocCodificadoMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_esLocCodificadoMimeType = $data;
        } else if (!is_null($data)) {
            $this->_esLocCodificadoMimeType = (string) $data;
        } else {
            $this->_esLocCodificadoMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column esLocCodificadoMimeType
     *
     * @return string
     */
    public function getEsLocCodificadoMimeType()
    {
            return $this->_esLocCodificadoMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEsLocCodificadoBaseName($data)
    {

        if ($this->_esLocCodificadoBaseName != $data) {
            $this->_logChange('esLocCodificadoBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_esLocCodificadoBaseName = $data;
        } else if (!is_null($data)) {
            $this->_esLocCodificadoBaseName = (string) $data;
        } else {
            $this->_esLocCodificadoBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column esLocCodificadoBaseName
     *
     * @return string
     */
    public function getEsLocCodificadoBaseName()
    {
            return $this->_esLocCodificadoBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEuLocCodificadoFileSize($data)
    {

        if ($this->_euLocCodificadoFileSize != $data) {
            $this->_logChange('euLocCodificadoFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_euLocCodificadoFileSize = $data;
        } else if (!is_null($data)) {
            $this->_euLocCodificadoFileSize = (int) $data;
        } else {
            $this->_euLocCodificadoFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column euLocCodificadoFileSize
     *
     * @return int
     */
    public function getEuLocCodificadoFileSize()
    {
            return $this->_euLocCodificadoFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEuLocCodificadoMimeType($data)
    {

        if ($this->_euLocCodificadoMimeType != $data) {
            $this->_logChange('euLocCodificadoMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_euLocCodificadoMimeType = $data;
        } else if (!is_null($data)) {
            $this->_euLocCodificadoMimeType = (string) $data;
        } else {
            $this->_euLocCodificadoMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column euLocCodificadoMimeType
     *
     * @return string
     */
    public function getEuLocCodificadoMimeType()
    {
            return $this->_euLocCodificadoMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEuLocCodificadoBaseName($data)
    {

        if ($this->_euLocCodificadoBaseName != $data) {
            $this->_logChange('euLocCodificadoBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_euLocCodificadoBaseName = $data;
        } else if (!is_null($data)) {
            $this->_euLocCodificadoBaseName = (string) $data;
        } else {
            $this->_euLocCodificadoBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column euLocCodificadoBaseName
     *
     * @return string
     */
    public function getEuLocCodificadoBaseName()
    {
            return $this->_euLocCodificadoBaseName;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setEstado($data)
    {

        if ($this->_estado != $data) {
            $this->_logChange('estado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_estado = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_estadoAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for estado'));
            }
            $this->_estado = (string) $data;
        } else {
            $this->_estado = $data;
        }
        return $this;
    }

    /**
     * Gets column estado
     *
     * @return string
     */
    public function getEstado()
    {
            return $this->_estado;
    }


    /**
     * Sets dependent relations LogLlamadas_ibfk_4
     *
     * @param array $data An array of \Atezate\Model\Raw\LogLlamadas
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function setLogLlamadas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_LogLlamadas === null) {

                $this->getLogLlamadas();
            }

            $oldRelations = $this->_LogLlamadas;

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

        $this->_LogLlamadas = array();

        foreach ($data as $object) {
            $this->addLogLlamadas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations LogLlamadas_ibfk_4
     *
     * @param \Atezate\Model\Raw\LogLlamadas $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function addLogLlamadas(\Atezate\Model\Raw\LogLlamadas $data)
    {
        $this->_LogLlamadas[] = $data;
        $this->_setLoaded('LogLlamadasIbfk4');
        return $this;
    }

    /**
     * Gets dependent LogLlamadas_ibfk_4
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\LogLlamadas
     */
    public function getLogLlamadas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogLlamadasIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_LogLlamadas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_LogLlamadas;
    }

    /**
     * Sets dependent relations TiposIncidencias_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\TiposIncidencias
     * @return \Atezate\Model\Raw\PlantillasTelefono
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
     * Sets dependent relations TiposIncidencias_ibfk_3
     *
     * @param \Atezate\Model\Raw\TiposIncidencias $data
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function addTiposIncidencias(\Atezate\Model\Raw\TiposIncidencias $data)
    {
        $this->_TiposIncidencias[] = $data;
        $this->_setLoaded('TiposIncidenciasIbfk3');
        return $this;
    }

    /**
     * Gets dependent TiposIncidencias_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TiposIncidencias
     */
    public function getTiposIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TiposIncidenciasIbfk3';

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
     * @return Atezate\Mapper\Sql\PlantillasTelefono
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\PlantillasTelefono')) {

                $this->setMapper(new \Atezate\Mapper\Sql\PlantillasTelefono);

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
     * @return null | \Atezate\Model\Validator\PlantillasTelefono
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\PlantillasTelefono')) {

                $this->setValidator(new \Atezate\Validator\PlantillasTelefono);
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
     * @see \Mapper\Sql\PlantillasTelefono::delete
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
