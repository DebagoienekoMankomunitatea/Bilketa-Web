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
class Cubos extends ModelAbstract
{

    protected $_ubicacionAcceptedValues = array(
        'poste',
        'puntoRecogida',
        'centroEmergencia',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_cuboId;

    /**
     * [enum:poste|puntoRecogida|centroEmergencia]
     * Database var type varchar
     *
     * @var string
     */
    protected $_ubicacion;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_centrosEmergenciaId;

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
    protected $_contribuyenteId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_cubosTiposId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_diaAsignado;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_baja;

    /**
     * Database var type date
     *
     * @var string
     */
    protected $_diaBaja;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_rfid;


    /**
     * Parent relation Cubos_ibfk_1
     *
     * @var \Atezate\Model\Raw\Contribuyentes
     */
    protected $_Contribuyente;

    /**
     * Parent relation Cubos_ibfk_3
     *
     * @var \Atezate\Model\Raw\CubosTipos
     */
    protected $_CubosTipos;

    /**
     * Parent relation Cubos_ibfk_4
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntosRecogida;

    /**
     * Parent relation Cubos_ibfk_5
     *
     * @var \Atezate\Model\Raw\Postes
     */
    protected $_Poste;

    /**
     * Parent relation Cubos_ibfk_6
     *
     * @var \Atezate\Model\Raw\CentrosEmergencia
     */
    protected $_CentrosEmergencia;


    /**
     * Dependent relation Incidencias_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation Recogidas_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Recogidas[]
     */
    protected $_Recogidas;


    protected $_columnsList = array(
        'cuboId'=>'cuboId',
        'ubicacion'=>'ubicacion',
        'puntosRecogidaId'=>'puntosRecogidaId',
        'centrosEmergenciaId'=>'centrosEmergenciaId',
        'posteId'=>'posteId',
        'contribuyenteId'=>'contribuyenteId',
        'cubosTiposId'=>'cubosTiposId',
        'diaAsignado'=>'diaAsignado',
        'baja'=>'baja',
        'diaBaja'=>'diaBaja',
        'rfid'=>'rfid',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'ubicacion'=> array('enum:poste|puntoRecogida|centroEmergencia'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'CubosIbfk1'=> array(
                    'property' => 'Contribuyente',
                    'table_name' => 'Contribuyentes',
                ),
            'CubosIbfk3'=> array(
                    'property' => 'CubosTipos',
                    'table_name' => 'CubosTipos',
                ),
            'CubosIbfk4'=> array(
                    'property' => 'PuntosRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
            'CubosIbfk5'=> array(
                    'property' => 'Poste',
                    'table_name' => 'Postes',
                ),
            'CubosIbfk6'=> array(
                    'property' => 'CentrosEmergencia',
                    'table_name' => 'CentrosEmergencia',
                ),
        ));

        $this->setDependentList(array(
            'IncidenciasIbfk1' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'RecogidasIbfk2' => array(
                    'property' => 'Recogidas',
                    'table_name' => 'Recogidas',
                ),
        ));




        $this->_defaultValues = array(
            'ubicacion' => 'poste',
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
     * @return \Atezate\Model\Raw\Cubos
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
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setUbicacion($data)
    {

        if ($this->_ubicacion != $data) {
            $this->_logChange('ubicacion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_ubicacion = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_ubicacionAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for ubicacion'));
            }
            $this->_ubicacion = (string) $data;
        } else {
            $this->_ubicacion = $data;
        }
        return $this;
    }

    /**
     * Gets column ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
            return $this->_ubicacion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setPuntosRecogidaId($data)
    {

        if ($this->_puntosRecogidaId != $data) {
            $this->_logChange('puntosRecogidaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosRecogidaId = $data;
        } else if (!is_null($data)) {
            $this->_puntosRecogidaId = (int) $data;
        } else {
            $this->_puntosRecogidaId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosRecogidaId
     *
     * @return int
     */
    public function getPuntosRecogidaId()
    {
            return $this->_puntosRecogidaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setCentrosEmergenciaId($data)
    {

        if ($this->_centrosEmergenciaId != $data) {
            $this->_logChange('centrosEmergenciaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_centrosEmergenciaId = $data;
        } else if (!is_null($data)) {
            $this->_centrosEmergenciaId = (int) $data;
        } else {
            $this->_centrosEmergenciaId = $data;
        }
        return $this;
    }

    /**
     * Gets column centrosEmergenciaId
     *
     * @return int
     */
    public function getCentrosEmergenciaId()
    {
            return $this->_centrosEmergenciaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Cubos
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
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setContribuyenteId($data)
    {

        if ($this->_contribuyenteId != $data) {
            $this->_logChange('contribuyenteId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_contribuyenteId = $data;
        } else if (!is_null($data)) {
            $this->_contribuyenteId = (int) $data;
        } else {
            $this->_contribuyenteId = $data;
        }
        return $this;
    }

    /**
     * Gets column contribuyenteId
     *
     * @return int
     */
    public function getContribuyenteId()
    {
            return $this->_contribuyenteId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setCubosTiposId($data)
    {

        if ($this->_cubosTiposId != $data) {
            $this->_logChange('cubosTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_cubosTiposId = $data;
        } else if (!is_null($data)) {
            $this->_cubosTiposId = (int) $data;
        } else {
            $this->_cubosTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column cubosTiposId
     *
     * @return int
     */
    public function getCubosTiposId()
    {
            return $this->_cubosTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setDiaAsignado($data)
    {

        if ($this->_diaAsignado != $data) {
            $this->_logChange('diaAsignado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_diaAsignado = $data;
        } else if (!is_null($data)) {
            $this->_diaAsignado = (string) $data;
        } else {
            $this->_diaAsignado = $data;
        }
        return $this;
    }

    /**
     * Gets column diaAsignado
     *
     * @return string
     */
    public function getDiaAsignado()
    {
            return $this->_diaAsignado;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setBaja($data)
    {

        if ($this->_baja != $data) {
            $this->_logChange('baja');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_baja = $data;
        } else if (!is_null($data)) {
            $this->_baja = (int) $data;
        } else {
            $this->_baja = $data;
        }
        return $this;
    }

    /**
     * Gets column baja
     *
     * @return int
     */
    public function getBaja()
    {
            return $this->_baja;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setDiaBaja($data)
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


        if ($this->_diaBaja != $data) {
            $this->_logChange('diaBaja');
        }


        $this->_diaBaja = $data;
        return $this;
    }

    /**
     * Gets column diaBaja
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getDiaBaja($returnZendDate = false)
    {
    
        if (is_null($this->_diaBaja)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_diaBaja->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_diaBaja->format('Y-m-d');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setRfid($data)
    {

        if ($this->_rfid != $data) {
            $this->_logChange('rfid');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_rfid = $data;
        } else if (!is_null($data)) {
            $this->_rfid = (string) $data;
        } else {
            $this->_rfid = $data;
        }
        return $this;
    }

    /**
     * Gets column rfid
     *
     * @return string
     */
    public function getRfid()
    {
            return $this->_rfid;
    }


    /**
     * Sets parent relation Contribuyente
     *
     * @param \Atezate\Model\Raw\Contribuyentes $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setContribuyente(\Atezate\Model\Raw\Contribuyentes $data)
    {
        $this->_Contribuyente = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['contribuyenteId'];
        }

        if (!is_null($primaryKey)) {
            $this->setContribuyenteId($primaryKey);
        }

        $this->_setLoaded('CubosIbfk1');
        return $this;
    }

    /**
     * Gets parent Contribuyente
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyente($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Contribuyente = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Contribuyente;
    }

    /**
     * Sets parent relation CubosTipos
     *
     * @param \Atezate\Model\Raw\CubosTipos $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setCubosTipos(\Atezate\Model\Raw\CubosTipos $data)
    {
        $this->_CubosTipos = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['cubosTiposId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCubosTiposId($primaryKey);
        }

        $this->_setLoaded('CubosIbfk3');
        return $this;
    }

    /**
     * Gets parent CubosTipos
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function getCubosTipos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_CubosTipos = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_CubosTipos;
    }

    /**
     * Sets parent relation PuntosRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setPuntosRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntosRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntosRecogidaId($primaryKey);
        }

        $this->_setLoaded('CubosIbfk4');
        return $this;
    }

    /**
     * Gets parent PuntosRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogida = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntosRecogida;
    }

    /**
     * Sets parent relation Poste
     *
     * @param \Atezate\Model\Raw\Postes $data
     * @return \Atezate\Model\Raw\Cubos
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

        $this->_setLoaded('CubosIbfk5');
        return $this;
    }

    /**
     * Gets parent Poste
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Postes
     */
    public function getPoste($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk5';

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
     * Sets parent relation CentrosEmergencia
     *
     * @param \Atezate\Model\Raw\CentrosEmergencia $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setCentrosEmergencia(\Atezate\Model\Raw\CentrosEmergencia $data)
    {
        $this->_CentrosEmergencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setCentrosEmergenciaId($primaryKey);
        }

        $this->_setLoaded('CubosIbfk6');
        return $this;
    }

    /**
     * Gets parent CentrosEmergencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function getCentrosEmergencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_CentrosEmergencia = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_CentrosEmergencia;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\Cubos
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

        $this->_Incidencias = array();

        foreach ($data as $object) {
            $this->addIncidencias($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_1
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk1');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Incidencias = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Incidencias;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Recogidas
     * @return \Atezate\Model\Raw\Cubos
     */
    public function setRecogidas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Recogidas === null) {

                $this->getRecogidas();
            }

            $oldRelations = $this->_Recogidas;

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

        $this->_Recogidas = array();

        foreach ($data as $object) {
            $this->addRecogidas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_2
     *
     * @param \Atezate\Model\Raw\Recogidas $data
     * @return \Atezate\Model\Raw\Cubos
     */
    public function addRecogidas(\Atezate\Model\Raw\Recogidas $data)
    {
        $this->_Recogidas[] = $data;
        $this->_setLoaded('RecogidasIbfk2');
        return $this;
    }

    /**
     * Gets dependent Recogidas_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Recogidas
     */
    public function getRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Recogidas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Recogidas;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Cubos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Cubos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Cubos);

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
     * @return null | \Atezate\Model\Validator\Cubos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Cubos')) {

                $this->setValidator(new \Atezate\Validator\Cubos);
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
     * @see \Mapper\Sql\Cubos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getCuboId() === null) {
            $this->_logger->log('The value for CuboId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'cuboId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getCuboId())
        );
    }
}
