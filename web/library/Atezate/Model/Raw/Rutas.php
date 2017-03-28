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
class Rutas extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_rutaId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_identificacion;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_rutasTiposId;

    /**
     * Database var type time
     *
     * @var string
     */
    protected $_tiempoAprox;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosDescargaId;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_residuosTiposId;


    /**
     * Parent relation Rutas_ibfk_1
     *
     * @var \Atezate\Model\Raw\RutasTipos
     */
    protected $_RutasTipos;

    /**
     * Parent relation Rutas_ibfk_2
     *
     * @var \Atezate\Model\Raw\PuntosDescarga
     */
    protected $_PuntosDescarga;

    /**
     * Parent relation Rutas_ibfk_3
     *
     * @var \Atezate\Model\Raw\ResiduosTipos
     */
    protected $_ResiduosTipos;


    /**
     * Dependent relation RutasRelPuntosRecogida_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\RutasRelPuntosRecogida[]
     */
    protected $_RutasRelPuntosRecogida;

    /**
     * Dependent relation Turnos_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Turnos[]
     */
    protected $_Turnos;


    protected $_columnsList = array(
        'rutaId'=>'rutaId',
        'identificacion'=>'identificacion',
        'rutasTiposId'=>'rutasTiposId',
        'tiempoAprox'=>'tiempoAprox',
        'puntosDescargaId'=>'puntosDescargaId',
        'residuosTiposId'=>'residuosTiposId',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'rutasTiposId'=> array(''),
            'residuosTiposId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'RutasIbfk1'=> array(
                    'property' => 'RutasTipos',
                    'table_name' => 'RutasTipos',
                ),
            'RutasIbfk2'=> array(
                    'property' => 'PuntosDescarga',
                    'table_name' => 'PuntosDescarga',
                ),
            'RutasIbfk3'=> array(
                    'property' => 'ResiduosTipos',
                    'table_name' => 'ResiduosTipos',
                ),
        ));

        $this->setDependentList(array(
            'RutasRelPuntosRecogidaIbfk1' => array(
                    'property' => 'RutasRelPuntosRecogida',
                    'table_name' => 'RutasRelPuntosRecogida',
                ),
            'TurnosIbfk1' => array(
                    'property' => 'Turnos',
                    'table_name' => 'Turnos',
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
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setRutaId($data)
    {

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
     * @param string $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setIdentificacion($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_identificacion != $data) {
            $this->_logChange('identificacion');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_identificacion = $data;
        } else if (!is_null($data)) {
            $this->_identificacion = (string) $data;
        } else {
            $this->_identificacion = $data;
        }
        return $this;
    }

    /**
     * Gets column identificacion
     *
     * @return string
     */
    public function getIdentificacion()
    {
            return $this->_identificacion;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setRutasTiposId($data)
    {

        if ($this->_rutasTiposId != $data) {
            $this->_logChange('rutasTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_rutasTiposId = $data;
        } else if (!is_null($data)) {
            $this->_rutasTiposId = (int) $data;
        } else {
            $this->_rutasTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column rutasTiposId
     *
     * @return int
     */
    public function getRutasTiposId()
    {
            return $this->_rutasTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setTiempoAprox($data)
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


        if ($this->_tiempoAprox != $data) {
            $this->_logChange('tiempoAprox');
        }


        $this->_tiempoAprox = $data;
        return $this;
    }

    /**
     * Gets column tiempoAprox
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getTiempoAprox($returnZendDate = false)
    {
    
        if (is_null($this->_tiempoAprox)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_tiempoAprox->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_tiempoAprox->format('H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setPuntosDescargaId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_puntosDescargaId != $data) {
            $this->_logChange('puntosDescargaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosDescargaId = $data;
        } else if (!is_null($data)) {
            $this->_puntosDescargaId = (int) $data;
        } else {
            $this->_puntosDescargaId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosDescargaId
     *
     * @return int
     */
    public function getPuntosDescargaId()
    {
            return $this->_puntosDescargaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setResiduosTiposId($data)
    {

        if ($this->_residuosTiposId != $data) {
            $this->_logChange('residuosTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_residuosTiposId = $data;
        } else if (!is_null($data)) {
            $this->_residuosTiposId = (int) $data;
        } else {
            $this->_residuosTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column residuosTiposId
     *
     * @return int
     */
    public function getResiduosTiposId()
    {
            return $this->_residuosTiposId;
    }


    /**
     * Sets parent relation RutasTipos
     *
     * @param \Atezate\Model\Raw\RutasTipos $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setRutasTipos(\Atezate\Model\Raw\RutasTipos $data)
    {
        $this->_RutasTipos = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['rutasTiposId'];
        }

        if (!is_null($primaryKey)) {
            $this->setRutasTiposId($primaryKey);
        }

        $this->_setLoaded('RutasIbfk1');
        return $this;
    }

    /**
     * Gets parent RutasTipos
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\RutasTipos
     */
    public function getRutasTipos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_RutasTipos = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_RutasTipos;
    }

    /**
     * Sets parent relation PuntosDescarga
     *
     * @param \Atezate\Model\Raw\PuntosDescarga $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setPuntosDescarga(\Atezate\Model\Raw\PuntosDescarga $data)
    {
        $this->_PuntosDescarga = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosDescargaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntosDescargaId($primaryKey);
        }

        $this->_setLoaded('RutasIbfk2');
        return $this;
    }

    /**
     * Gets parent PuntosDescarga
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function getPuntosDescarga($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosDescarga = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntosDescarga;
    }

    /**
     * Sets parent relation ResiduosTipos
     *
     * @param \Atezate\Model\Raw\ResiduosTipos $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setResiduosTipos(\Atezate\Model\Raw\ResiduosTipos $data)
    {
        $this->_ResiduosTipos = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['residuosTiposId'];
        }

        if (!is_null($primaryKey)) {
            $this->setResiduosTiposId($primaryKey);
        }

        $this->_setLoaded('RutasIbfk3');
        return $this;
    }

    /**
     * Gets parent ResiduosTipos
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\ResiduosTipos
     */
    public function getResiduosTipos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_ResiduosTipos = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_ResiduosTipos;
    }

    /**
     * Sets dependent relations RutasRelPuntosRecogida_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\RutasRelPuntosRecogida
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setRutasRelPuntosRecogida(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_RutasRelPuntosRecogida === null) {

                $this->getRutasRelPuntosRecogida();
            }

            $oldRelations = $this->_RutasRelPuntosRecogida;

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

        $this->_RutasRelPuntosRecogida = array();

        foreach ($data as $object) {
            $this->addRutasRelPuntosRecogida($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations RutasRelPuntosRecogida_ibfk_1
     *
     * @param \Atezate\Model\Raw\RutasRelPuntosRecogida $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function addRutasRelPuntosRecogida(\Atezate\Model\Raw\RutasRelPuntosRecogida $data)
    {
        $this->_RutasRelPuntosRecogida[] = $data;
        $this->_setLoaded('RutasRelPuntosRecogidaIbfk1');
        return $this;
    }

    /**
     * Gets dependent RutasRelPuntosRecogida_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\RutasRelPuntosRecogida
     */
    public function getRutasRelPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasRelPuntosRecogidaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_RutasRelPuntosRecogida = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_RutasRelPuntosRecogida;
    }

    /**
     * Sets dependent relations Turnos_ibfk_1
     *
     * @param array $data An array of \Atezate\Model\Raw\Turnos
     * @return \Atezate\Model\Raw\Rutas
     */
    public function setTurnos(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Turnos === null) {

                $this->getTurnos();
            }

            $oldRelations = $this->_Turnos;

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

        $this->_Turnos = array();

        foreach ($data as $object) {
            $this->addTurnos($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Turnos_ibfk_1
     *
     * @param \Atezate\Model\Raw\Turnos $data
     * @return \Atezate\Model\Raw\Rutas
     */
    public function addTurnos(\Atezate\Model\Raw\Turnos $data)
    {
        $this->_Turnos[] = $data;
        $this->_setLoaded('TurnosIbfk1');
        return $this;
    }

    /**
     * Gets dependent Turnos_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Turnos
     */
    public function getTurnos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'TurnosIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Turnos = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Turnos;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Rutas
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Rutas')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Rutas);

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
     * @return null | \Atezate\Model\Validator\Rutas
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Rutas')) {

                $this->setValidator(new \Atezate\Validator\Rutas);
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
     * @see \Mapper\Sql\Rutas::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getRutaId() === null) {
            $this->_logger->log('The value for RutaId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'rutaId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getRutaId())
        );
    }
}
