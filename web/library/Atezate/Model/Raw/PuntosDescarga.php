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
 * [entity] No es posible eliminar puntos de descarga de los que dependan Rutas
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class PuntosDescarga extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosDescargaId;

    /**
     * 7 digitos:2 población, 2 tipo residuo, 2 codigo
     * Database var type varchar
     *
     * @var string
     */
    protected $_puntosDescargaIden;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_residuosTiposId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nombre;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_descripcion;

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
     * Parent relation fk_PuntosDescarga_ResiduosTipos1
     *
     * @var \Atezate\Model\Raw\ResiduosTipos
     */
    protected $_ResiduosTipos;


    /**
     * Dependent relation Descargas_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Descargas[]
     */
    protected $_Descargas;

    /**
     * Dependent relation Rutas_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Rutas[]
     */
    protected $_Rutas;


    protected $_columnsList = array(
        'puntosDescargaId'=>'puntosDescargaId',
        'puntosDescargaIden'=>'puntosDescargaIden',
        'residuosTiposId'=>'residuosTiposId',
        'nombre'=>'nombre',
        'descripcion'=>'descripcion',
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
            'puntosDescargaIden'=> array(''),
            'residuosTiposId'=> array(''),
            'posicion'=> array(''),
            'posicionAddr'=> array('map'),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'FkPuntosDescargaResiduosTipos1'=> array(
                    'property' => 'ResiduosTipos',
                    'table_name' => 'ResiduosTipos',
                ),
        ));

        $this->setDependentList(array(
            'DescargasIbfk2' => array(
                    'property' => 'Descargas',
                    'table_name' => 'Descargas',
                ),
            'RutasIbfk2' => array(
                    'property' => 'Rutas',
                    'table_name' => 'Rutas',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Descargas_ibfk_2'
        ));


        $this->_defaultValues = array(
            'nombre' => '',
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
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function setPuntosDescargaId($data)
    {

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
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function setPuntosDescargaIden($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_puntosDescargaIden != $data) {
            $this->_logChange('puntosDescargaIden');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntosDescargaIden = $data;
        } else if (!is_null($data)) {
            $this->_puntosDescargaIden = (string) $data;
        } else {
            $this->_puntosDescargaIden = $data;
        }
        return $this;
    }

    /**
     * Gets column puntosDescargaIden
     *
     * @return string
     */
    public function getPuntosDescargaIden()
    {
            return $this->_puntosDescargaIden;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PuntosDescarga
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
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function setNombre($data)
    {

        if ($this->_nombre != $data) {
            $this->_logChange('nombre');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nombre = $data;
        } else if (!is_null($data)) {
            $this->_nombre = (string) $data;
        } else {
            $this->_nombre = $data;
        }
        return $this;
    }

    /**
     * Gets column nombre
     *
     * @return string
     */
    public function getNombre()
    {
            return $this->_nombre;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function setDescripcion($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @param text $data
     * @return \Atezate\Model\Raw\PuntosDescarga
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
     * @return \Atezate\Model\Raw\PuntosDescarga
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
     * @return \Atezate\Model\Raw\PuntosDescarga
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
     * @return \Atezate\Model\Raw\PuntosDescarga
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
     * Sets parent relation ResiduosTipos
     *
     * @param \Atezate\Model\Raw\ResiduosTipos $data
     * @return \Atezate\Model\Raw\PuntosDescarga
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

        $this->_setLoaded('FkPuntosDescargaResiduosTipos1');
        return $this;
    }

    /**
     * Gets parent ResiduosTipos
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\ResiduosTipos
     */
    public function getResiduosTipos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'FkPuntosDescargaResiduosTipos1';

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
     * Sets dependent relations Descargas_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Descargas
     * @return \Atezate\Model\Raw\PuntosDescarga
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
     * Sets dependent relations Descargas_ibfk_2
     *
     * @param \Atezate\Model\Raw\Descargas $data
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function addDescargas(\Atezate\Model\Raw\Descargas $data)
    {
        $this->_Descargas[] = $data;
        $this->_setLoaded('DescargasIbfk2');
        return $this;
    }

    /**
     * Gets dependent Descargas_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Descargas
     */
    public function getDescargas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'DescargasIbfk2';

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
     * Sets dependent relations Rutas_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Rutas
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function setRutas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Rutas === null) {

                $this->getRutas();
            }

            $oldRelations = $this->_Rutas;

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

        $this->_Rutas = array();

        foreach ($data as $object) {
            $this->addRutas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Rutas_ibfk_2
     *
     * @param \Atezate\Model\Raw\Rutas $data
     * @return \Atezate\Model\Raw\PuntosDescarga
     */
    public function addRutas(\Atezate\Model\Raw\Rutas $data)
    {
        $this->_Rutas[] = $data;
        $this->_setLoaded('RutasIbfk2');
        return $this;
    }

    /**
     * Gets dependent Rutas_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Rutas
     */
    public function getRutas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RutasIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Rutas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Rutas;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\PuntosDescarga
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\PuntosDescarga')) {

                $this->setMapper(new \Atezate\Mapper\Sql\PuntosDescarga);

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
     * @return null | \Atezate\Model\Validator\PuntosDescarga
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\PuntosDescarga')) {

                $this->setValidator(new \Atezate\Validator\PuntosDescarga);
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
     * @see \Mapper\Sql\PuntosDescarga::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPuntosDescargaId() === null) {
            $this->_logger->log('The value for PuntosDescargaId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'puntosDescargaId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPuntosDescargaId())
        );
    }
}
