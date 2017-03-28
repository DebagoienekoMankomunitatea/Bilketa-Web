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
class RutasRelPuntosRecogida extends ModelAbstract
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
    protected $_rutaId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaId;

    /**
     * Database var type smallint
     *
     * @var int
     */
    protected $_orden;


    /**
     * Parent relation RutasRelPuntosRecogida_ibfk_1
     *
     * @var \Atezate\Model\Raw\Rutas
     */
    protected $_Ruta;

    /**
     * Parent relation RutasRelPuntosRecogida_ibfk_2
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntosRecogida;



    protected $_columnsList = array(
        'id'=>'id',
        'rutaId'=>'rutaId',
        'puntosRecogidaId'=>'puntosRecogidaId',
        'orden'=>'orden',
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
            'RutasRelPuntosRecogidaIbfk1'=> array(
                    'property' => 'Ruta',
                    'table_name' => 'Rutas',
                ),
            'RutasRelPuntosRecogidaIbfk2'=> array(
                    'property' => 'PuntosRecogida',
                    'table_name' => 'PuntosRecogida',
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
     * @return \Atezate\Model\Raw\RutasRelPuntosRecogida
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
     * @return \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function setRutaId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_rutaId != $data) {
            $this->_logChange('rutaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_rutaId = $data;
        } else if (!is_null($data)) {
            $this->_rutaId = (int) $data;
        } else {
            $this->_rutaId = $data;
        }
        return $this;
    }

    /**
     * Gets column rutaId
     *
     * @return int
     */
    public function getRutaId()
    {
            return $this->_rutaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function setPuntosRecogidaId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @return \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function setOrden($data)
    {

        if ($this->_orden != $data) {
            $this->_logChange('orden');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_orden = $data;
        } else if (!is_null($data)) {
            $this->_orden = (int) $data;
        } else {
            $this->_orden = $data;
        }
        return $this;
    }

    /**
     * Gets column orden
     *
     * @return int
     */
    public function getOrden()
    {
            return $this->_orden;
    }


    /**
     * Sets parent relation Ruta
     *
     * @param \Atezate\Model\Raw\Rutas $data
     * @return \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function setRuta(\Atezate\Model\Raw\Rutas $data)
    {
        $this->_Ruta = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['rutaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setRutaId($primaryKey);
        }

        $this->_setLoaded('RutasRelPuntosRecogidaIbfk1');
        return $this;
    }

    /**
     * Gets parent Ruta
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Rutas
     */
    public function getRuta($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasRelPuntosRecogidaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Ruta = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Ruta;
    }

    /**
     * Sets parent relation PuntosRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function setPuntosRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntosRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntosRecogidaId($primaryKey);
        }

        $this->_setLoaded('RutasRelPuntosRecogidaIbfk2');
        return $this;
    }

    /**
     * Gets parent PuntosRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasRelPuntosRecogidaIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogida = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntosRecogida;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\RutasRelPuntosRecogida
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\RutasRelPuntosRecogida')) {

                $this->setMapper(new \Atezate\Mapper\Sql\RutasRelPuntosRecogida);

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
     * @return null | \Atezate\Model\Validator\RutasRelPuntosRecogida
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\RutasRelPuntosRecogida')) {

                $this->setValidator(new \Atezate\Validator\RutasRelPuntosRecogida);
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
     * @see \Mapper\Sql\RutasRelPuntosRecogida::delete
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
