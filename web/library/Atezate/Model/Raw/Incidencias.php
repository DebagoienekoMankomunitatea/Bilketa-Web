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
class Incidencias extends ModelAbstract
{

    protected $_entidadAcceptedValues = array(
        'cubo',
        'poste',
        'compostador',
        'camion',
        'puntoRecogida',
        'contribuyente',
    );
    protected $_solucionadaAcceptedValues = array(
        'si',
        'no',
        'automatico',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_incidenciaId;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_fechaAlta;

    /**
     * [enum:cubo|poste|compostador|camion|puntoRecogida|contribuyente]
     * Database var type varchar
     *
     * @var string
     */
    protected $_entidad;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_cuboId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_postesId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_compostadorId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_camionId;

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
    protected $_puntoRecogidaId;

    /**
     * [enum:si|no|automatico]
     * Database var type varchar
     *
     * @var string
     */
    protected $_solucionada;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_observacionSolucion;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_tipoId;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_observaciones;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_paradaId;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;


    /**
     * Parent relation Incidencias_ibfk_1
     *
     * @var \Atezate\Model\Raw\Cubos
     */
    protected $_Cubo;

    /**
     * Parent relation Incidencias_ibfk_10
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntoRecogida;

    /**
     * Parent relation Incidencias_ibfk_11
     *
     * @var \Atezate\Model\Raw\Contribuyentes
     */
    protected $_Contribuyente;

    /**
     * Parent relation Incidencias_ibfk_12
     *
     * @var \Atezate\Model\Raw\Paradas
     */
    protected $_Parada;

    /**
     * Parent relation Incidencias_ibfk_13
     *
     * @var \Atezate\Model\Raw\TiposIncidencias
     */
    protected $_Tipo;

    /**
     * Parent relation Incidencias_ibfk_2
     *
     * @var \Atezate\Model\Raw\Postes
     */
    protected $_Postes;

    /**
     * Parent relation Incidencias_ibfk_6
     *
     * @var \Atezate\Model\Raw\Compostadores
     */
    protected $_Compostador;

    /**
     * Parent relation Incidencias_ibfk_9
     *
     * @var \Atezate\Model\Raw\Camiones
     */
    protected $_Camion;


    /**
     * Dependent relation LogEmails_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\LogEmails[]
     */
    protected $_LogEmails;

    /**
     * Dependent relation LogLlamadas_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\LogLlamadas[]
     */
    protected $_LogLlamadas;

    /**
     * Dependent relation LogSms_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\LogSms[]
     */
    protected $_LogSms;


    protected $_columnsList = array(
        'incidenciaId'=>'incidenciaId',
        'fechaAlta'=>'fechaAlta',
        'entidad'=>'entidad',
        'cuboId'=>'cuboId',
        'postesId'=>'postesId',
        'compostadorId'=>'compostadorId',
        'camionId'=>'camionId',
        'contribuyenteId'=>'contribuyenteId',
        'puntoRecogidaId'=>'puntoRecogidaId',
        'solucionada'=>'solucionada',
        'observacionSolucion'=>'observacionSolucion',
        'tipoId'=>'tipoId',
        'observaciones'=>'observaciones',
        'paradaId'=>'paradaId',
        'createdOn'=>'createdOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'entidad'=> array('enum:cubo|poste|compostador|camion|puntoRecogida|contribuyente'),
            'solucionada'=> array('enum:si|no|automatico'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'IncidenciasIbfk1'=> array(
                    'property' => 'Cubo',
                    'table_name' => 'Cubos',
                ),
            'IncidenciasIbfk10'=> array(
                    'property' => 'PuntoRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
            'IncidenciasIbfk11'=> array(
                    'property' => 'Contribuyente',
                    'table_name' => 'Contribuyentes',
                ),
            'IncidenciasIbfk12'=> array(
                    'property' => 'Parada',
                    'table_name' => 'Paradas',
                ),
            'IncidenciasIbfk13'=> array(
                    'property' => 'Tipo',
                    'table_name' => 'TiposIncidencias',
                ),
            'IncidenciasIbfk2'=> array(
                    'property' => 'Postes',
                    'table_name' => 'Postes',
                ),
            'IncidenciasIbfk6'=> array(
                    'property' => 'Compostador',
                    'table_name' => 'Compostadores',
                ),
            'IncidenciasIbfk9'=> array(
                    'property' => 'Camion',
                    'table_name' => 'Camiones',
                ),
        ));

        $this->setDependentList(array(
            'LogEmailsIbfk3' => array(
                    'property' => 'LogEmails',
                    'table_name' => 'LogEmails',
                ),
            'LogLlamadasIbfk3' => array(
                    'property' => 'LogLlamadas',
                    'table_name' => 'LogLlamadas',
                ),
            'LogSmsIbfk1' => array(
                    'property' => 'LogSms',
                    'table_name' => 'LogSms',
                ),
        ));




        $this->_defaultValues = array(
            'solucionada' => 'no',
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
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setIncidenciaId($data)
    {

        if ($this->_incidenciaId != $data) {
            $this->_logChange('incidenciaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_incidenciaId = $data;
        } else if (!is_null($data)) {
            $this->_incidenciaId = (int) $data;
        } else {
            $this->_incidenciaId = $data;
        }
        return $this;
    }

    /**
     * Gets column incidenciaId
     *
     * @return int
     */
    public function getIncidenciaId()
    {
            return $this->_incidenciaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setFechaAlta($data)
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


        if ($this->_fechaAlta != $data) {
            $this->_logChange('fechaAlta');
        }


        $this->_fechaAlta = $data;
        return $this;
    }

    /**
     * Gets column fechaAlta
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaAlta($returnZendDate = false)
    {
    
        if (is_null($this->_fechaAlta)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaAlta->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaAlta->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setEntidad($data)
    {

        if ($this->_entidad != $data) {
            $this->_logChange('entidad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_entidad = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_entidadAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for entidad'));
            }
            $this->_entidad = (string) $data;
        } else {
            $this->_entidad = $data;
        }
        return $this;
    }

    /**
     * Gets column entidad
     *
     * @return string
     */
    public function getEntidad()
    {
            return $this->_entidad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
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
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setPostesId($data)
    {

        if ($this->_postesId != $data) {
            $this->_logChange('postesId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_postesId = $data;
        } else if (!is_null($data)) {
            $this->_postesId = (int) $data;
        } else {
            $this->_postesId = $data;
        }
        return $this;
    }

    /**
     * Gets column postesId
     *
     * @return int
     */
    public function getPostesId()
    {
            return $this->_postesId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setCompostadorId($data)
    {

        if ($this->_compostadorId != $data) {
            $this->_logChange('compostadorId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_compostadorId = $data;
        } else if (!is_null($data)) {
            $this->_compostadorId = (int) $data;
        } else {
            $this->_compostadorId = $data;
        }
        return $this;
    }

    /**
     * Gets column compostadorId
     *
     * @return int
     */
    public function getCompostadorId()
    {
            return $this->_compostadorId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setCamionId($data)
    {

        if ($this->_camionId != $data) {
            $this->_logChange('camionId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_camionId = $data;
        } else if (!is_null($data)) {
            $this->_camionId = (int) $data;
        } else {
            $this->_camionId = $data;
        }
        return $this;
    }

    /**
     * Gets column camionId
     *
     * @return int
     */
    public function getCamionId()
    {
            return $this->_camionId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
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
     * @return \Atezate\Model\Raw\Incidencias
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
     * @param string $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setSolucionada($data)
    {

        if ($this->_solucionada != $data) {
            $this->_logChange('solucionada');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_solucionada = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_solucionadaAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for solucionada'));
            }
            $this->_solucionada = (string) $data;
        } else {
            $this->_solucionada = $data;
        }
        return $this;
    }

    /**
     * Gets column solucionada
     *
     * @return string
     */
    public function getSolucionada()
    {
            return $this->_solucionada;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setObservacionSolucion($data)
    {

        if ($this->_observacionSolucion != $data) {
            $this->_logChange('observacionSolucion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_observacionSolucion = $data;
        } else if (!is_null($data)) {
            $this->_observacionSolucion = (string) $data;
        } else {
            $this->_observacionSolucion = $data;
        }
        return $this;
    }

    /**
     * Gets column observacionSolucion
     *
     * @return text
     */
    public function getObservacionSolucion()
    {
            return $this->_observacionSolucion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setTipoId($data)
    {

        if ($this->_tipoId != $data) {
            $this->_logChange('tipoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipoId = $data;
        } else if (!is_null($data)) {
            $this->_tipoId = (int) $data;
        } else {
            $this->_tipoId = $data;
        }
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
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setObservaciones($data)
    {

        if ($this->_observaciones != $data) {
            $this->_logChange('observaciones');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_observaciones = $data;
        } else if (!is_null($data)) {
            $this->_observaciones = (string) $data;
        } else {
            $this->_observaciones = $data;
        }
        return $this;
    }

    /**
     * Gets column observaciones
     *
     * @return text
     */
    public function getObservaciones()
    {
            return $this->_observaciones;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Incidencias
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
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Incidencias
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
     * Sets parent relation Cubo
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\Incidencias
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

        $this->_setLoaded('IncidenciasIbfk1');
        return $this;
    }

    /**
     * Gets parent Cubo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Cubos
     */
    public function getCubo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk1';

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
     * Sets parent relation PuntoRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\Incidencias
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

        $this->_setLoaded('IncidenciasIbfk10');
        return $this;
    }

    /**
     * Gets parent PuntoRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntoRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk10';

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
     * Sets parent relation Contribuyente
     *
     * @param \Atezate\Model\Raw\Contribuyentes $data
     * @return \Atezate\Model\Raw\Incidencias
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

        $this->_setLoaded('IncidenciasIbfk11');
        return $this;
    }

    /**
     * Gets parent Contribuyente
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyente($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk11';

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
     * Sets parent relation Parada
     *
     * @param \Atezate\Model\Raw\Paradas $data
     * @return \Atezate\Model\Raw\Incidencias
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

        $this->_setLoaded('IncidenciasIbfk12');
        return $this;
    }

    /**
     * Gets parent Parada
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Paradas
     */
    public function getParada($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk12';

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
     * Sets parent relation Tipo
     *
     * @param \Atezate\Model\Raw\TiposIncidencias $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setTipo(\Atezate\Model\Raw\TiposIncidencias $data)
    {
        $this->_Tipo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['tipoId'];
        }

        if (!is_null($primaryKey)) {
            $this->setTipoId($primaryKey);
        }

        $this->_setLoaded('IncidenciasIbfk13');
        return $this;
    }

    /**
     * Gets parent Tipo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function getTipo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk13';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Tipo = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Tipo;
    }

    /**
     * Sets parent relation Postes
     *
     * @param \Atezate\Model\Raw\Postes $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setPostes(\Atezate\Model\Raw\Postes $data)
    {
        $this->_Postes = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['postesId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPostesId($primaryKey);
        }

        $this->_setLoaded('IncidenciasIbfk2');
        return $this;
    }

    /**
     * Gets parent Postes
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Postes
     */
    public function getPostes($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Postes = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Postes;
    }

    /**
     * Sets parent relation Compostador
     *
     * @param \Atezate\Model\Raw\Compostadores $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setCompostador(\Atezate\Model\Raw\Compostadores $data)
    {
        $this->_Compostador = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['compostadoresId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCompostadorId($primaryKey);
        }

        $this->_setLoaded('IncidenciasIbfk6');
        return $this;
    }

    /**
     * Gets parent Compostador
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function getCompostador($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Compostador = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Compostador;
    }

    /**
     * Sets parent relation Camion
     *
     * @param \Atezate\Model\Raw\Camiones $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setCamion(\Atezate\Model\Raw\Camiones $data)
    {
        $this->_Camion = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['camionId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCamionId($primaryKey);
        }

        $this->_setLoaded('IncidenciasIbfk9');
        return $this;
    }

    /**
     * Gets parent Camion
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Camiones
     */
    public function getCamion($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk9';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Camion = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Camion;
    }

    /**
     * Sets dependent relations LogEmails_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\LogEmails
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setLogEmails(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_LogEmails === null) {

                $this->getLogEmails();
            }

            $oldRelations = $this->_LogEmails;

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

        $this->_LogEmails = array();

        foreach ($data as $object) {
            $this->addLogEmails($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations LogEmails_ibfk_3
     *
     * @param \Atezate\Model\Raw\LogEmails $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function addLogEmails(\Atezate\Model\Raw\LogEmails $data)
    {
        $this->_LogEmails[] = $data;
        $this->_setLoaded('LogEmailsIbfk3');
        return $this;
    }

    /**
     * Gets dependent LogEmails_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\LogEmails
     */
    public function getLogEmails($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogEmailsIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_LogEmails = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_LogEmails;
    }

    /**
     * Sets dependent relations LogLlamadas_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\LogLlamadas
     * @return \Atezate\Model\Raw\Incidencias
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
     * Sets dependent relations LogLlamadas_ibfk_3
     *
     * @param \Atezate\Model\Raw\LogLlamadas $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function addLogLlamadas(\Atezate\Model\Raw\LogLlamadas $data)
    {
        $this->_LogLlamadas[] = $data;
        $this->_setLoaded('LogLlamadasIbfk3');
        return $this;
    }

    /**
     * Gets dependent LogLlamadas_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\LogLlamadas
     */
    public function getLogLlamadas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogLlamadasIbfk3';

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
     * Sets dependent relations LogSms_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\LogSms
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function setLogSms(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_LogSms === null) {

                $this->getLogSms();
            }

            $oldRelations = $this->_LogSms;

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

        $this->_LogSms = array();

        foreach ($data as $object) {
            $this->addLogSms($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations LogSms_ibfk_1
     *
     * @param \Atezate\Model\Raw\LogSms $data
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function addLogSms(\Atezate\Model\Raw\LogSms $data)
    {
        $this->_LogSms[] = $data;
        $this->_setLoaded('LogSmsIbfk1');
        return $this;
    }

    /**
     * Gets dependent LogSms_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\LogSms
     */
    public function getLogSms($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogSmsIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_LogSms = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_LogSms;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Incidencias
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Incidencias')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Incidencias);

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
     * @return null | \Atezate\Model\Validator\Incidencias
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Incidencias')) {

                $this->setValidator(new \Atezate\Validator\Incidencias);
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
     * @see \Mapper\Sql\Incidencias::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getIncidenciaId() === null) {
            $this->_logger->log('The value for IncidenciaId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'incidenciaId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getIncidenciaId())
        );
    }
}
