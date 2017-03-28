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
class TiposIncidencias extends ModelAbstract
{

    protected $_gravedadAcceptedValues = array(
        'leve',
        'moderada',
        'grave',
        'muy grave',
    );
    protected $_tipoAcceptedValues = array(
        'cubo',
        'poste',
        'compostador',
        'camion',
        'puntoRecogida',
        'contribuyente',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_tipoId;

    /**
     * [enum:leve|moderada|grave|muy grave]
     * Database var type varchar
     *
     * @var string
     */
    protected $_gravedad;

    /**
     * [enum:cubo|poste|compostador|camion|puntoRecogida|contribuyente]
     * Database var type varchar
     *
     * @var string
     */
    protected $_tipo;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_descripcion;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_resolucionAutomatica;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_plantillasEmailId;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_plantillasEmailPrioridad;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_plantillasSmsId;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_plantillasSmsPrioridad;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_plantillasTelefonoId;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_plantillasTelefonoPrioridad;


    /**
     * Parent relation TiposIncidencias_ibfk_1
     *
     * @var \Atezate\Model\Raw\PlantillasEmail
     */
    protected $_PlantillasEmail;

    /**
     * Parent relation TiposIncidencias_ibfk_2
     *
     * @var \Atezate\Model\Raw\PlantillasSms
     */
    protected $_PlantillasSms;

    /**
     * Parent relation TiposIncidencias_ibfk_3
     *
     * @var \Atezate\Model\Raw\PlantillasTelefono
     */
    protected $_PlantillasTelefono;


    /**
     * Dependent relation Incidencias_ibfk_13
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Incidencias[]
     */
    protected $_Incidencias;


    protected $_columnsList = array(
        'tipoId'=>'tipoId',
        'gravedad'=>'gravedad',
        'tipo'=>'tipo',
        'descripcion'=>'descripcion',
        'resolucionAutomatica'=>'resolucionAutomatica',
        'plantillasEmailId'=>'plantillasEmailId',
        'plantillasEmailPrioridad'=>'plantillasEmailPrioridad',
        'plantillasSmsId'=>'plantillasSmsId',
        'plantillasSmsPrioridad'=>'plantillasSmsPrioridad',
        'plantillasTelefonoId'=>'plantillasTelefonoId',
        'plantillasTelefonoPrioridad'=>'plantillasTelefonoPrioridad',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'gravedad'=> array('enum:leve|moderada|grave|muy grave'),
            'tipo'=> array('enum:cubo|poste|compostador|camion|puntoRecogida|contribuyente'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'TiposIncidenciasIbfk1'=> array(
                    'property' => 'PlantillasEmail',
                    'table_name' => 'PlantillasEmail',
                ),
            'TiposIncidenciasIbfk2'=> array(
                    'property' => 'PlantillasSms',
                    'table_name' => 'PlantillasSms',
                ),
            'TiposIncidenciasIbfk3'=> array(
                    'property' => 'PlantillasTelefono',
                    'table_name' => 'PlantillasTelefono',
                ),
        ));

        $this->setDependentList(array(
            'IncidenciasIbfk13' => array(
                    'property' => 'Incidencias',
                    'table_name' => 'Incidencias',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Incidencias_ibfk_13'
        ));


        $this->_defaultValues = array(
            'gravedad' => 'moderada',
            'resolucionAutomatica' => '0',
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
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setTipoId($data)
    {

        if ($this->_tipoId != $data) {
            $this->_logChange('tipoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipoId = $data;
        } else if (!is_null($data)) {
            $this->_tipoId = (int) $data;
        } else {
            $this->_tipoId = $data;
        }
        return $this;
    }

    /**
     * Gets column tipoId
     *
     * @return int
     */
    public function getTipoId()
    {
            return $this->_tipoId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setGravedad($data)
    {

        if ($this->_gravedad != $data) {
            $this->_logChange('gravedad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_gravedad = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_gravedadAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for gravedad'));
            }
            $this->_gravedad = (string) $data;
        } else {
            $this->_gravedad = $data;
        }
        return $this;
    }

    /**
     * Gets column gravedad
     *
     * @return string
     */
    public function getGravedad()
    {
            return $this->_gravedad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setTipo($data)
    {

        if ($this->_tipo != $data) {
            $this->_logChange('tipo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipo = $data;
        } else if (!is_null($data)) {
            if (!in_array($data, $this->_tipoAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for tipo'));
            }
            $this->_tipo = (string) $data;
        } else {
            $this->_tipo = $data;
        }
        return $this;
    }

    /**
     * Gets column tipo
     *
     * @return string
     */
    public function getTipo()
    {
            return $this->_tipo;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setDescripcion($data)
    {

        if ($this->_descripcion != $data) {
            $this->_logChange('descripcion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_descripcion = $data;
        } else if (!is_null($data)) {
            $this->_descripcion = (string) $data;
        } else {
            $this->_descripcion = $data;
        }
        return $this;
    }

    /**
     * Gets column descripcion
     *
     * @return text
     */
    public function getDescripcion()
    {
            return $this->_descripcion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setResolucionAutomatica($data)
    {

        if ($this->_resolucionAutomatica != $data) {
            $this->_logChange('resolucionAutomatica');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_resolucionAutomatica = $data;
        } else if (!is_null($data)) {
            $this->_resolucionAutomatica = (int) $data;
        } else {
            $this->_resolucionAutomatica = $data;
        }
        return $this;
    }

    /**
     * Gets column resolucionAutomatica
     *
     * @return int
     */
    public function getResolucionAutomatica()
    {
            return $this->_resolucionAutomatica;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasEmailId($data)
    {

        if ($this->_plantillasEmailId != $data) {
            $this->_logChange('plantillasEmailId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasEmailId = $data;
        } else if (!is_null($data)) {
            $this->_plantillasEmailId = (int) $data;
        } else {
            $this->_plantillasEmailId = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasEmailId
     *
     * @return int
     */
    public function getPlantillasEmailId()
    {
            return $this->_plantillasEmailId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasEmailPrioridad($data)
    {

        if ($this->_plantillasEmailPrioridad != $data) {
            $this->_logChange('plantillasEmailPrioridad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasEmailPrioridad = $data;
        } else if (!is_null($data)) {
            $this->_plantillasEmailPrioridad = (int) $data;
        } else {
            $this->_plantillasEmailPrioridad = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasEmailPrioridad
     *
     * @return int
     */
    public function getPlantillasEmailPrioridad()
    {
            return $this->_plantillasEmailPrioridad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasSmsId($data)
    {

        if ($this->_plantillasSmsId != $data) {
            $this->_logChange('plantillasSmsId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasSmsId = $data;
        } else if (!is_null($data)) {
            $this->_plantillasSmsId = (int) $data;
        } else {
            $this->_plantillasSmsId = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasSmsId
     *
     * @return int
     */
    public function getPlantillasSmsId()
    {
            return $this->_plantillasSmsId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasSmsPrioridad($data)
    {

        if ($this->_plantillasSmsPrioridad != $data) {
            $this->_logChange('plantillasSmsPrioridad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasSmsPrioridad = $data;
        } else if (!is_null($data)) {
            $this->_plantillasSmsPrioridad = (int) $data;
        } else {
            $this->_plantillasSmsPrioridad = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasSmsPrioridad
     *
     * @return int
     */
    public function getPlantillasSmsPrioridad()
    {
            return $this->_plantillasSmsPrioridad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
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
     * @param int $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasTelefonoPrioridad($data)
    {

        if ($this->_plantillasTelefonoPrioridad != $data) {
            $this->_logChange('plantillasTelefonoPrioridad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_plantillasTelefonoPrioridad = $data;
        } else if (!is_null($data)) {
            $this->_plantillasTelefonoPrioridad = (int) $data;
        } else {
            $this->_plantillasTelefonoPrioridad = $data;
        }
        return $this;
    }

    /**
     * Gets column plantillasTelefonoPrioridad
     *
     * @return int
     */
    public function getPlantillasTelefonoPrioridad()
    {
            return $this->_plantillasTelefonoPrioridad;
    }


    /**
     * Sets parent relation PlantillasEmail
     *
     * @param \Atezate\Model\Raw\PlantillasEmail $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasEmail(\Atezate\Model\Raw\PlantillasEmail $data)
    {
        $this->_PlantillasEmail = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setPlantillasEmailId($primaryKey);
        }

        $this->_setLoaded('TiposIncidenciasIbfk1');
        return $this;
    }

    /**
     * Gets parent PlantillasEmail
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PlantillasEmail
     */
    public function getPlantillasEmail($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TiposIncidenciasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PlantillasEmail = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PlantillasEmail;
    }

    /**
     * Sets parent relation PlantillasSms
     *
     * @param \Atezate\Model\Raw\PlantillasSms $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function setPlantillasSms(\Atezate\Model\Raw\PlantillasSms $data)
    {
        $this->_PlantillasSms = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setPlantillasSmsId($primaryKey);
        }

        $this->_setLoaded('TiposIncidenciasIbfk2');
        return $this;
    }

    /**
     * Gets parent PlantillasSms
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PlantillasSms
     */
    public function getPlantillasSms($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TiposIncidenciasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PlantillasSms = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PlantillasSms;
    }

    /**
     * Sets parent relation PlantillasTelefono
     *
     * @param \Atezate\Model\Raw\PlantillasTelefono $data
     * @return \Atezate\Model\Raw\TiposIncidencias
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

        $this->_setLoaded('TiposIncidenciasIbfk3');
        return $this;
    }

    /**
     * Gets parent PlantillasTelefono
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PlantillasTelefono
     */
    public function getPlantillasTelefono($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TiposIncidenciasIbfk3';

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
     * Sets dependent relations Incidencias_ibfk_13
     *
     * @param array $data An array of \Atezate\Model\Raw\Incidencias
     * @return \Atezate\Model\Raw\TiposIncidencias
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
     * Sets dependent relations Incidencias_ibfk_13
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\TiposIncidencias
     */
    public function addIncidencias(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencias[] = $data;
        $this->_setLoaded('IncidenciasIbfk13');
        return $this;
    }

    /**
     * Gets dependent Incidencias_ibfk_13
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencias($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'IncidenciasIbfk13';

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
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\TiposIncidencias
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\TiposIncidencias')) {

                $this->setMapper(new \Atezate\Mapper\Sql\TiposIncidencias);

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
     * @return null | \Atezate\Model\Validator\TiposIncidencias
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\TiposIncidencias')) {

                $this->setValidator(new \Atezate\Validator\TiposIncidencias);
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
     * @see \Mapper\Sql\TiposIncidencias::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getTipoId() === null) {
            $this->_logger->log('The value for TipoId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'tipoId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getTipoId())
        );
    }
}
