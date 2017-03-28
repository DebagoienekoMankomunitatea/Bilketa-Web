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
class Municipios extends ModelAbstract
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
    protected $_municipioId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_municipio;

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
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;



    /**
     * Dependent relation CodigosApertura_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CodigosApertura[]
     */
    protected $_CodigosApertura;

    /**
     * Dependent relation CodigosAperturaPrivados_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CodigosAperturaPrivados[]
     */
    protected $_CodigosAperturaPrivados;

    /**
     * Dependent relation Contribuyentes_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Contribuyentes[]
     */
    protected $_Contribuyentes;

    /**
     * Dependent relation MunicipiosRelCercania_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\MunicipiosRelCercania[]
     */
    protected $_MunicipiosRelCercaniaByMunicipio;

    /**
     * Dependent relation MunicipiosRelCercania_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\MunicipiosRelCercania[]
     */
    protected $_MunicipiosRelCercaniaByMunicipioCercano;

    /**
     * Dependent relation MunicipiosRelCodigosPostales_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\MunicipiosRelCodigosPostales[]
     */
    protected $_MunicipiosRelCodigosPostales;

    /**
     * Dependent relation PuntosRecogida_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\PuntosRecogida[]
     */
    protected $_PuntosRecogida;


    protected $_columnsList = array(
        'municipioId'=>'municipioId',
        'municipio'=>'municipio',
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
        'createdOn'=>'createdOn',
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
            'CodigosAperturaIbfk3' => array(
                    'property' => 'CodigosApertura',
                    'table_name' => 'CodigosApertura',
                ),
            'CodigosAperturaPrivadosIbfk3' => array(
                    'property' => 'CodigosAperturaPrivados',
                    'table_name' => 'CodigosAperturaPrivados',
                ),
            'ContribuyentesIbfk1' => array(
                    'property' => 'Contribuyentes',
                    'table_name' => 'Contribuyentes',
                ),
            'MunicipiosRelCercaniaIbfk1' => array(
                    'property' => 'MunicipiosRelCercaniaByMunicipio',
                    'table_name' => 'MunicipiosRelCercania',
                ),
            'MunicipiosRelCercaniaIbfk2' => array(
                    'property' => 'MunicipiosRelCercaniaByMunicipioCercano',
                    'table_name' => 'MunicipiosRelCercania',
                ),
            'MunicipiosRelCodigosPostalesIbfk1' => array(
                    'property' => 'MunicipiosRelCodigosPostales',
                    'table_name' => 'MunicipiosRelCodigosPostales',
                ),
            'PuntosRecogidaIbfk2' => array(
                    'property' => 'PuntosRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'CodigosApertura_ibfk_3',
            'CodigosAperturaPrivados_ibfk_3',
            'Contribuyentes_ibfk_1'
        ));


        $this->_defaultValues = array(
            'estado' => 'pending',
            'createdOn' => 'CURRENT_TIMESTAMP',
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
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setMunicipioId($data)
    {

        if ($this->_municipioId != $data) {
            $this->_logChange('municipioId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_municipioId = $data;
        } else if (!is_null($data)) {
            $this->_municipioId = (int) $data;
        } else {
            $this->_municipioId = $data;
        }
        return $this;
    }

    /**
     * Gets column municipioId
     *
     * @return int
     */
    public function getMunicipioId()
    {
            return $this->_municipioId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setMunicipio($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_municipio != $data) {
            $this->_logChange('municipio');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_municipio = $data;
        } else if (!is_null($data)) {
            $this->_municipio = (string) $data;
        } else {
            $this->_municipio = $data;
        }
        return $this;
    }

    /**
     * Gets column municipio
     *
     * @return string
     */
    public function getMunicipio()
    {
            return $this->_municipio;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * @return \Atezate\Model\Raw\Municipios
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
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setCreatedOn($data)
    {

        if ($data == '0000-00-00 00:00:00') {
            $data = null;
        }

        if ($data === 'CURRENT_TIMESTAMP' || is_null($data)) {
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


        if ($this->_createdOn != $data) {
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
     * Sets dependent relations CodigosApertura_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\CodigosApertura
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setCodigosApertura(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CodigosApertura === null) {

                $this->getCodigosApertura();
            }

            $oldRelations = $this->_CodigosApertura;

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

        $this->_CodigosApertura = array();

        foreach ($data as $object) {
            $this->addCodigosApertura($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CodigosApertura_ibfk_3
     *
     * @param \Atezate\Model\Raw\CodigosApertura $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addCodigosApertura(\Atezate\Model\Raw\CodigosApertura $data)
    {
        $this->_CodigosApertura[] = $data;
        $this->_setLoaded('CodigosAperturaIbfk3');
        return $this;
    }

    /**
     * Gets dependent CodigosApertura_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CodigosApertura
     */
    public function getCodigosApertura($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigosAperturaIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CodigosApertura = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CodigosApertura;
    }

    /**
     * Sets dependent relations CodigosAperturaPrivados_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\CodigosAperturaPrivados
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setCodigosAperturaPrivados(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CodigosAperturaPrivados === null) {

                $this->getCodigosAperturaPrivados();
            }

            $oldRelations = $this->_CodigosAperturaPrivados;

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

        $this->_CodigosAperturaPrivados = array();

        foreach ($data as $object) {
            $this->addCodigosAperturaPrivados($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CodigosAperturaPrivados_ibfk_3
     *
     * @param \Atezate\Model\Raw\CodigosAperturaPrivados $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addCodigosAperturaPrivados(\Atezate\Model\Raw\CodigosAperturaPrivados $data)
    {
        $this->_CodigosAperturaPrivados[] = $data;
        $this->_setLoaded('CodigosAperturaPrivadosIbfk3');
        return $this;
    }

    /**
     * Gets dependent CodigosAperturaPrivados_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CodigosAperturaPrivados
     */
    public function getCodigosAperturaPrivados($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigosAperturaPrivadosIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CodigosAperturaPrivados = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CodigosAperturaPrivados;
    }

    /**
     * Sets dependent relations Contribuyentes_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Contribuyentes
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setContribuyentes(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Contribuyentes === null) {

                $this->getContribuyentes();
            }

            $oldRelations = $this->_Contribuyentes;

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

        $this->_Contribuyentes = array();

        foreach ($data as $object) {
            $this->addContribuyentes($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Contribuyentes_ibfk_1
     *
     * @param \Atezate\Model\Raw\Contribuyentes $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addContribuyentes(\Atezate\Model\Raw\Contribuyentes $data)
    {
        $this->_Contribuyentes[] = $data;
        $this->_setLoaded('ContribuyentesIbfk1');
        return $this;
    }

    /**
     * Gets dependent Contribuyentes_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyentes($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ContribuyentesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Contribuyentes = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Contribuyentes;
    }

    /**
     * Sets dependent relations MunicipiosRelCercania_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\MunicipiosRelCercania
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setMunicipiosRelCercaniaByMunicipio(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_MunicipiosRelCercaniaByMunicipio === null) {

                $this->getMunicipiosRelCercaniaByMunicipio();
            }

            $oldRelations = $this->_MunicipiosRelCercaniaByMunicipio;

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

        $this->_MunicipiosRelCercaniaByMunicipio = array();

        foreach ($data as $object) {
            $this->addMunicipiosRelCercaniaByMunicipio($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations MunicipiosRelCercania_ibfk_1
     *
     * @param \Atezate\Model\Raw\MunicipiosRelCercania $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addMunicipiosRelCercaniaByMunicipio(\Atezate\Model\Raw\MunicipiosRelCercania $data)
    {
        $this->_MunicipiosRelCercaniaByMunicipio[] = $data;
        $this->_setLoaded('MunicipiosRelCercaniaIbfk1');
        return $this;
    }

    /**
     * Gets dependent MunicipiosRelCercania_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\MunicipiosRelCercania
     */
    public function getMunicipiosRelCercaniaByMunicipio($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCercaniaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_MunicipiosRelCercaniaByMunicipio = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_MunicipiosRelCercaniaByMunicipio;
    }

    /**
     * Sets dependent relations MunicipiosRelCercania_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\MunicipiosRelCercania
     * @return \Atezate\Model\Raw\Municipios
     */
    public function setMunicipiosRelCercaniaByMunicipioCercano(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_MunicipiosRelCercaniaByMunicipioCercano === null) {

                $this->getMunicipiosRelCercaniaByMunicipioCercano();
            }

            $oldRelations = $this->_MunicipiosRelCercaniaByMunicipioCercano;

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

        $this->_MunicipiosRelCercaniaByMunicipioCercano = array();

        foreach ($data as $object) {
            $this->addMunicipiosRelCercaniaByMunicipioCercano($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations MunicipiosRelCercania_ibfk_2
     *
     * @param \Atezate\Model\Raw\MunicipiosRelCercania $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addMunicipiosRelCercaniaByMunicipioCercano(\Atezate\Model\Raw\MunicipiosRelCercania $data)
    {
        $this->_MunicipiosRelCercaniaByMunicipioCercano[] = $data;
        $this->_setLoaded('MunicipiosRelCercaniaIbfk2');
        return $this;
    }

    /**
     * Gets dependent MunicipiosRelCercania_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\MunicipiosRelCercania
     */
    public function getMunicipiosRelCercaniaByMunicipioCercano($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCercaniaIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_MunicipiosRelCercaniaByMunicipioCercano = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_MunicipiosRelCercaniaByMunicipioCercano;
    }

    /**
     * Sets dependent relations MunicipiosRelCodigosPostales_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     * @return \Atezate\Model\Raw\Municipios
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
     * Sets dependent relations MunicipiosRelCodigosPostales_ibfk_1
     *
     * @param \Atezate\Model\Raw\MunicipiosRelCodigosPostales $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addMunicipiosRelCodigosPostales(\Atezate\Model\Raw\MunicipiosRelCodigosPostales $data)
    {
        $this->_MunicipiosRelCodigosPostales[] = $data;
        $this->_setLoaded('MunicipiosRelCodigosPostalesIbfk1');
        return $this;
    }

    /**
     * Gets dependent MunicipiosRelCodigosPostales_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     */
    public function getMunicipiosRelCodigosPostales($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCodigosPostalesIbfk1';

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
     * Sets dependent relations PuntosRecogida_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\PuntosRecogida
     * @return \Atezate\Model\Raw\Municipios
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
     * Sets dependent relations PuntosRecogida_ibfk_2
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\Municipios
     */
    public function addPuntosRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntosRecogida[] = $data;
        $this->_setLoaded('PuntosRecogidaIbfk2');
        return $this;
    }

    /**
     * Gets dependent PuntosRecogida_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PuntosRecogidaIbfk2';

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
     * @return Atezate\Mapper\Sql\Municipios
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Municipios')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Municipios);

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
     * @return null | \Atezate\Model\Validator\Municipios
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Municipios')) {

                $this->setValidator(new \Atezate\Validator\Municipios);
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
     * @see \Mapper\Sql\Municipios::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getMunicipioId() === null) {
            $this->_logger->log('The value for MunicipioId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'municipioId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getMunicipioId())
        );
    }
}
