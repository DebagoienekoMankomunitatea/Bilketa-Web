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
class TurnosRelCamiones extends ModelAbstract
{

    protected $_ordenAcceptedValues = array(
        'asc',
        'desc',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_turnoId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_camionesId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_tabletId;

    /**
     * [enum:asc|desc]
     * Database var type varchar
     *
     * @var string
     */
    protected $_orden;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_origenPuntoRecogidaId;

    /**
     * Database var type time
     *
     * @var string
     */
    protected $_horaInicio;


    /**
     * Parent relation TurnosRelCamiones_ibfk_1
     *
     * @var \Atezate\Model\Raw\Turnos
     */
    protected $_Turno;

    /**
     * Parent relation TurnosRelCamiones_ibfk_2
     *
     * @var \Atezate\Model\Raw\Camiones
     */
    protected $_Camiones;

    /**
     * Parent relation TurnosRelCamiones_ibfk_3
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_OrigenPuntoRecogida;

    /**
     * Parent relation TurnosRelCamiones_ibfk_4
     *
     * @var \Atezate\Model\Raw\Dispositivos
     */
    protected $_T;


    /**
     * Dependent relation Paradas_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Paradas[]
     */
    protected $_Paradas;

    /**
     * Dependent relation Posicionamiento_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Posicionamiento[]
     */
    protected $_Posicionamiento;

    /**
     * Dependent relation TurnosCamionesRelOperarios_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TurnosCamionesRelOperarios[]
     */
    protected $_TurnosCamionesRelOperarios;


    protected $_columnsList = array(
        'id'=>'id',
        'turnoId'=>'turnoId',
        'camionesId'=>'camionesId',
        'tabletId'=>'tabletId',
        'orden'=>'orden',
        'origenPuntoRecogidaId'=>'origenPuntoRecogidaId',
        'horaInicio'=>'horaInicio',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'turnoId'=> array(''),
            'orden'=> array('enum:asc|desc'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'TurnosRelCamionesIbfk1'=> array(
                    'property' => 'Turno',
                    'table_name' => 'Turnos',
                ),
            'TurnosRelCamionesIbfk2'=> array(
                    'property' => 'Camiones',
                    'table_name' => 'Camiones',
                ),
            'TurnosRelCamionesIbfk3'=> array(
                    'property' => 'OrigenPuntoRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
            'TurnosRelCamionesIbfk4'=> array(
                    'property' => 'T',
                    'table_name' => 'Dispositivos',
                ),
        ));

        $this->setDependentList(array(
            'ParadasIbfk1' => array(
                    'property' => 'Paradas',
                    'table_name' => 'Paradas',
                ),
            'PosicionamientoIbfk1' => array(
                    'property' => 'Posicionamiento',
                    'table_name' => 'Posicionamiento',
                ),
            'TurnosCamionesRelOperariosIbfk1' => array(
                    'property' => 'TurnosCamionesRelOperarios',
                    'table_name' => 'TurnosCamionesRelOperarios',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Paradas_ibfk_1',
            'Posicionamiento_ibfk_1',
            'TurnosCamionesRelOperarios_ibfk_1'
        ));


        $this->_defaultValues = array(
            'orden' => 'asc',
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
     * @return \Atezate\Model\Raw\TurnosRelCamiones
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
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setTurnoId($data)
    {

        if ($this->_turnoId != $data) {
            $this->_logChange('turnoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_turnoId = $data;
        } else if (!is_null($data)) {
            $this->_turnoId = (int) $data;
        } else {
            $this->_turnoId = $data;
        }
        return $this;
    }

    /**
     * Gets column turnoId
     *
     * @return int
     */
    public function getTurnoId()
    {
            return $this->_turnoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setCamionesId($data)
    {

        if ($this->_camionesId != $data) {
            $this->_logChange('camionesId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_camionesId = $data;
        } else if (!is_null($data)) {
            $this->_camionesId = (int) $data;
        } else {
            $this->_camionesId = $data;
        }
        return $this;
    }

    /**
     * Gets column camionesId
     *
     * @return int
     */
    public function getCamionesId()
    {
            return $this->_camionesId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setTabletId($data)
    {

        if ($this->_tabletId != $data) {
            $this->_logChange('tabletId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tabletId = $data;
        } else if (!is_null($data)) {
            $this->_tabletId = (int) $data;
        } else {
            $this->_tabletId = $data;
        }
        return $this;
    }

    /**
     * Gets column tabletId
     *
     * @return int
     */
    public function getTabletId()
    {
            return $this->_tabletId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setOrden($data)
    {

        if ($this->_orden != $data) {
            $this->_logChange('orden');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_orden = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_ordenAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for orden'));
            }
            $this->_orden = (string) $data;
        } else {
            $this->_orden = $data;
        }
        return $this;
    }

    /**
     * Gets column orden
     *
     * @return string
     */
    public function getOrden()
    {
            return $this->_orden;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setOrigenPuntoRecogidaId($data)
    {

        if ($this->_origenPuntoRecogidaId != $data) {
            $this->_logChange('origenPuntoRecogidaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_origenPuntoRecogidaId = $data;
        } else if (!is_null($data)) {
            $this->_origenPuntoRecogidaId = (int) $data;
        } else {
            $this->_origenPuntoRecogidaId = $data;
        }
        return $this;
    }

    /**
     * Gets column origenPuntoRecogidaId
     *
     * @return int
     */
    public function getOrigenPuntoRecogidaId()
    {
            return $this->_origenPuntoRecogidaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setHoraInicio($data)
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


        if ($this->_horaInicio != $data) {
            $this->_logChange('horaInicio');
        }


        $this->_horaInicio = $data;
        return $this;
    }

    /**
     * Gets column horaInicio
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getHoraInicio($returnZendDate = false)
    {
    
        if (is_null($this->_horaInicio)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_horaInicio->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_horaInicio->format('H:i:s');

    }


    /**
     * Sets parent relation Turno
     *
     * @param \Atezate\Model\Raw\Turnos $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setTurno(\Atezate\Model\Raw\Turnos $data)
    {
        $this->_Turno = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['turnoId'];
        }

        if (!is_null($primaryKey)) {
            $this->setTurnoId($primaryKey);
        }

        $this->_setLoaded('TurnosRelCamionesIbfk1');
        return $this;
    }

    /**
     * Gets parent Turno
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Turnos
     */
    public function getTurno($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Turno = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Turno;
    }

    /**
     * Sets parent relation Camiones
     *
     * @param \Atezate\Model\Raw\Camiones $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setCamiones(\Atezate\Model\Raw\Camiones $data)
    {
        $this->_Camiones = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['camionId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCamionesId($primaryKey);
        }

        $this->_setLoaded('TurnosRelCamionesIbfk2');
        return $this;
    }

    /**
     * Gets parent Camiones
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Camiones
     */
    public function getCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Camiones = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Camiones;
    }

    /**
     * Sets parent relation OrigenPuntoRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setOrigenPuntoRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_OrigenPuntoRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setOrigenPuntoRecogidaId($primaryKey);
        }

        $this->_setLoaded('TurnosRelCamionesIbfk3');
        return $this;
    }

    /**
     * Gets parent OrigenPuntoRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getOrigenPuntoRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_OrigenPuntoRecogida = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_OrigenPuntoRecogida;
    }

    /**
     * Sets parent relation T
     *
     * @param \Atezate\Model\Raw\Dispositivos $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setT(\Atezate\Model\Raw\Dispositivos $data)
    {
        $this->_T = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setTabletId($primaryKey);
        }

        $this->_setLoaded('TurnosRelCamionesIbfk4');
        return $this;
    }

    /**
     * Gets parent T
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Dispositivos
     */
    public function getT($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_T = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_T;
    }

    /**
     * Sets dependent relations Paradas_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Paradas
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setParadas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Paradas === null) {

                $this->getParadas();
            }

            $oldRelations = $this->_Paradas;

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

        $this->_Paradas = array();

        foreach ($data as $object) {
            $this->addParadas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Paradas_ibfk_1
     *
     * @param \Atezate\Model\Raw\Paradas $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function addParadas(\Atezate\Model\Raw\Paradas $data)
    {
        $this->_Paradas[] = $data;
        $this->_setLoaded('ParadasIbfk1');
        return $this;
    }

    /**
     * Gets dependent Paradas_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Paradas
     */
    public function getParadas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ParadasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Paradas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Paradas;
    }

    /**
     * Sets dependent relations Posicionamiento_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Posicionamiento
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setPosicionamiento(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Posicionamiento === null) {

                $this->getPosicionamiento();
            }

            $oldRelations = $this->_Posicionamiento;

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

        $this->_Posicionamiento = array();

        foreach ($data as $object) {
            $this->addPosicionamiento($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Posicionamiento_ibfk_1
     *
     * @param \Atezate\Model\Raw\Posicionamiento $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function addPosicionamiento(\Atezate\Model\Raw\Posicionamiento $data)
    {
        $this->_Posicionamiento[] = $data;
        $this->_setLoaded('PosicionamientoIbfk1');
        return $this;
    }

    /**
     * Gets dependent Posicionamiento_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Posicionamiento
     */
    public function getPosicionamiento($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PosicionamientoIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Posicionamiento = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Posicionamiento;
    }

    /**
     * Sets dependent relations TurnosCamionesRelOperarios_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\TurnosCamionesRelOperarios
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function setTurnosCamionesRelOperarios(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_TurnosCamionesRelOperarios === null) {

                $this->getTurnosCamionesRelOperarios();
            }

            $oldRelations = $this->_TurnosCamionesRelOperarios;

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

        $this->_TurnosCamionesRelOperarios = array();

        foreach ($data as $object) {
            $this->addTurnosCamionesRelOperarios($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations TurnosCamionesRelOperarios_ibfk_1
     *
     * @param \Atezate\Model\Raw\TurnosCamionesRelOperarios $data
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function addTurnosCamionesRelOperarios(\Atezate\Model\Raw\TurnosCamionesRelOperarios $data)
    {
        $this->_TurnosCamionesRelOperarios[] = $data;
        $this->_setLoaded('TurnosCamionesRelOperariosIbfk1');
        return $this;
    }

    /**
     * Gets dependent TurnosCamionesRelOperarios_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TurnosCamionesRelOperarios
     */
    public function getTurnosCamionesRelOperarios($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosCamionesRelOperariosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_TurnosCamionesRelOperarios = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_TurnosCamionesRelOperarios;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\TurnosRelCamiones
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\TurnosRelCamiones')) {

                $this->setMapper(new \Atezate\Mapper\Sql\TurnosRelCamiones);

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
     * @return null | \Atezate\Model\Validator\TurnosRelCamiones
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\TurnosRelCamiones')) {

                $this->setValidator(new \Atezate\Validator\TurnosRelCamiones);
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
     * @see \Mapper\Sql\TurnosRelCamiones::delete
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
