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
class LogLlamadas extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_llamadasId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_incidenciaId;

    /**
     * Database var type date
     *
     * @var string
     */
    protected $_dia;

    /**
     * Database var type time
     *
     * @var string
     */
    protected $_hora;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_contactado;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_plantillasTelefonoId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_telefono;


    /**
     * Parent relation LogLlamadas_ibfk_3
     *
     * @var \Atezate\Model\Raw\Incidencias
     */
    protected $_Incidencia;

    /**
     * Parent relation LogLlamadas_ibfk_4
     *
     * @var \Atezate\Model\Raw\PlantillasTelefono
     */
    protected $_PlantillasTelefono;



    protected $_columnsList = array(
        'llamadasId'=>'llamadasId',
        'incidenciaId'=>'incidenciaId',
        'dia'=>'dia',
        'hora'=>'hora',
        'contactado'=>'contactado',
        'plantillasTelefonoId'=>'plantillasTelefonoId',
        'telefono'=>'telefono',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'incidenciaId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'LogLlamadasIbfk3'=> array(
                    'property' => 'Incidencia',
                    'table_name' => 'Incidencias',
                ),
            'LogLlamadasIbfk4'=> array(
                    'property' => 'PlantillasTelefono',
                    'table_name' => 'PlantillasTelefono',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'contactado' => '0',
            'telefono' => '',
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
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setLlamadasId($data)
    {

        if ($this->_llamadasId != $data) {
            $this->_logChange('llamadasId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_llamadasId = $data;
        } else if (!is_null($data)) {
            $this->_llamadasId = (int) $data;
        } else {
            $this->_llamadasId = $data;
        }
        return $this;
    }

    /**
     * Gets column llamadasId
     *
     * @return int
     */
    public function getLlamadasId()
    {
            return $this->_llamadasId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\LogLlamadas
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
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setDia($data)
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


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_dia != $data) {
            $this->_logChange('dia');
        }


        $this->_dia = $data;
        return $this;
    }

    /**
     * Gets column dia
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getDia($returnZendDate = false)
    {
    
        if (is_null($this->_dia)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_dia->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_dia->format('Y-m-d');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setHora($data)
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


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_hora != $data) {
            $this->_logChange('hora');
        }


        $this->_hora = $data;
        return $this;
    }

    /**
     * Gets column hora
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getHora($returnZendDate = false)
    {
    
        if (is_null($this->_hora)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_hora->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_hora->format('H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setContactado($data)
    {

        if ($this->_contactado != $data) {
            $this->_logChange('contactado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_contactado = $data;
        } else if (!is_null($data)) {
            $this->_contactado = (int) $data;
        } else {
            $this->_contactado = $data;
        }
        return $this;
    }

    /**
     * Gets column contactado
     *
     * @return int
     */
    public function getContactado()
    {
            return $this->_contactado;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setPlantillasTelefonoId($data)
    {

        if ($this->_plantillasTelefonoId != $data) {
            $this->_logChange('plantillasTelefonoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasTelefonoId = $data;
        } else if (!is_null($data)) {
            $this->_plantillasTelefonoId = (int) $data;
        } else {
            $this->_plantillasTelefonoId = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasTelefonoId
     *
     * @return int
     */
    public function getPlantillasTelefonoId()
    {
            return $this->_plantillasTelefonoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setTelefono($data)
    {

        if ($this->_telefono != $data) {
            $this->_logChange('telefono');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_telefono = $data;
        } else if (!is_null($data)) {
            $this->_telefono = (string) $data;
        } else {
            $this->_telefono = $data;
        }
        return $this;
    }

    /**
     * Gets column telefono
     *
     * @return string
     */
    public function getTelefono()
    {
            return $this->_telefono;
    }


    /**
     * Sets parent relation Incidencia
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setIncidencia(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['incidenciaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setIncidenciaId($primaryKey);
        }

        $this->_setLoaded('LogLlamadasIbfk3');
        return $this;
    }

    /**
     * Gets parent Incidencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogLlamadasIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Incidencia = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Incidencia;
    }

    /**
     * Sets parent relation PlantillasTelefono
     *
     * @param \Atezate\Model\Raw\PlantillasTelefono $data
     * @return \Atezate\Model\Raw\LogLlamadas
     */
    public function setPlantillasTelefono(\Atezate\Model\Raw\PlantillasTelefono $data)
    {
        $this->_PlantillasTelefono = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setPlantillasTelefonoId($primaryKey);
        }

        $this->_setLoaded('LogLlamadasIbfk4');
        return $this;
    }

    /**
     * Gets parent PlantillasTelefono
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function getPlantillasTelefono($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogLlamadasIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PlantillasTelefono = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PlantillasTelefono;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\LogLlamadas
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\LogLlamadas')) {

                $this->setMapper(new \Atezate\Mapper\Sql\LogLlamadas);

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
     * @return null | \Atezate\Model\Validator\LogLlamadas
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\LogLlamadas')) {

                $this->setValidator(new \Atezate\Validator\LogLlamadas);
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
     * @see \Mapper\Sql\LogLlamadas::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getLlamadasId() === null) {
            $this->_logger->log('The value for LlamadasId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'llamadasId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getLlamadasId())
        );
    }
}
