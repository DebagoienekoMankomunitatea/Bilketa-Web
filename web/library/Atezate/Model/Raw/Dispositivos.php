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
class Dispositivos extends ModelAbstract
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
    protected $_marcaDispositivoId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_imei;

    /**
     * Database var type date
     *
     * @var string
     */
    protected $_fechaCompra;


    /**
     * Parent relation Dispositivos_ibfk_1
     *
     * @var \Atezate\Model\Raw\MarcasDispositivo
     */
    protected $_MarcaDispositivo;


    /**
     * Dependent relation TurnosRelCamiones_ibfk_4
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones[]
     */
    protected $_TurnosRelCamiones;


    protected $_columnsList = array(
        'id'=>'id',
        'marcaDispositivoId'=>'marcaDispositivoId',
        'imei'=>'imei',
        'fechaCompra'=>'fechaCompra',
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
            'DispositivosIbfk1'=> array(
                    'property' => 'MarcaDispositivo',
                    'table_name' => 'MarcasDispositivo',
                ),
        ));

        $this->setDependentList(array(
            'TurnosRelCamionesIbfk4' => array(
                    'property' => 'TurnosRelCamiones',
                    'table_name' => 'TurnosRelCamiones',
                ),
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
     * @return \Atezate\Model\Raw\Dispositivos
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
     * @return \Atezate\Model\Raw\Dispositivos
     */
    public function setMarcaDispositivoId($data)
    {

        if ($this->_marcaDispositivoId != $data) {
            $this->_logChange('marcaDispositivoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_marcaDispositivoId = $data;
        } else if (!is_null($data)) {
            $this->_marcaDispositivoId = (int) $data;
        } else {
            $this->_marcaDispositivoId = $data;
        }
        return $this;
    }

    /**
     * Gets column marcaDispositivoId
     *
     * @return int
     */
    public function getMarcaDispositivoId()
    {
            return $this->_marcaDispositivoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Dispositivos
     */
    public function setImei($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_imei != $data) {
            $this->_logChange('imei');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_imei = $data;
        } else if (!is_null($data)) {
            $this->_imei = (string) $data;
        } else {
            $this->_imei = $data;
        }
        return $this;
    }

    /**
     * Gets column imei
     *
     * @return string
     */
    public function getImei()
    {
            return $this->_imei;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Dispositivos
     */
    public function setFechaCompra($data)
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


        if ($this->_fechaCompra != $data) {
            $this->_logChange('fechaCompra');
        }


        $this->_fechaCompra = $data;
        return $this;
    }

    /**
     * Gets column fechaCompra
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getFechaCompra($returnZendDate = false)
    {
    
        if (is_null($this->_fechaCompra)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_fechaCompra->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_fechaCompra->format('Y-m-d');

    }


    /**
     * Sets parent relation MarcaDispositivo
     *
     * @param \Atezate\Model\Raw\MarcasDispositivo $data
     * @return \Atezate\Model\Raw\Dispositivos
     */
    public function setMarcaDispositivo(\Atezate\Model\Raw\MarcasDispositivo $data)
    {
        $this->_MarcaDispositivo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setMarcaDispositivoId($primaryKey);
        }

        $this->_setLoaded('DispositivosIbfk1');
        return $this;
    }

    /**
     * Gets parent MarcaDispositivo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\MarcasDispositivo
     */
    public function getMarcaDispositivo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'DispositivosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_MarcaDispositivo = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_MarcaDispositivo;
    }

    /**
     * Sets dependent relations TurnosRelCamiones_ibfk_4
     *
     * @param array $data An array of \Atezate\Model\Raw\TurnosRelCamiones
     * @return \Atezate\Model\Raw\Dispositivos
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
     * Sets dependent relations TurnosRelCamiones_ibfk_4
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\Dispositivos
     */
    public function addTurnosRelCamiones(\Atezate\Model\Raw\TurnosRelCamiones $data)
    {
        $this->_TurnosRelCamiones[] = $data;
        $this->_setLoaded('TurnosRelCamionesIbfk4');
        return $this;
    }

    /**
     * Gets dependent TurnosRelCamiones_ibfk_4
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosRelCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk4';

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
     * @return Atezate\Mapper\Sql\Dispositivos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Dispositivos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Dispositivos);

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
     * @return null | \Atezate\Model\Validator\Dispositivos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Dispositivos')) {

                $this->setValidator(new \Atezate\Validator\Dispositivos);
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
     * @see \Mapper\Sql\Dispositivos::delete
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
