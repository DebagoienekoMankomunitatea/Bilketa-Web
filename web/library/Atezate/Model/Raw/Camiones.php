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
class Camiones extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_camionId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_matricula;

    /**
     * Database var type float
     *
     * @var float
     */
    protected $_precision;

    /**
     * Timestamp de última posición recogida
     * Database var type timestamp
     *
     * @var string
     */
    protected $_cuandoPosicion;

    /**
     * geometry column :: 4326
     * Database var type text
     *
     * @var text
     */
    protected $_posicion;

    /**
     * [map]
     * Database var type varchar
     *
     * @var string
     */
    protected $_posicionAddr;

    /**
     * Database var type float
     *
     * @var float
     */
    protected $_costeHora;

    /**
     * Database var type float
     *
     * @var float
     */
    protected $_pesoNeto;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_itv;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_otros;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_posicionLat;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_posicionLng;



    /**
     * Dependent relation Descargas_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Descargas[]
     */
    protected $_Descargas;

    /**
     * Dependent relation Incidencias_ibfk_9
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation TurnosRelCamiones_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\TurnosRelCamiones[]
     */
    protected $_TurnosRelCamiones;


    protected $_columnsList = array(
        'camionId'=>'camionId',
        'matricula'=>'matricula',
        'precision'=>'precision',
        'cuandoPosicion'=>'cuandoPosicion',
        'posicion'=>'posicion',
        'posicionAddr'=>'posicionAddr',
        'costeHora'=>'costeHora',
        'pesoNeto'=>'pesoNeto',
        'itv'=>'itv',
        'otros'=>'otros',
        'posicionLat'=>'posicionLat',
        'posicionLng'=>'posicionLng',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'cuandoPosicion'=> array(''),
            'posicion'=> array(''),
            'posicionAddr'=> array('map'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'DescargasIbfk1' => array(
                    'property' => 'Descargas',
                    'table_name' => 'Descargas',
                ),
            'IncidenciasIbfk9' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'TurnosRelCamionesIbfk2' => array(
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
     * @return \Atezate\Model\Raw\Camiones
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
     * @param string $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setMatricula($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_matricula != $data) {
            $this->_logChange('matricula');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_matricula = $data;
        } else if (!is_null($data)) {
            $this->_matricula = (string) $data;
        } else {
            $this->_matricula = $data;
        }
        return $this;
    }

    /**
     * Gets column matricula
     *
     * @return string
     */
    public function getMatricula()
    {
            return $this->_matricula;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setPrecision($data)
    {

        if ($this->_precision != $data) {
            $this->_logChange('precision');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_precision = $data;
        } else if (!is_null($data)) {
            $this->_precision = (float) $data;
        } else {
            $this->_precision = $data;
        }
        return $this;
    }

    /**
     * Gets column precision
     *
     * @return float
     */
    public function getPrecision()
    {
            return $this->_precision;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setCuandoPosicion($data)
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


        if ($this->_cuandoPosicion != $data) {
            $this->_logChange('cuandoPosicion');
        }


        $this->_cuandoPosicion = $data;
        return $this;
    }

    /**
     * Gets column cuandoPosicion
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getCuandoPosicion($returnZendDate = false)
    {
    
        if (is_null($this->_cuandoPosicion)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_cuandoPosicion->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_cuandoPosicion->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setPosicion($data)
    {

        if ($this->_posicion != $data) {
            $this->_logChange('posicion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicion = $data;
        } else if (!is_null($data)) {
            $this->_posicion = (string) $data;
        } else {
            $this->_posicion = $data;
        }
        return $this;
    }

    /**
     * Gets column posicion
     *
     * @return text
     */
    public function getPosicion()
    {
            return $this->_posicion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setPosicionAddr($data)
    {

        if ($this->_posicionAddr != $data) {
            $this->_logChange('posicionAddr');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionAddr = $data;
        } else if (!is_null($data)) {
            $this->_posicionAddr = (string) $data;
        } else {
            $this->_posicionAddr = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionAddr
     *
     * @return string
     */
    public function getPosicionAddr()
    {
            return $this->_posicionAddr;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setCosteHora($data)
    {

        if ($this->_costeHora != $data) {
            $this->_logChange('costeHora');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_costeHora = $data;
        } else if (!is_null($data)) {
            $this->_costeHora = (float) $data;
        } else {
            $this->_costeHora = $data;
        }
        return $this;
    }

    /**
     * Gets column costeHora
     *
     * @return float
     */
    public function getCosteHora()
    {
            return $this->_costeHora;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setPesoNeto($data)
    {

        if ($this->_pesoNeto != $data) {
            $this->_logChange('pesoNeto');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_pesoNeto = $data;
        } else if (!is_null($data)) {
            $this->_pesoNeto = (float) $data;
        } else {
            $this->_pesoNeto = $data;
        }
        return $this;
    }

    /**
     * Gets column pesoNeto
     *
     * @return float
     */
    public function getPesoNeto()
    {
            return $this->_pesoNeto;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setItv($data)
    {

        if ($this->_itv != $data) {
            $this->_logChange('itv');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_itv = $data;
        } else if (!is_null($data)) {
            $this->_itv = (string) $data;
        } else {
            $this->_itv = $data;
        }
        return $this;
    }

    /**
     * Gets column itv
     *
     * @return string
     */
    public function getItv()
    {
            return $this->_itv;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setOtros($data)
    {

        if ($this->_otros != $data) {
            $this->_logChange('otros');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_otros = $data;
        } else if (!is_null($data)) {
            $this->_otros = (string) $data;
        } else {
            $this->_otros = $data;
        }
        return $this;
    }

    /**
     * Gets column otros
     *
     * @return string
     */
    public function getOtros()
    {
            return $this->_otros;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setPosicionLat($data)
    {

        if ($this->_posicionLat != $data) {
            $this->_logChange('posicionLat');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionLat = $data;
        } else if (!is_null($data)) {
            $this->_posicionLat = (float) $data;
        } else {
            $this->_posicionLat = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionLat
     *
     * @return float
     */
    public function getPosicionLat()
    {
            return $this->_posicionLat;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setPosicionLng($data)
    {

        if ($this->_posicionLng != $data) {
            $this->_logChange('posicionLng');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_posicionLng = $data;
        } else if (!is_null($data)) {
            $this->_posicionLng = (float) $data;
        } else {
            $this->_posicionLng = $data;
        }
        return $this;
    }

    /**
     * Gets column posicionLng
     *
     * @return float
     */
    public function getPosicionLng()
    {
            return $this->_posicionLng;
    }


    /**
     * Sets dependent relations Descargas_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Descargas
     * @return \Atezate\Model\Raw\Camiones
     */
    public function setDescargas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Descargas === null) {

                $this->getDescargas();
            }

            $oldRelations = $this->_Descargas;

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

        $this->_Descargas = array();

        foreach ($data as $object) {
            $this->addDescargas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Descargas_ibfk_1
     *
     * @param \Atezate\Model\Raw\Descargas $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function addDescargas(\Atezate\Model\Raw\Descargas $data)
    {
        $this->_Descargas[] = $data;
        $this->_setLoaded('DescargasIbfk1');
        return $this;
    }

    /**
     * Gets dependent Descargas_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Descargas
     */
    public function getDescargas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'DescargasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Descargas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Descargas;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_9
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\Camiones
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
     * Sets dependent relations Incidencias_ibfk_9
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk9');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_9
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk9';

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
     * Sets dependent relations TurnosRelCamiones_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\TurnosRelCamiones
     * @return \Atezate\Model\Raw\Camiones
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
     * Sets dependent relations TurnosRelCamiones_ibfk_2
     *
     * @param \Atezate\Model\Raw\TurnosRelCamiones $data
     * @return \Atezate\Model\Raw\Camiones
     */
    public function addTurnosRelCamiones(\Atezate\Model\Raw\TurnosRelCamiones $data)
    {
        $this->_TurnosRelCamiones[] = $data;
        $this->_setLoaded('TurnosRelCamionesIbfk2');
        return $this;
    }

    /**
     * Gets dependent TurnosRelCamiones_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\TurnosRelCamiones
     */
    public function getTurnosRelCamiones($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosRelCamionesIbfk2';

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
     * @return Atezate\Mapper\Sql\Camiones
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Camiones')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Camiones);

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
     * @return null | \Atezate\Model\Validator\Camiones
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Camiones')) {

                $this->setValidator(new \Atezate\Validator\Camiones);
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
     * @see \Mapper\Sql\Camiones::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getCamionId() === null) {
            $this->_logger->log('The value for CamionId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'camionId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getCamionId())
        );
    }
}
