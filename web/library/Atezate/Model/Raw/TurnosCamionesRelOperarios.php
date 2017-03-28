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
class TurnosCamionesRelOperarios extends ModelAbstract
{


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
    protected $_turnosRelCamionesId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_operarioId;


    /**
     * Parent relation TurnosCamionesRelOperarios_ibfk_1
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones
     */
    protected $_TurnosRelCamiones;

    /**
     * Parent relation TurnosCamionesRelOperarios_ibfk_2
     *
     * @var \Atezate\Model\Raw\Operarios
     */
    protected $_Operario;



    protected $_columnsList = array(
        'id'=>'id',
        'turnosRelCamionesId'=>'turnosRelCamionesId',
        'operarioId'=>'operarioId',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'turnosRelCamionesId'=> array(''),
            'operarioId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'TurnosCamionesRelOperariosIbfk1'=> array(
                    'property' => 'TurnosRelCamiones',
                    'table_name' => 'TurnosRelCamiones',
                ),
            'TurnosCamionesRelOperariosIbfk2'=> array(
                    'property' => 'Operario',
                    'table_name' => 'Operarios',
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
     * @return \Atezate\Model\Raw\TurnosCamionesRelOperarios
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
     * @return \Atezate\Model\Raw\TurnosCamionesRelOperarios
     */
    public function setTurnosRelCamionesId($data)
    {

        if ($this->_turnosRelCamionesId != $data) {
            $this->_logChange('turnosRelCamionesId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_turnosRelCamionesId = $data;
        } else if (!is_null($data)) {
            $this->_turnosRelCamionesId = (int) $data;
        } else {
            $this->_turnosRelCamionesId = $data;
        }
        return $this;
    }

    /**
     * Gets column turnosRelCamionesId
     *
     * @return int
     */
    public function getTurnosRelCamionesId()
    {
            return $this->_turnosRelCamionesId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TurnosCamionesRelOperarios
     */
    public function setOperarioId($data)
    {

        if ($this->_operarioId != $data) {
            $this->_logChange('operarioId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_operarioId = $data;
        } else if (!is_null($data)) {
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
     * Sets parent relation TurnosRelCamiones
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\TurnosCamionesRelOperarios
     */
    public function setTurnosRelCamiones(\Atezate\Model\Raw\TurnosRelCamiones $data)
    {
        $this->_TurnosRelCamiones = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setTurnosRelCamionesId($primaryKey);
        }

        $this->_setLoaded('TurnosCamionesRelOperariosIbfk1');
        return $this;
    }

    /**
     * Gets parent TurnosRelCamiones
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosRelCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosCamionesRelOperariosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_TurnosRelCamiones = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_TurnosRelCamiones;
    }

    /**
     * Sets parent relation Operario
     *
     * @param \Atezate\Model\Raw\Operarios $data
     * @return \Atezate\Model\Raw\TurnosCamionesRelOperarios
     */
    public function setOperario(\Atezate\Model\Raw\Operarios $data)
    {
        $this->_Operario = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['operarioId'];
        }

        if (!is_null($primaryKey)) {
            $this->setOperarioId($primaryKey);
        }

        $this->_setLoaded('TurnosCamionesRelOperariosIbfk2');
        return $this;
    }

    /**
     * Gets parent Operario
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Operarios
     */
    public function getOperario($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosCamionesRelOperariosIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Operario = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Operario;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\TurnosCamionesRelOperarios
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\TurnosCamionesRelOperarios')) {

                $this->setMapper(new \Atezate\Mapper\Sql\TurnosCamionesRelOperarios);

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
     * @return null | \Atezate\Model\Validator\TurnosCamionesRelOperarios
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\TurnosCamionesRelOperarios')) {

                $this->setValidator(new \Atezate\Validator\TurnosCamionesRelOperarios);
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
     * @see \Mapper\Sql\TurnosCamionesRelOperarios::delete
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
