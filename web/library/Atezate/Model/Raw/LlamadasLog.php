<?php

/**
 * Application Model
 *
 * @package Atezate\Model\Raw
 * @subpackage Model
 * @author Victor Vargas
 * @copyright ZF model generator Rev. 170

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
class LlamadasLog extends ModelAbstract
{
    /**
     * Database var type mediumint(8) unsigned
     *
     * @var int
     */
    protected $_llamadasId;

    /**
     * Database var type mediumint(8) unsigned
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
     * Database var type tinyint(1) unsigned
     *
     * @var boolean
     */
    protected $_contactado;

    /**
     * Database var type mediumint(8) unsigned
     *
     * @var int
     */
    protected $_plantillasTelefonoId;

    /**
     * Database var type varchar(25)
     *
     * @var string
     */
    protected $_telefono;


    /**
     * Parent relation LlamadasLog_ibfk_4
     *
     * @var \Atezate\Model\PlantillasTelefono
     */
    protected $_PlantillasTelefono;

    /**
     * Parent relation LlamadasLog_ibfk_3
     *
     * @var \Atezate\Model\Incidencias
     */
    protected $_Incidencia;


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
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'LlamadasLogIbfk4'=> array(
                    'property' => 'PlantillasTelefono',
                    'table_name' => 'PlantillasTelefono',
                ),
            'LlamadasLogIbfk3'=> array(
                    'property' => 'Incidencia',
                    'table_name' => 'Incidencias',
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
     * Sets column llamadasId
     *
     * @param int $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setLlamadasId($data)
    {
        if ($this->_llamadasId != $data) {

            $this->_logChange('llamadasId');
        }
		if (!is_null($data)) {
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
     * Sets column incidenciaId
     *
     * @param int $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setIncidenciaId($data)
    {
        if ($this->_incidenciaId != $data) {

            $this->_logChange('incidenciaId');
        }
		if (!is_null($data)) {
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
     * Sets column dia. Stored in ISO 8601 format.
     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\LlamadasLog
     */
    public function setDia($data)
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

        if ($this->_dia != $data) {

            $this->_logChange('dia');
        }
		if (!is_null($data)) {
        	$this->_dia =  $data;
       	} else {
       	    $this->_dia = $data;
       	}
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
     * Sets column hora
     *
     * @param string $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setHora($data)
    {
        if ($this->_hora != $data) {

            $this->_logChange('hora');
        }
		if (!is_null($data)) {
        	$this->_hora = (string) $data;
       	} else {
       	    $this->_hora = $data;
       	}
        return $this;
    }

    /**
     * Gets column hora
     *
     * @return string
     */
    public function getHora()
    {
    
        return $this->_hora;
    }


    /**
     * Sets column contactado
     *
     * @param boolean $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setContactado($data)
    {
        if ($this->_contactado != $data) {

            $this->_logChange('contactado');
        }
		if (!is_null($data)) {
        	$this->_contactado = (boolean) $data;
       	} else {
       	    $this->_contactado = $data;
       	}
        return $this;
    }

    /**
     * Gets column contactado
     *
     * @return boolean
     */
    public function getContactado()
    {
    
        return (int) $this->_contactado;
    }


    /**
     * Sets column plantillasTelefonoId
     *
     * @param int $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setPlantillasTelefonoId($data)
    {
        if ($this->_plantillasTelefonoId != $data) {

            $this->_logChange('plantillasTelefonoId');
        }
		if (!is_null($data)) {
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
     * Sets column telefono
     *
     * @param string $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setTelefono($data)
    {
        if ($this->_telefono != $data) {

            $this->_logChange('telefono');
        }
		if (!is_null($data)) {
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
     * Sets parent relation PlantillasTelefono
     *
     * @param \Atezate\Model\PlantillasTelefono $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setPlantillasTelefono(\Atezate\Model\PlantillasTelefono $data)
    {
        $this->_PlantillasTelefono = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        $this->setPlantillasTelefonoId($primaryKey);

        $this->_setLoaded('LlamadasLogIbfk4');
        return $this;
    }

    /**
     * Gets parent PlantillasTelefono
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\PlantillasTelefono
     */
    public function getPlantillasTelefono($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LlamadasLogIbfk4';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PlantillasTelefono = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_PlantillasTelefono;
    }

    /**
     * Sets parent relation Incidencia
     *
     * @param \Atezate\Model\Incidencias $data
     * @return \Atezate\Model\LlamadasLog
     */
    public function setIncidencia(\Atezate\Model\Incidencias $data)
    {
        $this->_Incidencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['incidenciaId'];
        }

        $this->setIncidenciaId($primaryKey);

        $this->_setLoaded('LlamadasLogIbfk3');
        return $this;
    }

    /**
     * Gets parent Incidencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Incidencias
     */
    public function getIncidencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LlamadasLogIbfk3';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Incidencia = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Incidencia;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\LlamadasLog
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\LlamadasLog')) {

                $this->setMapper(new \Atezate\Mapper\Sql\LlamadasLog);

            } else {

                Throw new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \Atezate\Model\Validator\LlamadasLog
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\LlamadasLog')) {

                $this->setValidator(new \Atezate\Validator\LlamadasLog);
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
     * @see \Mapper\Sql\LlamadasLog::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getLlamadasId() === null) {
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'llamadasId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getLlamadasId())
        );
    }
}
