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
class CubosTipos extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_cubosTiposId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_tipo;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_litros;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_color;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_altura;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_anchura;

    /**
     * Database var type decimal
     *
     * @var float
     */
    protected $_longitud;

    /**
     * Database var type tinyint
     *
     * @var int
     */
    protected $_llave;

    /**
     * Este valor obligara a los Cubos de este tipo, a especificar el grado de llenado en todas sus recogidas (o el sistema devolverá error).
     * Database var type tinyint
     *
     * @var int
     */
    protected $_llenadoObligatorio;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_marcaCuboId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_fabricante;


    /**
     * Parent relation CubosTipos_ibfk_1
     *
     * @var \Atezate\Model\Raw\MarcasCubo
     */
    protected $_MarcaCubo;


    /**
     * Dependent relation Cubos_ibfk_3
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Cubos[]
     */
    protected $_Cubos;


    protected $_columnsList = array(
        'cubosTiposId'=>'cubosTiposId',
        'tipo'=>'tipo',
        'litros'=>'litros',
        'color'=>'color',
        'altura'=>'altura',
        'anchura'=>'anchura',
        'longitud'=>'longitud',
        'llave'=>'llave',
        'llenadoObligatorio'=>'llenadoObligatorio',
        'marcaCuboId'=>'marcaCuboId',
        'fabricante'=>'fabricante',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'llenadoObligatorio'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'CubosTiposIbfk1'=> array(
                    'property' => 'MarcaCubo',
                    'table_name' => 'MarcasCubo',
                ),
        ));

        $this->setDependentList(array(
            'CubosIbfk3' => array(
                    'property' => 'Cubos',
                    'table_name' => 'Cubos',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Cubos_ibfk_3'
        ));


        $this->_defaultValues = array(
            'tipo' => '',
            'color' => '',
            'llave' => '0',
            'llenadoObligatorio' => '0',
            'fabricante' => '',
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
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setCubosTiposId($data)
    {

        if ($this->_cubosTiposId != $data) {
            $this->_logChange('cubosTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_cubosTiposId = $data;
        } else if (!is_null($data)) {
            $this->_cubosTiposId = (int) $data;
        } else {
            $this->_cubosTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column cubosTiposId
     *
     * @return int
     */
    public function getCubosTiposId()
    {
            return $this->_cubosTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setTipo($data)
    {

        if ($this->_tipo != $data) {
            $this->_logChange('tipo');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tipo = $data;
        } else if (!is_null($data)) {
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
     * @param float $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setLitros($data)
    {

        if ($this->_litros != $data) {
            $this->_logChange('litros');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_litros = $data;
        } else if (!is_null($data)) {
            $this->_litros = (float) $data;
        } else {
            $this->_litros = $data;
        }
        return $this;
    }

    /**
     * Gets column litros
     *
     * @return float
     */
    public function getLitros()
    {
            return $this->_litros;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setColor($data)
    {

        if ($this->_color != $data) {
            $this->_logChange('color');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_color = $data;
        } else if (!is_null($data)) {
            $this->_color = (string) $data;
        } else {
            $this->_color = $data;
        }
        return $this;
    }

    /**
     * Gets column color
     *
     * @return string
     */
    public function getColor()
    {
            return $this->_color;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setAltura($data)
    {

        if ($this->_altura != $data) {
            $this->_logChange('altura');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_altura = $data;
        } else if (!is_null($data)) {
            $this->_altura = (float) $data;
        } else {
            $this->_altura = $data;
        }
        return $this;
    }

    /**
     * Gets column altura
     *
     * @return float
     */
    public function getAltura()
    {
            return $this->_altura;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setAnchura($data)
    {

        if ($this->_anchura != $data) {
            $this->_logChange('anchura');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_anchura = $data;
        } else if (!is_null($data)) {
            $this->_anchura = (float) $data;
        } else {
            $this->_anchura = $data;
        }
        return $this;
    }

    /**
     * Gets column anchura
     *
     * @return float
     */
    public function getAnchura()
    {
            return $this->_anchura;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param float $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setLongitud($data)
    {

        if ($this->_longitud != $data) {
            $this->_logChange('longitud');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_longitud = $data;
        } else if (!is_null($data)) {
            $this->_longitud = (float) $data;
        } else {
            $this->_longitud = $data;
        }
        return $this;
    }

    /**
     * Gets column longitud
     *
     * @return float
     */
    public function getLongitud()
    {
            return $this->_longitud;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setLlave($data)
    {

        if ($this->_llave != $data) {
            $this->_logChange('llave');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_llave = $data;
        } else if (!is_null($data)) {
            $this->_llave = (int) $data;
        } else {
            $this->_llave = $data;
        }
        return $this;
    }

    /**
     * Gets column llave
     *
     * @return int
     */
    public function getLlave()
    {
            return $this->_llave;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setLlenadoObligatorio($data)
    {

        if ($this->_llenadoObligatorio != $data) {
            $this->_logChange('llenadoObligatorio');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_llenadoObligatorio = $data;
        } else if (!is_null($data)) {
            $this->_llenadoObligatorio = (int) $data;
        } else {
            $this->_llenadoObligatorio = $data;
        }
        return $this;
    }

    /**
     * Gets column llenadoObligatorio
     *
     * @return int
     */
    public function getLlenadoObligatorio()
    {
            return $this->_llenadoObligatorio;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setMarcaCuboId($data)
    {

        if ($this->_marcaCuboId != $data) {
            $this->_logChange('marcaCuboId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_marcaCuboId = $data;
        } else if (!is_null($data)) {
            $this->_marcaCuboId = (int) $data;
        } else {
            $this->_marcaCuboId = $data;
        }
        return $this;
    }

    /**
     * Gets column marcaCuboId
     *
     * @return int
     */
    public function getMarcaCuboId()
    {
            return $this->_marcaCuboId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setFabricante($data)
    {

        if ($this->_fabricante != $data) {
            $this->_logChange('fabricante');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_fabricante = $data;
        } else if (!is_null($data)) {
            $this->_fabricante = (string) $data;
        } else {
            $this->_fabricante = $data;
        }
        return $this;
    }

    /**
     * Gets column fabricante
     *
     * @return string
     */
    public function getFabricante()
    {
            return $this->_fabricante;
    }


    /**
     * Sets parent relation MarcaCubo
     *
     * @param \Atezate\Model\Raw\MarcasCubo $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function setMarcaCubo(\Atezate\Model\Raw\MarcasCubo $data)
    {
        $this->_MarcaCubo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setMarcaCuboId($primaryKey);
        }

        $this->_setLoaded('CubosTiposIbfk1');
        return $this;
    }

    /**
     * Gets parent MarcaCubo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\MarcasCubo
     */
    public function getMarcaCubo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosTiposIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_MarcaCubo = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_MarcaCubo;
    }

    /**
     * Sets dependent relations Cubos_ibfk_3
     *
     * @param array $data An array of \Atezate\Model\Raw\Cubos
     * @return \Atezate\Model\Raw\CubosTipos
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
     * Sets dependent relations Cubos_ibfk_3
     *
     * @param \Atezate\Model\Raw\Cubos $data
     * @return \Atezate\Model\Raw\CubosTipos
     */
    public function addCubos(\Atezate\Model\Raw\Cubos $data)
    {
        $this->_Cubos[] = $data;
        $this->_setLoaded('CubosIbfk3');
        return $this;
    }

    /**
     * Gets dependent Cubos_ibfk_3
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Cubos
     */
    public function getCubos($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CubosIbfk3';

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
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CubosTipos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CubosTipos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CubosTipos);

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
     * @return null | \Atezate\Model\Validator\CubosTipos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CubosTipos')) {

                $this->setValidator(new \Atezate\Validator\CubosTipos);
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
     * @see \Mapper\Sql\CubosTipos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getCubosTiposId() === null) {
            $this->_logger->log('The value for CubosTiposId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'cubosTiposId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getCubosTiposId())
        );
    }
}
