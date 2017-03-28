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
 * [entity] No es posible eliminar puntos de recogida de los que dependan Centros de emergencia, cubos o postes
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class PuntosRecogida extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaTiposId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nombreDescriptivo;

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
    protected $_barrio;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_calle;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_numero;

    /**
     * [map] geometry column :: 25830
     * Database var type text
     *
     * @var text
     */
    protected $_posicion;

    /**
     * [map]
     * Database var type varchar
     *
     * @var string
     */
    protected $_posicionAddr;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_rfid;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_posicionLat;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_posicionLng;


    /**
     * Parent relation PuntosRecogida_ibfk_1
     *
     * @var \Atezate\Model\Raw\PuntosRecogidaTipos
     */
    protected $_PuntosRecogidaTipos;

    /**
     * Parent relation PuntosRecogida_ibfk_2
     *
     * @var \Atezate\Model\Raw\Municipios
     */
    protected $_Municipio;


    /**
     * Dependent relation CentrosEmergencia_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CentrosEmergencia[]
     */
    protected $_CentrosEmergencia;

    /**
     * Dependent relation Cubos_ibfk_4
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Cubos[]
     */
    protected $_Cubos;

    /**
     * Dependent relation Incidencias_ibfk_10
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation Paradas_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Paradas[]
     */
    protected $_Paradas;

    /**
     * Dependent relation Postes_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Postes[]
     */
    protected $_Postes;

    /**
     * Dependent relation Recogidas_ibfk_7
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Recogidas[]
     */
    protected $_Recogidas;

    /**
     * Dependent relation RutasRelPuntosRecogida_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\RutasRelPuntosRecogida[]
     */
    protected $_RutasRelPuntosRecogida;

    /**
     * Dependent relation TurnosRelCamiones_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones[]
     */
    protected $_TurnosRelCamiones;


    protected $_columnsList = array(
        'puntosRecogidaId'=>'puntosRecogidaId',
        'puntosRecogidaTiposId'=>'puntosRecogidaTiposId',
        'nombreDescriptivo'=>'nombreDescriptivo',
        'municipioId'=>'municipioId',
        'barrio'=>'barrio',
        'calle'=>'calle',
        'numero'=>'numero',
        'posicion'=>'posicion',
        'posicionAddr'=>'posicionAddr',
        'rfid'=>'rfid',
        'posicionLat'=>'posicionLat',
        'posicionLng'=>'posicionLng',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'puntosRecogidaTiposId'=> array(''),
            'posicion'=> array('map'),
            'posicionAddr'=> array('map'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'PuntosRecogidaIbfk1'=> array(
                    'property' => 'PuntosRecogidaTipos',
                    'table_name' => 'PuntosRecogidaTipos',
                ),
            'PuntosRecogidaIbfk2'=> array(
                    'property' => 'Municipio',
                    'table_name' => 'Municipios',
                ),
        ));

        $this->setDependentList(array(
            'CentrosEmergenciaIbfk1' => array(
                    'property' => 'CentrosEmergencia',
                    'table_name' => 'CentrosEmergencia',
                ),
            'CubosIbfk4' => array(
                    'property' => 'Cubos',
                    'table_name' => 'Cubos',
                ),
            'IncidenciasIbfk10' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'ParadasIbfk2' => array(
                    'property' => 'Paradas',
                    'table_name' => 'Paradas',
                ),
            'PostesIbfk1' => array(
                    'property' => 'Postes',
                    'table_name' => 'Postes',
                ),
            'RecogidasIbfk7' => array(
                    'property' => 'Recogidas',
                    'table_name' => 'Recogidas',
                ),
            'RutasRelPuntosRecogidaIbfk2' => array(
                    'property' => 'RutasRelPuntosRecogida',
                    'table_name' => 'RutasRelPuntosRecogida',
                ),
            'TurnosRelCamionesIbfk3' => array(
                    'property' => 'TurnosRelCamiones',
                    'table_name' => 'TurnosRelCamiones',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Incidencias_ibfk_10',
            'Paradas_ibfk_2'
        ));


        $this->_defaultValues = array(
            'nombreDescriptivo' => '',
            'barrio' => '',
            'calle' => '',
            'numero' => '',
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
     * @return \Atezate\Model\Raw\PuntosRecogida
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
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPuntosRecogidaTiposId($data)
    {

        if ($this->_puntosRecogidaTiposId != $data) {
            $this->_logChange('puntosRecogidaTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosRecogidaTiposId = $data;
        } else if (!is_null($data)) {
            $this->_puntosRecogidaTiposId = (int) $data;
        } else {
            $this->_puntosRecogidaTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosRecogidaTiposId
     *
     * @return int
     */
    public function getPuntosRecogidaTiposId()
    {
            return $this->_puntosRecogidaTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setNombreDescriptivo($data)
    {

        if ($this->_nombreDescriptivo != $data) {
            $this->_logChange('nombreDescriptivo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nombreDescriptivo = $data;
        } else if (!is_null($data)) {
            $this->_nombreDescriptivo = (string) $data;
        } else {
            $this->_nombreDescriptivo = $data;
        }
        return $this;
    }

    /**
     * Gets column nombreDescriptivo
     *
     * @return string
     */
    public function getNombreDescriptivo()
    {
            return $this->_nombreDescriptivo;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PuntosRecogida
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
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setBarrio($data)
    {

        if ($this->_barrio != $data) {
            $this->_logChange('barrio');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_barrio = $data;
        } else if (!is_null($data)) {
            $this->_barrio = (string) $data;
        } else {
            $this->_barrio = $data;
        }
        return $this;
    }

    /**
     * Gets column barrio
     *
     * @return string
     */
    public function getBarrio()
    {
            return $this->_barrio;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setCalle($data)
    {

        if ($this->_calle != $data) {
            $this->_logChange('calle');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_calle = $data;
        } else if (!is_null($data)) {
            $this->_calle = (string) $data;
        } else {
            $this->_calle = $data;
        }
        return $this;
    }

    /**
     * Gets column calle
     *
     * @return string
     */
    public function getCalle()
    {
            return $this->_calle;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setNumero($data)
    {

        if ($this->_numero != $data) {
            $this->_logChange('numero');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_numero = $data;
        } else if (!is_null($data)) {
            $this->_numero = (string) $data;
        } else {
            $this->_numero = $data;
        }
        return $this;
    }

    /**
     * Gets column numero
     *
     * @return string
     */
    public function getNumero()
    {
            return $this->_numero;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPosicion($data)
    {

        if ($this->_posicion != $data) {
            $this->_logChange('posicion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicion = $data;
        } else if (!is_null($data)) {
            $this->_posicion = (string) $data;
        } else {
            $this->_posicion = $data;
        }
        return $this;
    }

    /**
     * Gets column posicion
     *
     * @return text
     */
    public function getPosicion()
    {
            return $this->_posicion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPosicionAddr($data)
    {

        if ($this->_posicionAddr != $data) {
            $this->_logChange('posicionAddr');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionAddr = $data;
        } else if (!is_null($data)) {
            $this->_posicionAddr = (string) $data;
        } else {
            $this->_posicionAddr = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionAddr
     *
     * @return string
     */
    public function getPosicionAddr()
    {
            return $this->_posicionAddr;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosRecogida
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
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPosicionLat($data)
    {

        if ($this->_posicionLat != $data) {
            $this->_logChange('posicionLat');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionLat = $data;
        } else if (!is_null($data)) {
            $this->_posicionLat = (float) $data;
        } else {
            $this->_posicionLat = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionLat
     *
     * @return float
     */
    public function getPosicionLat()
    {
            return $this->_posicionLat;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPosicionLng($data)
    {

        if ($this->_posicionLng != $data) {
            $this->_logChange('posicionLng');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionLng = $data;
        } else if (!is_null($data)) {
            $this->_posicionLng = (float) $data;
        } else {
            $this->_posicionLng = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionLng
     *
     * @return float
     */
    public function getPosicionLng()
    {
            return $this->_posicionLng;
    }


    /**
     * Sets parent relation PuntosRecogidaTipos
     *
     * @param \Atezate\Model\Raw\PuntosRecogidaTipos $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPuntosRecogidaTipos(\Atezate\Model\Raw\PuntosRecogidaTipos $data)
    {
        $this->_PuntosRecogidaTipos = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaTiposId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntosRecogidaTiposId($primaryKey);
        }

        $this->_setLoaded('PuntosRecogidaIbfk1');
        return $this;
    }

    /**
     * Gets parent PuntosRecogidaTipos
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogidaTipos
     */
    public function getPuntosRecogidaTipos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PuntosRecogidaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogidaTipos = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntosRecogidaTipos;
    }

    /**
     * Sets parent relation Municipio
     *
     * @param \Atezate\Model\Raw\Municipios $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setMunicipio(\Atezate\Model\Raw\Municipios $data)
    {
        $this->_Municipio = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['municipioId'];
        }

        if (!is_null($primaryKey)) {
            $this->setMunicipioId($primaryKey);
        }

        $this->_setLoaded('PuntosRecogidaIbfk2');
        return $this;
    }

    /**
     * Gets parent Municipio
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Municipios
     */
    public function getMunicipio($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PuntosRecogidaIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Municipio = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Municipio;
    }

    /**
     * Sets dependent relations CentrosEmergencia_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\CentrosEmergencia
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setCentrosEmergencia(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CentrosEmergencia === null) {

                $this->getCentrosEmergencia();
            }

            $oldRelations = $this->_CentrosEmergencia;

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

        $this->_CentrosEmergencia = array();

        foreach ($data as $object) {
            $this->addCentrosEmergencia($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CentrosEmergencia_ibfk_1
     *
     * @param \Atezate\Model\Raw\CentrosEmergencia $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addCentrosEmergencia(\Atezate\Model\Raw\CentrosEmergencia $data)
    {
        $this->_CentrosEmergencia[] = $data;
        $this->_setLoaded('CentrosEmergenciaIbfk1');
        return $this;
    }

    /**
     * Gets dependent CentrosEmergencia_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CentrosEmergencia
     */
    public function getCentrosEmergencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CentrosEmergenciaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CentrosEmergencia = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CentrosEmergencia;
    }

    /**
     * Sets dependent relations Cubos_ibfk_4
     *
     * @param array $data An array of \Atezate\Model\Raw\Cubos
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setCubos(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Cubos === null) {

                $this->getCubos();
            }

            $oldRelations = $this->_Cubos;

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

        $this->_Cubos = array();

        foreach ($data as $object) {
            $this->addCubos($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Cubos_ibfk_4
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addCubos(\Atezate\Model\Raw\Cubos $data)
    {
        $this->_Cubos[] = $data;
        $this->_setLoaded('CubosIbfk4');
        return $this;
    }

    /**
     * Gets dependent Cubos_ibfk_4
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Cubos
     */
    public function getCubos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Cubos = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Cubos;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_10
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\PuntosRecogida
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
     * Sets dependent relations Incidencias_ibfk_10
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk10');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_10
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk10';

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
     * Sets dependent relations Paradas_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Paradas
     * @return \Atezate\Model\Raw\PuntosRecogida
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
     * Sets dependent relations Paradas_ibfk_2
     *
     * @param \Atezate\Model\Raw\Paradas $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addParadas(\Atezate\Model\Raw\Paradas $data)
    {
        $this->_Paradas[] = $data;
        $this->_setLoaded('ParadasIbfk2');
        return $this;
    }

    /**
     * Gets dependent Paradas_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Paradas
     */
    public function getParadas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ParadasIbfk2';

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
     * Sets dependent relations Postes_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Postes
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setPostes(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Postes === null) {

                $this->getPostes();
            }

            $oldRelations = $this->_Postes;

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

        $this->_Postes = array();

        foreach ($data as $object) {
            $this->addPostes($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Postes_ibfk_1
     *
     * @param \Atezate\Model\Raw\Postes $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addPostes(\Atezate\Model\Raw\Postes $data)
    {
        $this->_Postes[] = $data;
        $this->_setLoaded('PostesIbfk1');
        return $this;
    }

    /**
     * Gets dependent Postes_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Postes
     */
    public function getPostes($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PostesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Postes = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Postes;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_7
     *
     * @param array $data An array of \Atezate\Model\Raw\Recogidas
     * @return \Atezate\Model\Raw\PuntosRecogida
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
     * Sets dependent relations Recogidas_ibfk_7
     *
     * @param \Atezate\Model\Raw\Recogidas $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addRecogidas(\Atezate\Model\Raw\Recogidas $data)
    {
        $this->_Recogidas[] = $data;
        $this->_setLoaded('RecogidasIbfk7');
        return $this;
    }

    /**
     * Gets dependent Recogidas_ibfk_7
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Recogidas
     */
    public function getRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk7';

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
     * Sets dependent relations RutasRelPuntosRecogida_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\RutasRelPuntosRecogida
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setRutasRelPuntosRecogida(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_RutasRelPuntosRecogida === null) {

                $this->getRutasRelPuntosRecogida();
            }

            $oldRelations = $this->_RutasRelPuntosRecogida;

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

        $this->_RutasRelPuntosRecogida = array();

        foreach ($data as $object) {
            $this->addRutasRelPuntosRecogida($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations RutasRelPuntosRecogida_ibfk_2
     *
     * @param \Atezate\Model\Raw\RutasRelPuntosRecogida $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addRutasRelPuntosRecogida(\Atezate\Model\Raw\RutasRelPuntosRecogida $data)
    {
        $this->_RutasRelPuntosRecogida[] = $data;
        $this->_setLoaded('RutasRelPuntosRecogidaIbfk2');
        return $this;
    }

    /**
     * Gets dependent RutasRelPuntosRecogida_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function getRutasRelPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasRelPuntosRecogidaIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_RutasRelPuntosRecogida = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_RutasRelPuntosRecogida;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\TurnosRelCamiones
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function setTurnosRelCamiones(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_TurnosRelCamiones === null) {

                $this->getTurnosRelCamiones();
            }

            $oldRelations = $this->_TurnosRelCamiones;

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

        $this->_TurnosRelCamiones = array();

        foreach ($data as $object) {
            $this->addTurnosRelCamiones($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_3
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function addTurnosRelCamiones(\Atezate\Model\Raw\TurnosRelCamiones $data)
    {
        $this->_TurnosRelCamiones[] = $data;
        $this->_setLoaded('TurnosRelCamionesIbfk3');
        return $this;
    }

    /**
     * Gets dependent TurnosRelCamiones_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosRelCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_TurnosRelCamiones = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_TurnosRelCamiones;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\PuntosRecogida
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\PuntosRecogida')) {

                $this->setMapper(new \Atezate\Mapper\Sql\PuntosRecogida);

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
     * @return null | \Atezate\Model\Validator\PuntosRecogida
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\PuntosRecogida')) {

                $this->setValidator(new \Atezate\Validator\PuntosRecogida);
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
     * @see \Mapper\Sql\PuntosRecogida::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPuntosRecogidaId() === null) {
            $this->_logger->log('The value for PuntosRecogidaId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'puntosRecogidaId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPuntosRecogidaId())
        );
    }
}
