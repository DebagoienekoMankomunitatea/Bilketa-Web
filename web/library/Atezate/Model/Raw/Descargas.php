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
class Descargas extends ModelAbstract
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
    protected $_camionId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntoDescargaId;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_kilos;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;


    /**
     * Parent relation Descargas_ibfk_1
     *
     * @var \Atezate\Model\Raw\Camiones
     */
    protected $_Camion;

    /**
     * Parent relation Descargas_ibfk_2
     *
     * @var \Atezate\Model\Raw\PuntosDescarga
     */
    protected $_PuntoDescarga;



    protected $_columnsList = array(
        'id'=>'id',
        'camionId'=>'camionId',
        'puntoDescargaId'=>'puntoDescargaId',
        'kilos'=>'kilos',
        'createdOn'=>'createdOn',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'puntoDescargaId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'DescargasIbfk1'=> array(
                    'property' => 'Camion',
                    'table_name' => 'Camiones',
                ),
            'DescargasIbfk2'=> array(
                    'property' => 'PuntoDescarga',
                    'table_name' => 'PuntosDescarga',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
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
     * @return \Atezate\Model\Raw\Descargas
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
     * @return \Atezate\Model\Raw\Descargas
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
     * @return \Atezate\Model\Raw\Descargas
     */
    public function setPuntoDescargaId($data)
    {

        if ($this->_puntoDescargaId != $data) {
            $this->_logChange('puntoDescargaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntoDescargaId = $data;
        } else if (!is_null($data)) {
            $this->_puntoDescargaId = (int) $data;
        } else {
            $this->_puntoDescargaId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntoDescargaId
     *
     * @return int
     */
    public function getPuntoDescargaId()
    {
            return $this->_puntoDescargaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Descargas
     */
    public function setKilos($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_kilos != $data) {
            $this->_logChange('kilos');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_kilos = $data;
        } else if (!is_null($data)) {
            $this->_kilos = (int) $data;
        } else {
            $this->_kilos = $data;
        }
        return $this;
    }

    /**
     * Gets column kilos
     *
     * @return int
     */
    public function getKilos()
    {
            return $this->_kilos;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Descargas
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
     * Sets parent relation Camion
     *
     * @param \Atezate\Model\Raw\Camiones $data
     * @return \Atezate\Model\Raw\Descargas
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

        $this->_setLoaded('DescargasIbfk1');
        return $this;
    }

    /**
     * Gets parent Camion
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Camiones
     */
    public function getCamion($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'DescargasIbfk1';

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
     * Sets parent relation PuntoDescarga
     *
     * @param \Atezate\Model\Raw\PuntosDescarga $data
     * @return \Atezate\Model\Raw\Descargas
     */
    public function setPuntoDescarga(\Atezate\Model\Raw\PuntosDescarga $data)
    {
        $this->_PuntoDescarga = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosDescargaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntoDescargaId($primaryKey);
        }

        $this->_setLoaded('DescargasIbfk2');
        return $this;
    }

    /**
     * Gets parent PuntoDescarga
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function getPuntoDescarga($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'DescargasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntoDescarga = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntoDescarga;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Descargas
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Descargas')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Descargas);

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
     * @return null | \Atezate\Model\Validator\Descargas
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Descargas')) {

                $this->setValidator(new \Atezate\Validator\Descargas);
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
     * @see \Mapper\Sql\Descargas::delete
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
