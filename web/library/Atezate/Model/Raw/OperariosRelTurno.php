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
class OperariosRelTurno extends ModelAbstract
{


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
    protected $_operarioId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_turnoId;


    /**
     * Parent relation OperariosRelTurno_ibfk_1
     *
     * @var \Atezate\Model\Operarios
     */
    protected $_Operario;

    /**
     * Parent relation OperariosRelTurno_ibfk_2
     *
     * @var \Atezate\Model\Turnos
     */
    protected $_Turno;



    protected $_columnsList = array(
        'id'=>'id',
        'operarioId'=>'operarioId',
        'turnoId'=>'turnoId',
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
            'OperariosRelTurnoIbfk1'=> array(
                    'property' => 'Operario',
                    'table_name' => 'Operarios',
                ),
            'OperariosRelTurnoIbfk2'=> array(
                    'property' => 'Turno',
                    'table_name' => 'Turnos',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
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
     * @return \Atezate\Model\OperariosRelTurno
     */
    public function setId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        if (!is_null($data)) {
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
     * @return \Atezate\Model\OperariosRelTurno
     */
    public function setOperarioId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_operarioId != $data) {
            $this->_logChange('operarioId');
        }

        if (!is_null($data)) {
            $this->_operarioId = (int) $data;
        } else {
            $this->_operarioId = $data;
        }
        return $this;
    }

    /**
     * Gets column operarioId
     *
     * @return int
     */
    public function getOperarioId()
    {
    
        return $this->_operarioId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\OperariosRelTurno
     */
    public function setTurnoId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_turnoId != $data) {
            $this->_logChange('turnoId');
        }

        if (!is_null($data)) {
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
     * Sets parent relation Operario
     *
     * @param \Atezate\Model\Operarios $data
     * @return \Atezate\Model\OperariosRelTurno
     */
    public function setOperario(\Atezate\Model\Operarios $data)
    {
        $this->_Operario = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['operarioId'];
        }

        $this->setOperarioId($primaryKey);

        $this->_setLoaded('OperariosRelTurnoIbfk1');
        return $this;
    }

    /**
     * Gets parent Operario
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Operarios
     */
    public function getOperario($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'OperariosRelTurnoIbfk1';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Operario = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Operario;
    }

    /**
     * Sets parent relation Turno
     *
     * @param \Atezate\Model\Turnos $data
     * @return \Atezate\Model\OperariosRelTurno
     */
    public function setTurno(\Atezate\Model\Turnos $data)
    {
        $this->_Turno = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['turnoId'];
        }

        $this->setTurnoId($primaryKey);

        $this->_setLoaded('OperariosRelTurnoIbfk2');
        return $this;
    }

    /**
     * Gets parent Turno
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Turnos
     */
    public function getTurno($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'OperariosRelTurnoIbfk2';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Turno = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Turno;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\OperariosRelTurno
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\OperariosRelTurno')) {

                $this->setMapper(new \Atezate\Mapper\Sql\OperariosRelTurno);

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
     * @return null | \Atezate\Model\Validator\OperariosRelTurno
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\OperariosRelTurno')) {

                $this->setValidator(new \Atezate\Validator\OperariosRelTurno);
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
     * @see \Mapper\Sql\OperariosRelTurno::delete
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
