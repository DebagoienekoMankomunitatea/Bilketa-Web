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
class Recogidas extends ModelAbstract
{

    protected $_tiposAcceptedValues = array(
        'puntoRecogida',
        'poste',
        'centroEmergencia',
    );

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
    protected $_recogidaTipoId;

    /**
     * Este campo no podrá ser NULL (lo comprobaremos a nivel código). Se mantiene así por los logs.
     * Database var type mediumint
     *
     * @var int
     */
    protected $_cuboId;

    /**
     * [enum:puntoRecogida|poste|centroEmergencia]
     * Database var type varchar
     *
     * @var string
     */
    protected $_tipos;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntoRecogidaId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_posteId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_centroEmergenciaId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_paradaId;

    /**
     * Database var type smallint
     *
     * @var int
     */
    protected $_gradoLlenado;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;


    /**
     * Parent relation Recogidas_ibfk_1
     *
     * @var \Atezate\Model\Raw\RecogidaTipos
     */
    protected $_RecogidaTipo;

    /**
     * Parent relation Recogidas_ibfk_2
     *
     * @var \Atezate\Model\Raw\Cubos
     */
    protected $_Cubo;

    /**
     * Parent relation Recogidas_ibfk_3
     *
     * @var \Atezate\Model\Raw\Postes
     */
    protected $_Poste;

    /**
     * Parent relation Recogidas_ibfk_5
     *
     * @var \Atezate\Model\Raw\Paradas
     */
    protected $_Parada;

    /**
     * Parent relation Recogidas_ibfk_6
     *
     * @var \Atezate\Model\Raw\CentrosEmergencia
     */
    protected $_CentroEmergencia;

    /**
     * Parent relation Recogidas_ibfk_7
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntoRecogida;



    protected $_columnsList = array(
        'id'=>'id',
        'recogidaTipoId'=>'recogidaTipoId',
        'cuboId'=>'cuboId',
        'tipos'=>'tipos',
        'puntoRecogidaId'=>'puntoRecogidaId',
        'posteId'=>'posteId',
        'centroEmergenciaId'=>'centroEmergenciaId',
        'paradaId'=>'paradaId',
        'gradoLlenado'=>'gradoLlenado',
        'createdOn'=>'createdOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'cuboId'=> array(''),
            'tipos'=> array('enum:puntoRecogida|poste|centroEmergencia'),
            'paradaId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'RecogidasIbfk1'=> array(
                    'property' => 'RecogidaTipo',
                    'table_name' => 'RecogidaTipos',
                ),
            'RecogidasIbfk2'=> array(
                    'property' => 'Cubo',
                    'table_name' => 'Cubos',
                ),
            'RecogidasIbfk3'=> array(
                    'property' => 'Poste',
                    'table_name' => 'Postes',
                ),
            'RecogidasIbfk5'=> array(
                    'property' => 'Parada',
                    'table_name' => 'Paradas',
                ),
            'RecogidasIbfk6'=> array(
                    'property' => 'CentroEmergencia',
                    'table_name' => 'CentrosEmergencia',
                ),
            'RecogidasIbfk7'=> array(
                    'property' => 'PuntoRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'gradoLlenado' => '0',
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
     * @return \Atezate\Model\Raw\Recogidas
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
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setRecogidaTipoId($data)
    {

        if ($this->_recogidaTipoId != $data) {
            $this->_logChange('recogidaTipoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_recogidaTipoId = $data;
        } else if (!is_null($data)) {
            $this->_recogidaTipoId = (int) $data;
        } else {
            $this->_recogidaTipoId = $data;
        }
        return $this;
    }

    /**
     * Gets column recogidaTipoId
     *
     * @return int
     */
    public function getRecogidaTipoId()
    {
            return $this->_recogidaTipoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setCuboId($data)
    {

        if ($this->_cuboId != $data) {
            $this->_logChange('cuboId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_cuboId = $data;
        } else if (!is_null($data)) {
            $this->_cuboId = (int) $data;
        } else {
            $this->_cuboId = $data;
        }
        return $this;
    }

    /**
     * Gets column cuboId
     *
     * @return int
     */
    public function getCuboId()
    {
            return $this->_cuboId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setTipos($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_tipos != $data) {
            $this->_logChange('tipos');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipos = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_tiposAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for tipos'));
            }
            $this->_tipos = (string) $data;
        } else {
            $this->_tipos = $data;
        }
        return $this;
    }

    /**
     * Gets column tipos
     *
     * @return string
     */
    public function getTipos()
    {
            return $this->_tipos;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setPuntoRecogidaId($data)
    {

        if ($this->_puntoRecogidaId != $data) {
            $this->_logChange('puntoRecogidaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntoRecogidaId = $data;
        } else if (!is_null($data)) {
            $this->_puntoRecogidaId = (int) $data;
        } else {
            $this->_puntoRecogidaId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntoRecogidaId
     *
     * @return int
     */
    public function getPuntoRecogidaId()
    {
            return $this->_puntoRecogidaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setPosteId($data)
    {

        if ($this->_posteId != $data) {
            $this->_logChange('posteId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posteId = $data;
        } else if (!is_null($data)) {
            $this->_posteId = (int) $data;
        } else {
            $this->_posteId = $data;
        }
        return $this;
    }

    /**
     * Gets column posteId
     *
     * @return int
     */
    public function getPosteId()
    {
            return $this->_posteId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setCentroEmergenciaId($data)
    {

        if ($this->_centroEmergenciaId != $data) {
            $this->_logChange('centroEmergenciaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_centroEmergenciaId = $data;
        } else if (!is_null($data)) {
            $this->_centroEmergenciaId = (int) $data;
        } else {
            $this->_centroEmergenciaId = $data;
        }
        return $this;
    }

    /**
     * Gets column centroEmergenciaId
     *
     * @return int
     */
    public function getCentroEmergenciaId()
    {
            return $this->_centroEmergenciaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setParadaId($data)
    {

        if ($this->_paradaId != $data) {
            $this->_logChange('paradaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_paradaId = $data;
        } else if (!is_null($data)) {
            $this->_paradaId = (int) $data;
        } else {
            $this->_paradaId = $data;
        }
        return $this;
    }

    /**
     * Gets column paradaId
     *
     * @return int
     */
    public function getParadaId()
    {
            return $this->_paradaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setGradoLlenado($data)
    {

        if ($this->_gradoLlenado != $data) {
            $this->_logChange('gradoLlenado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_gradoLlenado = $data;
        } else if (!is_null($data)) {
            $this->_gradoLlenado = (int) $data;
        } else {
            $this->_gradoLlenado = $data;
        }
        return $this;
    }

    /**
     * Gets column gradoLlenado
     *
     * @return int
     */
    public function getGradoLlenado()
    {
            return $this->_gradoLlenado;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Recogidas
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
     * Sets parent relation RecogidaTipo
     *
     * @param \Atezate\Model\Raw\RecogidaTipos $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setRecogidaTipo(\Atezate\Model\Raw\RecogidaTipos $data)
    {
        $this->_RecogidaTipo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['recogidaTiposId'];
        }

        if (!is_null($primaryKey)) {
            $this->setRecogidaTipoId($primaryKey);
        }

        $this->_setLoaded('RecogidasIbfk1');
        return $this;
    }

    /**
     * Gets parent RecogidaTipo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\RecogidaTipos
     */
    public function getRecogidaTipo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_RecogidaTipo = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_RecogidaTipo;
    }

    /**
     * Sets parent relation Cubo
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setCubo(\Atezate\Model\Raw\Cubos $data)
    {
        $this->_Cubo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['cuboId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCuboId($primaryKey);
        }

        $this->_setLoaded('RecogidasIbfk2');
        return $this;
    }

    /**
     * Gets parent Cubo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Cubos
     */
    public function getCubo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Cubo = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Cubo;
    }

    /**
     * Sets parent relation Poste
     *
     * @param \Atezate\Model\Raw\Postes $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setPoste(\Atezate\Model\Raw\Postes $data)
    {
        $this->_Poste = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['postesId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPosteId($primaryKey);
        }

        $this->_setLoaded('RecogidasIbfk3');
        return $this;
    }

    /**
     * Gets parent Poste
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Postes
     */
    public function getPoste($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Poste = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Poste;
    }

    /**
     * Sets parent relation Parada
     *
     * @param \Atezate\Model\Raw\Paradas $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setParada(\Atezate\Model\Raw\Paradas $data)
    {
        $this->_Parada = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['paradaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setParadaId($primaryKey);
        }

        $this->_setLoaded('RecogidasIbfk5');
        return $this;
    }

    /**
     * Gets parent Parada
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Paradas
     */
    public function getParada($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk5';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Parada = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Parada;
    }

    /**
     * Sets parent relation CentroEmergencia
     *
     * @param \Atezate\Model\Raw\CentrosEmergencia $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setCentroEmergencia(\Atezate\Model\Raw\CentrosEmergencia $data)
    {
        $this->_CentroEmergencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setCentroEmergenciaId($primaryKey);
        }

        $this->_setLoaded('RecogidasIbfk6');
        return $this;
    }

    /**
     * Gets parent CentroEmergencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function getCentroEmergencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_CentroEmergencia = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_CentroEmergencia;
    }

    /**
     * Sets parent relation PuntoRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\Recogidas
     */
    public function setPuntoRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntoRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntoRecogidaId($primaryKey);
        }

        $this->_setLoaded('RecogidasIbfk7');
        return $this;
    }

    /**
     * Gets parent PuntoRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntoRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk7';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntoRecogida = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntoRecogida;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Recogidas
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Recogidas')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Recogidas);

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
     * @return null | \Atezate\Model\Validator\Recogidas
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Recogidas')) {

                $this->setValidator(new \Atezate\Validator\Recogidas);
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
     * @see \Mapper\Sql\Recogidas::delete
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
