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
class Compostadores extends ModelAbstract
{


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
    protected $_altaFecha;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_emplazamiento;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_marcaCompostadorId;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_ventajasComunidad;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_privado;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_compostadoresIden;

    /**
     * geometry column :: 25830
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
     * Parent relation Compostadores_ibfk_1
     *
     * @var \Atezate\Model\Raw\MarcasCompostador
     */
    protected $_MarcaCompostador;


    /**
     * Dependent relation CompostadoresRelContribuyentes_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CompostadoresRelContribuyentes[]
     */
    protected $_CompostadoresRelContribuyentes;

    /**
     * Dependent relation Incidencias_ibfk_6
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;

    /**
     * Dependent relation Revision_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Revision[]
     */
    protected $_Revision;


    protected $_columnsList = array(
        'compostadoresId'=>'compostadoresId',
        'altaFecha'=>'altaFecha',
        'emplazamiento'=>'emplazamiento',
        'marcaCompostadorId'=>'marcaCompostadorId',
        'ventajasComunidad'=>'ventajasComunidad',
        'privado'=>'privado',
        'compostadoresIden'=>'compostadoresIden',
        'posicion'=>'posicion',
        'posicionAddr'=>'posicionAddr',
        'posicionLat'=>'posicionLat',
        'posicionLng'=>'posicionLng',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'posicion'=> array(''),
            'posicionAddr'=> array('map'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'CompostadoresIbfk1'=> array(
                    'property' => 'MarcaCompostador',
                    'table_name' => 'MarcasCompostador',
                ),
        ));

        $this->setDependentList(array(
            'CompostadoresRelContribuyentesIbfk2' => array(
                    'property' => 'CompostadoresRelContribuyentes',
                    'table_name' => 'CompostadoresRelContribuyentes',
                ),
            'IncidenciasIbfk6' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
            'RevisionIbfk1' => array(
                    'property' => 'Revision',
                    'table_name' => 'Revision',
                ),
        ));




        $this->_defaultValues = array(
            'emplazamiento' => '',
            'ventajasComunidad' => '0',
            'privado' => '0',
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
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setCompostadoresId($data)
    {

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
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setAltaFecha($data)
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

        if ($this->_altaFecha != $data) {
            $this->_logChange('altaFecha');
        }


        $this->_altaFecha = $data;
        return $this;
    }

    /**
     * Gets column altaFecha
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getAltaFecha($returnZendDate = false)
    {
    
        if (is_null($this->_altaFecha)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_altaFecha->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_altaFecha->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setEmplazamiento($data)
    {

        if ($this->_emplazamiento != $data) {
            $this->_logChange('emplazamiento');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_emplazamiento = $data;
        } else if (!is_null($data)) {
            $this->_emplazamiento = (string) $data;
        } else {
            $this->_emplazamiento = $data;
        }
        return $this;
    }

    /**
     * Gets column emplazamiento
     *
     * @return string
     */
    public function getEmplazamiento()
    {
            return $this->_emplazamiento;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setMarcaCompostadorId($data)
    {

        if ($this->_marcaCompostadorId != $data) {
            $this->_logChange('marcaCompostadorId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_marcaCompostadorId = $data;
        } else if (!is_null($data)) {
            $this->_marcaCompostadorId = (int) $data;
        } else {
            $this->_marcaCompostadorId = $data;
        }
        return $this;
    }

    /**
     * Gets column marcaCompostadorId
     *
     * @return int
     */
    public function getMarcaCompostadorId()
    {
            return $this->_marcaCompostadorId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setVentajasComunidad($data)
    {

        if ($this->_ventajasComunidad != $data) {
            $this->_logChange('ventajasComunidad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_ventajasComunidad = $data;
        } else if (!is_null($data)) {
            $this->_ventajasComunidad = (int) $data;
        } else {
            $this->_ventajasComunidad = $data;
        }
        return $this;
    }

    /**
     * Gets column ventajasComunidad
     *
     * @return int
     */
    public function getVentajasComunidad()
    {
            return $this->_ventajasComunidad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setPrivado($data)
    {

        if ($this->_privado != $data) {
            $this->_logChange('privado');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_privado = $data;
        } else if (!is_null($data)) {
            $this->_privado = (int) $data;
        } else {
            $this->_privado = $data;
        }
        return $this;
    }

    /**
     * Gets column privado
     *
     * @return int
     */
    public function getPrivado()
    {
            return $this->_privado;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setCompostadoresIden($data)
    {

        if ($this->_compostadoresIden != $data) {
            $this->_logChange('compostadoresIden');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_compostadoresIden = $data;
        } else if (!is_null($data)) {
            $this->_compostadoresIden = (string) $data;
        } else {
            $this->_compostadoresIden = $data;
        }
        return $this;
    }

    /**
     * Gets column compostadoresIden
     *
     * @return text
     */
    public function getCompostadoresIden()
    {
            return $this->_compostadoresIden;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Compostadores
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
     * @return \Atezate\Model\Raw\Compostadores
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
     * @return \Atezate\Model\Raw\Compostadores
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
     * @return \Atezate\Model\Raw\Compostadores
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
     * Sets parent relation MarcaCompostador
     *
     * @param \Atezate\Model\Raw\MarcasCompostador $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setMarcaCompostador(\Atezate\Model\Raw\MarcasCompostador $data)
    {
        $this->_MarcaCompostador = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setMarcaCompostadorId($primaryKey);
        }

        $this->_setLoaded('CompostadoresIbfk1');
        return $this;
    }

    /**
     * Gets parent MarcaCompostador
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\MarcasCompostador
     */
    public function getMarcaCompostador($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CompostadoresIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_MarcaCompostador = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_MarcaCompostador;
    }

    /**
     * Sets dependent relations CompostadoresRelContribuyentes_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\CompostadoresRelContribuyentes
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setCompostadoresRelContribuyentes(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CompostadoresRelContribuyentes === null) {

                $this->getCompostadoresRelContribuyentes();
            }

            $oldRelations = $this->_CompostadoresRelContribuyentes;

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

        $this->_CompostadoresRelContribuyentes = array();

        foreach ($data as $object) {
            $this->addCompostadoresRelContribuyentes($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CompostadoresRelContribuyentes_ibfk_2
     *
     * @param \Atezate\Model\Raw\CompostadoresRelContribuyentes $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function addCompostadoresRelContribuyentes(\Atezate\Model\Raw\CompostadoresRelContribuyentes $data)
    {
        $this->_CompostadoresRelContribuyentes[] = $data;
        $this->_setLoaded('CompostadoresRelContribuyentesIbfk2');
        return $this;
    }

    /**
     * Gets dependent CompostadoresRelContribuyentes_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function getCompostadoresRelContribuyentes($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CompostadoresRelContribuyentesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CompostadoresRelContribuyentes = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CompostadoresRelContribuyentes;
    }

    /**
     * Sets dependent relations Incidencias_ibfk_6
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\Compostadores
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
     * Sets dependent relations Incidencias_ibfk_6
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk6');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_6
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk6';

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
     * Sets dependent relations Revision_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Revision
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function setRevision(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Revision === null) {

                $this->getRevision();
            }

            $oldRelations = $this->_Revision;

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

        $this->_Revision = array();

        foreach ($data as $object) {
            $this->addRevision($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Revision_ibfk_1
     *
     * @param \Atezate\Model\Raw\Revision $data
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function addRevision(\Atezate\Model\Raw\Revision $data)
    {
        $this->_Revision[] = $data;
        $this->_setLoaded('RevisionIbfk1');
        return $this;
    }

    /**
     * Gets dependent Revision_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Revision
     */
    public function getRevision($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RevisionIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Revision = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Revision;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Compostadores
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Compostadores')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Compostadores);

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
     * @return null | \Atezate\Model\Validator\Compostadores
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Compostadores')) {

                $this->setValidator(new \Atezate\Validator\Compostadores);
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
     * @see \Mapper\Sql\Compostadores::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getCompostadoresId() === null) {
            $this->_logger->log('The value for CompostadoresId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'compostadoresId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getCompostadoresId())
        );
    }
}
