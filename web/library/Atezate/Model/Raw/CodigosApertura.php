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
class CodigosApertura extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_fechaLlamada;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_contribuyenteId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_codigoApertura;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_centroEmergenciaId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_municipioId;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_activado;


    /**
     * Parent relation CodigosApertura_ibfk_2
     *
     * @var \Atezate\Model\Raw\CentrosEmergencia
     */
    protected $_CentroEmergencia;

    /**
     * Parent relation CodigosApertura_ibfk_3
     *
     * @var \Atezate\Model\Raw\Municipios
     */
    protected $_Municipio;



    protected $_columnsList = array(
        'id'=>'id',
        'fechaLlamada'=>'fechaLlamada',
        'contribuyenteId'=>'contribuyenteId',
        'codigoApertura'=>'codigoApertura',
        'centroEmergenciaId'=>'centroEmergenciaId',
        'municipioId'=>'municipioId',
        'activado'=>'activado',
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
            'CodigosAperturaIbfk2'=> array(
                    'property' => 'CentroEmergencia',
                    'table_name' => 'CentrosEmergencia',
                ),
            'CodigosAperturaIbfk3'=> array(
                    'property' => 'Municipio',
                    'table_name' => 'Municipios',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'fechaLlamada' => 'CURRENT_TIMESTAMP',
            'activado' => '0',
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
     * @return \Atezate\Model\Raw\CodigosApertura
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
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\CodigosApertura
     */
    public function setFechaLlamada($data)
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


        if ($this->_fechaLlamada != $data) {
            $this->_logChange('fechaLlamada');
        }


        $this->_fechaLlamada = $data;
        return $this;
    }

    /**
     * Gets column fechaLlamada
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaLlamada($returnZendDate = false)
    {
    
        if (is_null($this->_fechaLlamada)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaLlamada->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaLlamada->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CodigosApertura
     */
    public function setContribuyenteId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @return \Atezate\Model\Raw\CodigosApertura
     */
    public function setCodigoApertura($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_codigoApertura != $data) {
            $this->_logChange('codigoApertura');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_codigoApertura = $data;
        } else if (!is_null($data)) {
            $this->_codigoApertura = (string) $data;
        } else {
            $this->_codigoApertura = $data;
        }
        return $this;
    }

    /**
     * Gets column codigoApertura
     *
     * @return string
     */
    public function getCodigoApertura()
    {
            return $this->_codigoApertura;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CodigosApertura
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
     * @return \Atezate\Model\Raw\CodigosApertura
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
     * @param int $data
     * @return \Atezate\Model\Raw\CodigosApertura
     */
    public function setActivado($data)
    {

        if ($this->_activado != $data) {
            $this->_logChange('activado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_activado = $data;
        } else if (!is_null($data)) {
            $this->_activado = (int) $data;
        } else {
            $this->_activado = $data;
        }
        return $this;
    }

    /**
     * Gets column activado
     *
     * @return int
     */
    public function getActivado()
    {
            return $this->_activado;
    }


    /**
     * Sets parent relation CentroEmergencia
     *
     * @param \Atezate\Model\Raw\CentrosEmergencia $data
     * @return \Atezate\Model\Raw\CodigosApertura
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

        $this->_setLoaded('CodigosAperturaIbfk2');
        return $this;
    }

    /**
     * Gets parent CentroEmergencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function getCentroEmergencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigosAperturaIbfk2';

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
     * Sets parent relation Municipio
     *
     * @param \Atezate\Model\Raw\Municipios $data
     * @return \Atezate\Model\Raw\CodigosApertura
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

        $this->_setLoaded('CodigosAperturaIbfk3');
        return $this;
    }

    /**
     * Gets parent Municipio
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Municipios
     */
    public function getMunicipio($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigosAperturaIbfk3';

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
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CodigosApertura
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CodigosApertura')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CodigosApertura);

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
     * @return null | \Atezate\Model\Validator\CodigosApertura
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CodigosApertura')) {

                $this->setValidator(new \Atezate\Validator\CodigosApertura);
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
     * @see \Mapper\Sql\CodigosApertura::delete
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
