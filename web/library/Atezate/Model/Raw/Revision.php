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
class Revision extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_revisionId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_compostadoresId;

    /**
     * Database var type datetime
     *
     * @var string
     */
    protected $_fechaHora;

    /**
     * Persona responsable de la revisión. Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_operadorId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_revisionTipoId;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_observaciones;


    /**
     * Parent relation Revision_ibfk_1
     *
     * @var \Atezate\Model\Raw\Compostadores
     */
    protected $_Compostadores;

    /**
     * Parent relation Revision_ibfk_2
     *
     * @var \Atezate\Model\Raw\Operarios
     */
    protected $_Operador;

    /**
     * Parent relation Revision_ibfk_3
     *
     * @var \Atezate\Model\Raw\RevisionTipos
     */
    protected $_RevisionTipo;



    protected $_columnsList = array(
        'revisionId'=>'revisionId',
        'compostadoresId'=>'compostadoresId',
        'fechaHora'=>'fechaHora',
        'operadorId'=>'operadorId',
        'revisionTipoId'=>'revisionTipoId',
        'observaciones'=>'observaciones',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'operadorId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'RevisionIbfk1'=> array(
                    'property' => 'Compostadores',
                    'table_name' => 'Compostadores',
                ),
            'RevisionIbfk2'=> array(
                    'property' => 'Operador',
                    'table_name' => 'Operarios',
                ),
            'RevisionIbfk3'=> array(
                    'property' => 'RevisionTipo',
                    'table_name' => 'RevisionTipos',
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
     * @return \Atezate\Model\Raw\Revision
     */
    public function setRevisionId($data)
    {

        if ($this->_revisionId != $data) {
            $this->_logChange('revisionId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_revisionId = $data;
        } else if (!is_null($data)) {
            $this->_revisionId = (int) $data;
        } else {
            $this->_revisionId = $data;
        }
        return $this;
    }

    /**
     * Gets column revisionId
     *
     * @return int
     */
    public function getRevisionId()
    {
            return $this->_revisionId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Revision
     */
    public function setCompostadoresId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_compostadoresId != $data) {
            $this->_logChange('compostadoresId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_compostadoresId = $data;
        } else if (!is_null($data)) {
            $this->_compostadoresId = (int) $data;
        } else {
            $this->_compostadoresId = $data;
        }
        return $this;
    }

    /**
     * Gets column compostadoresId
     *
     * @return int
     */
    public function getCompostadoresId()
    {
            return $this->_compostadoresId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Revision
     */
    public function setFechaHora($data)
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

        if ($this->_fechaHora != $data) {
            $this->_logChange('fechaHora');
        }


        $this->_fechaHora = $data;
        return $this;
    }

    /**
     * Gets column fechaHora
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaHora($returnZendDate = false)
    {
    
        if (is_null($this->_fechaHora)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaHora->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaHora->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Revision
     */
    public function setOperadorId($data)
    {

        if ($this->_operadorId != $data) {
            $this->_logChange('operadorId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_operadorId = $data;
        } else if (!is_null($data)) {
            $this->_operadorId = (int) $data;
        } else {
            $this->_operadorId = $data;
        }
        return $this;
    }

    /**
     * Gets column operadorId
     *
     * @return int
     */
    public function getOperadorId()
    {
            return $this->_operadorId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Revision
     */
    public function setRevisionTipoId($data)
    {

        if ($this->_revisionTipoId != $data) {
            $this->_logChange('revisionTipoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_revisionTipoId = $data;
        } else if (!is_null($data)) {
            $this->_revisionTipoId = (int) $data;
        } else {
            $this->_revisionTipoId = $data;
        }
        return $this;
    }

    /**
     * Gets column revisionTipoId
     *
     * @return int
     */
    public function getRevisionTipoId()
    {
            return $this->_revisionTipoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Revision
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
     * Sets parent relation Compostadores
     *
     * @param \Atezate\Model\Raw\Compostadores $data
     * @return \Atezate\Model\Raw\Revision
     */
    public function setCompostadores(\Atezate\Model\Raw\Compostadores $data)
    {
        $this->_Compostadores = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['compostadoresId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCompostadoresId($primaryKey);
        }

        $this->_setLoaded('RevisionIbfk1');
        return $this;
    }

    /**
     * Gets parent Compostadores
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function getCompostadores($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RevisionIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Compostadores = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Compostadores;
    }

    /**
     * Sets parent relation Operador
     *
     * @param \Atezate\Model\Raw\Operarios $data
     * @return \Atezate\Model\Raw\Revision
     */
    public function setOperador(\Atezate\Model\Raw\Operarios $data)
    {
        $this->_Operador = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['operarioId'];
        }

        if (!is_null($primaryKey)) {
            $this->setOperadorId($primaryKey);
        }

        $this->_setLoaded('RevisionIbfk2');
        return $this;
    }

    /**
     * Gets parent Operador
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Operarios
     */
    public function getOperador($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RevisionIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Operador = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Operador;
    }

    /**
     * Sets parent relation RevisionTipo
     *
     * @param \Atezate\Model\Raw\RevisionTipos $data
     * @return \Atezate\Model\Raw\Revision
     */
    public function setRevisionTipo(\Atezate\Model\Raw\RevisionTipos $data)
    {
        $this->_RevisionTipo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setRevisionTipoId($primaryKey);
        }

        $this->_setLoaded('RevisionIbfk3');
        return $this;
    }

    /**
     * Gets parent RevisionTipo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\RevisionTipos
     */
    public function getRevisionTipo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RevisionIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_RevisionTipo = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_RevisionTipo;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Revision
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Revision')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Revision);

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
     * @return null | \Atezate\Model\Validator\Revision
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Revision')) {

                $this->setValidator(new \Atezate\Validator\Revision);
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
     * @see \Mapper\Sql\Revision::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getRevisionId() === null) {
            $this->_logger->log('The value for RevisionId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'revisionId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getRevisionId())
        );
    }
}
