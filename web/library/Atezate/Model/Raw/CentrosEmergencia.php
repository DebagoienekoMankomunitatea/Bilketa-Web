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
class CentrosEmergencia extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_ip;

    /**
     * Database var type smallint
     *
     * @var int
     */
    protected $_puerto;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntoRecogidaId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_identificador;


    /**
     * Parent relation CentrosEmergencia_ibfk_1
     *
     * @var \Atezate\Model\Raw\PuntosRecogida
     */
    protected $_PuntoRecogida;


    /**
     * Dependent relation CodigosApertura_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\CodigosApertura[]
     */
    protected $_CodigosApertura;

    /**
     * Dependent relation Cubos_ibfk_6
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Cubos[]
     */
    protected $_Cubos;

    /**
     * Dependent relation Recogidas_ibfk_6
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Recogidas[]
     */
    protected $_Recogidas;


    protected $_columnsList = array(
        'id'=>'id',
        'ip'=>'ip',
        'puerto'=>'puerto',
        'puntoRecogidaId'=>'puntoRecogidaId',
        'identificador'=>'identificador',
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
            'CentrosEmergenciaIbfk1'=> array(
                    'property' => 'PuntoRecogida',
                    'table_name' => 'PuntosRecogida',
                ),
        ));

        $this->setDependentList(array(
            'CodigosAperturaIbfk2' => array(
                    'property' => 'CodigosApertura',
                    'table_name' => 'CodigosApertura',
                ),
            'CubosIbfk6' => array(
                    'property' => 'Cubos',
                    'table_name' => 'Cubos',
                ),
            'RecogidasIbfk6' => array(
                    'property' => 'Recogidas',
                    'table_name' => 'Recogidas',
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
     * @return \Atezate\Model\Raw\CentrosEmergencia
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
     * @param string $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setIp($data)
    {

        if ($this->_ip != $data) {
            $this->_logChange('ip');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_ip = $data;
        } else if (!is_null($data)) {
            $this->_ip = (string) $data;
        } else {
            $this->_ip = $data;
        }
        return $this;
    }

    /**
     * Gets column ip
     *
     * @return string
     */
    public function getIp()
    {
            return $this->_ip;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setPuerto($data)
    {

        if ($this->_puerto != $data) {
            $this->_logChange('puerto');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puerto = $data;
        } else if (!is_null($data)) {
            $this->_puerto = (int) $data;
        } else {
            $this->_puerto = $data;
        }
        return $this;
    }

    /**
     * Gets column puerto
     *
     * @return int
     */
    public function getPuerto()
    {
            return $this->_puerto;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setPuntoRecogidaId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_puntoRecogidaId != $data) {
            $this->_logChange('puntoRecogidaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_puntoRecogidaId = $data;
        } else if (!is_null($data)) {
            $this->_puntoRecogidaId = (int) $data;
        } else {
            $this->_puntoRecogidaId = $data;
        }
        return $this;
    }

    /**
     * Gets column puntoRecogidaId
     *
     * @return int
     */
    public function getPuntoRecogidaId()
    {
            return $this->_puntoRecogidaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setIdentificador($data)
    {

        if ($this->_identificador != $data) {
            $this->_logChange('identificador');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_identificador = $data;
        } else if (!is_null($data)) {
            $this->_identificador = (string) $data;
        } else {
            $this->_identificador = $data;
        }
        return $this;
    }

    /**
     * Gets column identificador
     *
     * @return string
     */
    public function getIdentificador()
    {
            return $this->_identificador;
    }


    /**
     * Sets parent relation PuntoRecogida
     *
     * @param \Atezate\Model\Raw\PuntosRecogida $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setPuntoRecogida(\Atezate\Model\Raw\PuntosRecogida $data)
    {
        $this->_PuntoRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setPuntoRecogidaId($primaryKey);
        }

        $this->_setLoaded('CentrosEmergenciaIbfk1');
        return $this;
    }

    /**
     * Gets parent PuntoRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\PuntosRecogida
     */
    public function getPuntoRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CentrosEmergenciaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntoRecogida = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_PuntoRecogida;
    }

    /**
     * Sets dependent relations CodigosApertura_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\CodigosApertura
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setCodigosApertura(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_CodigosApertura === null) {

                $this->getCodigosApertura();
            }

            $oldRelations = $this->_CodigosApertura;

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

        $this->_CodigosApertura = array();

        foreach ($data as $object) {
            $this->addCodigosApertura($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations CodigosApertura_ibfk_2
     *
     * @param \Atezate\Model\Raw\CodigosApertura $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function addCodigosApertura(\Atezate\Model\Raw\CodigosApertura $data)
    {
        $this->_CodigosApertura[] = $data;
        $this->_setLoaded('CodigosAperturaIbfk2');
        return $this;
    }

    /**
     * Gets dependent CodigosApertura_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\CodigosApertura
     */
    public function getCodigosApertura($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CodigosAperturaIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_CodigosApertura = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_CodigosApertura;
    }

    /**
     * Sets dependent relations Cubos_ibfk_6
     *
     * @param array $data An array of \Atezate\Model\Raw\Cubos
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setCubos(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Cubos === null) {

                $this->getCubos();
            }

            $oldRelations = $this->_Cubos;

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

        $this->_Cubos = array();

        foreach ($data as $object) {
            $this->addCubos($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Cubos_ibfk_6
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function addCubos(\Atezate\Model\Raw\Cubos $data)
    {
        $this->_Cubos[] = $data;
        $this->_setLoaded('CubosIbfk6');
        return $this;
    }

    /**
     * Gets dependent Cubos_ibfk_6
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Cubos
     */
    public function getCubos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Cubos = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Cubos;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_6
     *
     * @param array $data An array of \Atezate\Model\Raw\Recogidas
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function setRecogidas(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Recogidas === null) {

                $this->getRecogidas();
            }

            $oldRelations = $this->_Recogidas;

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

        $this->_Recogidas = array();

        foreach ($data as $object) {
            $this->addRecogidas($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Recogidas_ibfk_6
     *
     * @param \Atezate\Model\Raw\Recogidas $data
     * @return \Atezate\Model\Raw\CentrosEmergencia
     */
    public function addRecogidas(\Atezate\Model\Raw\Recogidas $data)
    {
        $this->_Recogidas[] = $data;
        $this->_setLoaded('RecogidasIbfk6');
        return $this;
    }

    /**
     * Gets dependent Recogidas_ibfk_6
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Recogidas
     */
    public function getRecogidas($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecogidasIbfk6';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Recogidas = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Recogidas;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CentrosEmergencia
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CentrosEmergencia')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CentrosEmergencia);

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
     * @return null | \Atezate\Model\Validator\CentrosEmergencia
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CentrosEmergencia')) {

                $this->setValidator(new \Atezate\Validator\CentrosEmergencia);
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
     * @see \Mapper\Sql\CentrosEmergencia::delete
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
