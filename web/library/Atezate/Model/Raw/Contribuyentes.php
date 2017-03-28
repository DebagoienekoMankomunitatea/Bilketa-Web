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
class Contribuyentes extends ModelAbstract
{

    protected $_ivrAcceptedValues = array(
        'es',
        'eu',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_contribuyenteId;

    /**
     * 12 digitos: 3 poblacion, 2 tarifa, 7 usoa
     * Database var type varchar
     *
     * @var string
     */
    protected $_contribuyenteIden;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_coeficienteEntornoContribuyente;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_coeficienteEntornoZona;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_coeficienteEntornoPueblo;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_idContribuyenteUsoa;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nombre;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_municipioId;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nif;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_cuenta;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_intuitivo;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_codigoCalle;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_direccion;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_portal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_bis;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_escalera;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_piso;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_mano;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_otrosDomicilio;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_tarifa;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_cantidad;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_direccionFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_portalFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_bisFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_escaleraFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_pisoFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_manoFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_localidadFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_pkFiscal;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_provinciaFiscal;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_excluido;

    /**
     * [enum:es|eu]
     * Database var type varchar
     *
     * @var string
     */
    protected $_ivr;


    /**
     * Parent relation Contribuyentes_ibfk_1
     *
     * @var \Atezate\Model\Raw\Municipios
     */
    protected $_Municipio;


    /**
     * Dependent relation CodigosAperturaPrivados_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CodigosAperturaPrivados[]
     */
    protected $_CodigosAperturaPrivados;

    /**
     * Dependent relation CompostadoresRelContribuyentes_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CompostadoresRelContribuyentes[]
     */
    protected $_CompostadoresRelContribuyentes;

    /**
     * Dependent relation Cubos_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Cubos[]
     */
    protected $_Cubos;

    /**
     * Dependent relation emails_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Emails[]
     */
    protected $_Emails;

    /**
     * Dependent relation Incidencias_ibfk_11
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation telefonos_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Telefonos[]
     */
    protected $_Telefonos;


    protected $_columnsList = array(
        'contribuyenteId'=>'contribuyenteId',
        'contribuyenteIden'=>'contribuyenteIden',
        'coeficienteEntornoContribuyente'=>'coeficienteEntornoContribuyente',
        'coeficienteEntornoZona'=>'coeficienteEntornoZona',
        'coeficienteEntornoPueblo'=>'coeficienteEntornoPueblo',
        'idContribuyenteUsoa'=>'idContribuyenteUsoa',
        'nombre'=>'nombre',
        'municipioId'=>'municipioId',
        'createdOn'=>'createdOn',
        'nif'=>'nif',
        'cuenta'=>'cuenta',
        'intuitivo'=>'intuitivo',
        'codigoCalle'=>'codigoCalle',
        'direccion'=>'direccion',
        'portal'=>'portal',
        'bis'=>'bis',
        'escalera'=>'escalera',
        'piso'=>'piso',
        'mano'=>'mano',
        'otrosDomicilio'=>'otrosDomicilio',
        'tarifa'=>'tarifa',
        'cantidad'=>'cantidad',
        'direccionFiscal'=>'direccionFiscal',
        'portalFiscal'=>'portalFiscal',
        'bisFiscal'=>'bisFiscal',
        'escaleraFiscal'=>'escaleraFiscal',
        'pisoFiscal'=>'pisoFiscal',
        'manoFiscal'=>'manoFiscal',
        'localidadFiscal'=>'localidadFiscal',
        'pkFiscal'=>'pkFiscal',
        'provinciaFiscal'=>'provinciaFiscal',
        'excluido'=>'excluido',
        'ivr'=>'ivr',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'contribuyenteIden'=> array(''),
            'ivr'=> array('enum:es|eu'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'ContribuyentesIbfk1'=> array(
                    'property' => 'Municipio',
                    'table_name' => 'Municipios',
                ),
        ));

        $this->setDependentList(array(
            'CodigosAperturaPrivadosIbfk2' => array(
                    'property' => 'CodigosAperturaPrivados',
                    'table_name' => 'CodigosAperturaPrivados',
                ),
            'CompostadoresRelContribuyentesIbfk1' => array(
                    'property' => 'CompostadoresRelContribuyentes',
                    'table_name' => 'CompostadoresRelContribuyentes',
                ),
            'CubosIbfk1' => array(
                    'property' => 'Cubos',
                    'table_name' => 'Cubos',
                ),
            'EmailsIbfk1' => array(
                    'property' => 'Emails',
                    'table_name' => 'Emails',
                ),
            'IncidenciasIbfk11' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'TelefonosIbfk1' => array(
                    'property' => 'Telefonos',
                    'table_name' => 'Telefonos',
                ),
        ));

        $this->setOnDeleteCascadeRelationships(array(
            'CompostadoresRelContribuyentes_ibfk_1'
        ));

        $this->setOnDeleteSetNullRelationships(array(
            'CodigosAperturaPrivados_ibfk_2'
        ));


        $this->_defaultValues = array(
            'nombre' => '',
            'createdOn' => 'CURRENT_TIMESTAMP',
            'nif' => '',
            'cuenta' => '',
            'intuitivo' => '',
            'direccion' => '',
            'bis' => '',
            'escalera' => '',
            'piso' => '',
            'mano' => '',
            'otrosDomicilio' => '',
            'tarifa' => '',
            'bisFiscal' => '',
            'escaleraFiscal' => '',
            'pisoFiscal' => '',
            'manoFiscal' => '',
            'localidadFiscal' => '',
            'pkFiscal' => '',
            'provinciaFiscal' => '',
            'excluido' => '0',
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
     * @return \Atezate\Model\Raw\Contribuyentes
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
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setContribuyenteIden($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_contribuyenteIden != $data) {
            $this->_logChange('contribuyenteIden');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_contribuyenteIden = $data;
        } else if (!is_null($data)) {
            $this->_contribuyenteIden = (string) $data;
        } else {
            $this->_contribuyenteIden = $data;
        }
        return $this;
    }

    /**
     * Gets column contribuyenteIden
     *
     * @return string
     */
    public function getContribuyenteIden()
    {
            return $this->_contribuyenteIden;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCoeficienteEntornoContribuyente($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_coeficienteEntornoContribuyente != $data) {
            $this->_logChange('coeficienteEntornoContribuyente');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_coeficienteEntornoContribuyente = $data;
        } else if (!is_null($data)) {
            $this->_coeficienteEntornoContribuyente = (string) $data;
        } else {
            $this->_coeficienteEntornoContribuyente = $data;
        }
        return $this;
    }

    /**
     * Gets column coeficienteEntornoContribuyente
     *
     * @return string
     */
    public function getCoeficienteEntornoContribuyente()
    {
            return $this->_coeficienteEntornoContribuyente;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCoeficienteEntornoZona($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_coeficienteEntornoZona != $data) {
            $this->_logChange('coeficienteEntornoZona');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_coeficienteEntornoZona = $data;
        } else if (!is_null($data)) {
            $this->_coeficienteEntornoZona = (string) $data;
        } else {
            $this->_coeficienteEntornoZona = $data;
        }
        return $this;
    }

    /**
     * Gets column coeficienteEntornoZona
     *
     * @return string
     */
    public function getCoeficienteEntornoZona()
    {
            return $this->_coeficienteEntornoZona;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCoeficienteEntornoPueblo($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_coeficienteEntornoPueblo != $data) {
            $this->_logChange('coeficienteEntornoPueblo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_coeficienteEntornoPueblo = $data;
        } else if (!is_null($data)) {
            $this->_coeficienteEntornoPueblo = (string) $data;
        } else {
            $this->_coeficienteEntornoPueblo = $data;
        }
        return $this;
    }

    /**
     * Gets column coeficienteEntornoPueblo
     *
     * @return string
     */
    public function getCoeficienteEntornoPueblo()
    {
            return $this->_coeficienteEntornoPueblo;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setIdContribuyenteUsoa($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_idContribuyenteUsoa != $data) {
            $this->_logChange('idContribuyenteUsoa');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_idContribuyenteUsoa = $data;
        } else if (!is_null($data)) {
            $this->_idContribuyenteUsoa = (string) $data;
        } else {
            $this->_idContribuyenteUsoa = $data;
        }
        return $this;
    }

    /**
     * Gets column idContribuyenteUsoa
     *
     * @return string
     */
    public function getIdContribuyenteUsoa()
    {
            return $this->_idContribuyenteUsoa;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setNombre($data)
    {

        if ($this->_nombre != $data) {
            $this->_logChange('nombre');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nombre = $data;
        } else if (!is_null($data)) {
            $this->_nombre = (string) $data;
        } else {
            $this->_nombre = $data;
        }
        return $this;
    }

    /**
     * Gets column nombre
     *
     * @return string
     */
    public function getNombre()
    {
            return $this->_nombre;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Contribuyentes
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
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Contribuyentes
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
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setNif($data)
    {

        if ($this->_nif != $data) {
            $this->_logChange('nif');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nif = $data;
        } else if (!is_null($data)) {
            $this->_nif = (string) $data;
        } else {
            $this->_nif = $data;
        }
        return $this;
    }

    /**
     * Gets column nif
     *
     * @return string
     */
    public function getNif()
    {
            return $this->_nif;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCuenta($data)
    {

        if ($this->_cuenta != $data) {
            $this->_logChange('cuenta');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_cuenta = $data;
        } else if (!is_null($data)) {
            $this->_cuenta = (string) $data;
        } else {
            $this->_cuenta = $data;
        }
        return $this;
    }

    /**
     * Gets column cuenta
     *
     * @return string
     */
    public function getCuenta()
    {
            return $this->_cuenta;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setIntuitivo($data)
    {

        if ($this->_intuitivo != $data) {
            $this->_logChange('intuitivo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_intuitivo = $data;
        } else if (!is_null($data)) {
            $this->_intuitivo = (string) $data;
        } else {
            $this->_intuitivo = $data;
        }
        return $this;
    }

    /**
     * Gets column intuitivo
     *
     * @return string
     */
    public function getIntuitivo()
    {
            return $this->_intuitivo;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCodigoCalle($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_codigoCalle != $data) {
            $this->_logChange('codigoCalle');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_codigoCalle = $data;
        } else if (!is_null($data)) {
            $this->_codigoCalle = (int) $data;
        } else {
            $this->_codigoCalle = $data;
        }
        return $this;
    }

    /**
     * Gets column codigoCalle
     *
     * @return int
     */
    public function getCodigoCalle()
    {
            return $this->_codigoCalle;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setDireccion($data)
    {

        if ($this->_direccion != $data) {
            $this->_logChange('direccion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_direccion = $data;
        } else if (!is_null($data)) {
            $this->_direccion = (string) $data;
        } else {
            $this->_direccion = $data;
        }
        return $this;
    }

    /**
     * Gets column direccion
     *
     * @return string
     */
    public function getDireccion()
    {
            return $this->_direccion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setPortal($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_portal != $data) {
            $this->_logChange('portal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_portal = $data;
        } else if (!is_null($data)) {
            $this->_portal = (string) $data;
        } else {
            $this->_portal = $data;
        }
        return $this;
    }

    /**
     * Gets column portal
     *
     * @return string
     */
    public function getPortal()
    {
            return $this->_portal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setBis($data)
    {

        if ($this->_bis != $data) {
            $this->_logChange('bis');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_bis = $data;
        } else if (!is_null($data)) {
            $this->_bis = (string) $data;
        } else {
            $this->_bis = $data;
        }
        return $this;
    }

    /**
     * Gets column bis
     *
     * @return string
     */
    public function getBis()
    {
            return $this->_bis;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setEscalera($data)
    {

        if ($this->_escalera != $data) {
            $this->_logChange('escalera');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_escalera = $data;
        } else if (!is_null($data)) {
            $this->_escalera = (string) $data;
        } else {
            $this->_escalera = $data;
        }
        return $this;
    }

    /**
     * Gets column escalera
     *
     * @return string
     */
    public function getEscalera()
    {
            return $this->_escalera;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setPiso($data)
    {

        if ($this->_piso != $data) {
            $this->_logChange('piso');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_piso = $data;
        } else if (!is_null($data)) {
            $this->_piso = (string) $data;
        } else {
            $this->_piso = $data;
        }
        return $this;
    }

    /**
     * Gets column piso
     *
     * @return string
     */
    public function getPiso()
    {
            return $this->_piso;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setMano($data)
    {

        if ($this->_mano != $data) {
            $this->_logChange('mano');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_mano = $data;
        } else if (!is_null($data)) {
            $this->_mano = (string) $data;
        } else {
            $this->_mano = $data;
        }
        return $this;
    }

    /**
     * Gets column mano
     *
     * @return string
     */
    public function getMano()
    {
            return $this->_mano;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setOtrosDomicilio($data)
    {

        if ($this->_otrosDomicilio != $data) {
            $this->_logChange('otrosDomicilio');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_otrosDomicilio = $data;
        } else if (!is_null($data)) {
            $this->_otrosDomicilio = (string) $data;
        } else {
            $this->_otrosDomicilio = $data;
        }
        return $this;
    }

    /**
     * Gets column otrosDomicilio
     *
     * @return string
     */
    public function getOtrosDomicilio()
    {
            return $this->_otrosDomicilio;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setTarifa($data)
    {

        if ($this->_tarifa != $data) {
            $this->_logChange('tarifa');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tarifa = $data;
        } else if (!is_null($data)) {
            $this->_tarifa = (string) $data;
        } else {
            $this->_tarifa = $data;
        }
        return $this;
    }

    /**
     * Gets column tarifa
     *
     * @return string
     */
    public function getTarifa()
    {
            return $this->_tarifa;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCantidad($data)
    {

        if ($this->_cantidad != $data) {
            $this->_logChange('cantidad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_cantidad = $data;
        } else if (!is_null($data)) {
            $this->_cantidad = (int) $data;
        } else {
            $this->_cantidad = $data;
        }
        return $this;
    }

    /**
     * Gets column cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
            return $this->_cantidad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setDireccionFiscal($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_direccionFiscal != $data) {
            $this->_logChange('direccionFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_direccionFiscal = $data;
        } else if (!is_null($data)) {
            $this->_direccionFiscal = (string) $data;
        } else {
            $this->_direccionFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column direccionFiscal
     *
     * @return text
     */
    public function getDireccionFiscal()
    {
            return $this->_direccionFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setPortalFiscal($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_portalFiscal != $data) {
            $this->_logChange('portalFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_portalFiscal = $data;
        } else if (!is_null($data)) {
            $this->_portalFiscal = (string) $data;
        } else {
            $this->_portalFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column portalFiscal
     *
     * @return string
     */
    public function getPortalFiscal()
    {
            return $this->_portalFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setBisFiscal($data)
    {

        if ($this->_bisFiscal != $data) {
            $this->_logChange('bisFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_bisFiscal = $data;
        } else if (!is_null($data)) {
            $this->_bisFiscal = (string) $data;
        } else {
            $this->_bisFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column bisFiscal
     *
     * @return string
     */
    public function getBisFiscal()
    {
            return $this->_bisFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setEscaleraFiscal($data)
    {

        if ($this->_escaleraFiscal != $data) {
            $this->_logChange('escaleraFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_escaleraFiscal = $data;
        } else if (!is_null($data)) {
            $this->_escaleraFiscal = (string) $data;
        } else {
            $this->_escaleraFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column escaleraFiscal
     *
     * @return string
     */
    public function getEscaleraFiscal()
    {
            return $this->_escaleraFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setPisoFiscal($data)
    {

        if ($this->_pisoFiscal != $data) {
            $this->_logChange('pisoFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_pisoFiscal = $data;
        } else if (!is_null($data)) {
            $this->_pisoFiscal = (string) $data;
        } else {
            $this->_pisoFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column pisoFiscal
     *
     * @return string
     */
    public function getPisoFiscal()
    {
            return $this->_pisoFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setManoFiscal($data)
    {

        if ($this->_manoFiscal != $data) {
            $this->_logChange('manoFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_manoFiscal = $data;
        } else if (!is_null($data)) {
            $this->_manoFiscal = (string) $data;
        } else {
            $this->_manoFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column manoFiscal
     *
     * @return string
     */
    public function getManoFiscal()
    {
            return $this->_manoFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setLocalidadFiscal($data)
    {

        if ($this->_localidadFiscal != $data) {
            $this->_logChange('localidadFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_localidadFiscal = $data;
        } else if (!is_null($data)) {
            $this->_localidadFiscal = (string) $data;
        } else {
            $this->_localidadFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column localidadFiscal
     *
     * @return string
     */
    public function getLocalidadFiscal()
    {
            return $this->_localidadFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setPkFiscal($data)
    {

        if ($this->_pkFiscal != $data) {
            $this->_logChange('pkFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_pkFiscal = $data;
        } else if (!is_null($data)) {
            $this->_pkFiscal = (string) $data;
        } else {
            $this->_pkFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column pkFiscal
     *
     * @return string
     */
    public function getPkFiscal()
    {
            return $this->_pkFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setProvinciaFiscal($data)
    {

        if ($this->_provinciaFiscal != $data) {
            $this->_logChange('provinciaFiscal');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_provinciaFiscal = $data;
        } else if (!is_null($data)) {
            $this->_provinciaFiscal = (string) $data;
        } else {
            $this->_provinciaFiscal = $data;
        }
        return $this;
    }

    /**
     * Gets column provinciaFiscal
     *
     * @return string
     */
    public function getProvinciaFiscal()
    {
            return $this->_provinciaFiscal;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setExcluido($data)
    {

        if ($this->_excluido != $data) {
            $this->_logChange('excluido');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_excluido = $data;
        } else if (!is_null($data)) {
            $this->_excluido = (int) $data;
        } else {
            $this->_excluido = $data;
        }
        return $this;
    }

    /**
     * Gets column excluido
     *
     * @return int
     */
    public function getExcluido()
    {
            return $this->_excluido;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setIvr($data)
    {

        if ($this->_ivr != $data) {
            $this->_logChange('ivr');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_ivr = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_ivrAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for ivr'));
            }
            $this->_ivr = (string) $data;
        } else {
            $this->_ivr = $data;
        }
        return $this;
    }

    /**
     * Gets column ivr
     *
     * @return string
     */
    public function getIvr()
    {
            return $this->_ivr;
    }


    /**
     * Sets parent relation Municipio
     *
     * @param \Atezate\Model\Raw\Municipios $data
     * @return \Atezate\Model\Raw\Contribuyentes
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

        $this->_setLoaded('ContribuyentesIbfk1');
        return $this;
    }

    /**
     * Gets parent Municipio
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Municipios
     */
    public function getMunicipio($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'ContribuyentesIbfk1';

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
     * Sets dependent relations CodigosAperturaPrivados_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\CodigosAperturaPrivados
     * @return \Atezate\Model\Raw\Contribuyentes
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
     * Sets dependent relations CodigosAperturaPrivados_ibfk_2
     *
     * @param \Atezate\Model\Raw\CodigosAperturaPrivados $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function addCodigosAperturaPrivados(\Atezate\Model\Raw\CodigosAperturaPrivados $data)
    {
        $this->_CodigosAperturaPrivados[] = $data;
        $this->_setLoaded('CodigosAperturaPrivadosIbfk2');
        return $this;
    }

    /**
     * Gets dependent CodigosAperturaPrivados_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CodigosAperturaPrivados
     */
    public function getCodigosAperturaPrivados($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigosAperturaPrivadosIbfk2';

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
     * Sets dependent relations CompostadoresRelContribuyentes_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\CompostadoresRelContribuyentes
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setCompostadoresRelContribuyentes(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CompostadoresRelContribuyentes === null) {

                $this->getCompostadoresRelContribuyentes();
            }

            $oldRelations = $this->_CompostadoresRelContribuyentes;

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

        $this->_CompostadoresRelContribuyentes = array();

        foreach ($data as $object) {
            $this->addCompostadoresRelContribuyentes($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CompostadoresRelContribuyentes_ibfk_1
     *
     * @param \Atezate\Model\Raw\CompostadoresRelContribuyentes $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function addCompostadoresRelContribuyentes(\Atezate\Model\Raw\CompostadoresRelContribuyentes $data)
    {
        $this->_CompostadoresRelContribuyentes[] = $data;
        $this->_setLoaded('CompostadoresRelContribuyentesIbfk1');
        return $this;
    }

    /**
     * Gets dependent CompostadoresRelContribuyentes_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function getCompostadoresRelContribuyentes($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CompostadoresRelContribuyentesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CompostadoresRelContribuyentes = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CompostadoresRelContribuyentes;
    }

    /**
     * Sets dependent relations Cubos_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Cubos
     * @return \Atezate\Model\Raw\Contribuyentes
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
     * Sets dependent relations Cubos_ibfk_1
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function addCubos(\Atezate\Model\Raw\Cubos $data)
    {
        $this->_Cubos[] = $data;
        $this->_setLoaded('CubosIbfk1');
        return $this;
    }

    /**
     * Gets dependent Cubos_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Cubos
     */
    public function getCubos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk1';

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
     * Sets dependent relations emails_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Emails
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setEmails(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Emails === null) {

                $this->getEmails();
            }

            $oldRelations = $this->_Emails;

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

        $this->_Emails = array();

        foreach ($data as $object) {
            $this->addEmails($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations emails_ibfk_1
     *
     * @param \Atezate\Model\Raw\Emails $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function addEmails(\Atezate\Model\Raw\Emails $data)
    {
        $this->_Emails[] = $data;
        $this->_setLoaded('EmailsIbfk1');
        return $this;
    }

    /**
     * Gets dependent emails_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Emails
     */
    public function getEmails($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'EmailsIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Emails = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Emails;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_11
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\Contribuyentes
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
     * Sets dependent relations Incidencias_ibfk_11
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk11');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_11
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk11';

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
     * Sets dependent relations telefonos_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Telefonos
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function setTelefonos(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Telefonos === null) {

                $this->getTelefonos();
            }

            $oldRelations = $this->_Telefonos;

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

        $this->_Telefonos = array();

        foreach ($data as $object) {
            $this->addTelefonos($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations telefonos_ibfk_1
     *
     * @param \Atezate\Model\Raw\Telefonos $data
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function addTelefonos(\Atezate\Model\Raw\Telefonos $data)
    {
        $this->_Telefonos[] = $data;
        $this->_setLoaded('TelefonosIbfk1');
        return $this;
    }

    /**
     * Gets dependent telefonos_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Telefonos
     */
    public function getTelefonos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TelefonosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Telefonos = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Telefonos;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Contribuyentes
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Contribuyentes')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Contribuyentes);

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
     * @return null | \Atezate\Model\Validator\Contribuyentes
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Contribuyentes')) {

                $this->setValidator(new \Atezate\Validator\Contribuyentes);
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
     * @see \Mapper\Sql\Contribuyentes::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getContribuyenteId() === null) {
            $this->_logger->log('The value for ContribuyenteId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'contribuyenteId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getContribuyenteId())
        );
    }
}
