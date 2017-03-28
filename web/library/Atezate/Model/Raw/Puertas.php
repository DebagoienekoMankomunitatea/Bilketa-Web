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
class Puertas extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puertasId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_cuboId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_puntosRecogidaId;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_descripcion;


    /**
     * Parent relation Puertas_ibfk_1
     *
     * @var \Atezate\Model\Cubos
     */
    protected $_Cubo;

    /**
     * Parent relation Puertas_ibfk_2
     *
     * @var \Atezate\Model\PuntosRecogida
     */
    protected $_PuntosRecogida;



    protected $_columnsList = array(
        'puertasId'=>'puertasId',
        'cuboId'=>'cuboId',
        'puntosRecogidaId'=>'puntosRecogidaId',
        'descripcion'=>'descripcion',
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
            'PuertasIbfk1'=> array(
                    'property' => 'Cubo',
                    'table_name' => 'Cubos',
                ),
            'PuertasIbfk2'=> array(
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
     * @return \Atezate\Model\Puertas
     */
    public function setPuertasId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_puertasId != $data) {
            $this->_logChange('puertasId');
        }

        if (!is_null($data)) {
            $this->_puertasId = (int) $data;
        } else {
            $this->_puertasId = $data;
        }
        return $this;
    }

    /**
     * Gets column puertasId
     *
     * @return int
     */
    public function getPuertasId()
    {
    
        return $this->_puertasId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Puertas
     */
    public function setCuboId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_cuboId != $data) {
            $this->_logChange('cuboId');
        }

        if (!is_null($data)) {
            $this->_cuboId = (int) $data;
        } else {
            $this->_cuboId = $data;
        }
        return $this;
    }

    /**
     * Gets column cuboId
     *
     * @return int
     */
    public function getCuboId()
    {
    
        return $this->_cuboId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Puertas
     */
    public function setPuntosRecogidaId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_puntosRecogidaId != $data) {
            $this->_logChange('puntosRecogidaId');
        }

        if (!is_null($data)) {
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
     * @param text $data
     * @return \Atezate\Model\Puertas
     */
    public function setDescripcion($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_descripcion != $data) {
            $this->_logChange('descripcion');
        }

        if (!is_null($data)) {
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
     * Sets parent relation Cubo
     *
     * @param \Atezate\Model\Cubos $data
     * @return \Atezate\Model\Puertas
     */
    public function setCubo(\Atezate\Model\Cubos $data)
    {
        $this->_Cubo = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['cuboId'];
        }

        $this->setCuboId($primaryKey);

        $this->_setLoaded('PuertasIbfk1');
        return $this;
    }

    /**
     * Gets parent Cubo
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Cubos
     */
    public function getCubo($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PuertasIbfk1';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Cubo = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Cubo;
    }

    /**
     * Sets parent relation PuntosRecogida
     *
     * @param \Atezate\Model\PuntosRecogida $data
     * @return \Atezate\Model\Puertas
     */
    public function setPuntosRecogida(\Atezate\Model\PuntosRecogida $data)
    {
        $this->_PuntosRecogida = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['puntosRecogidaId'];
        }

        $this->setPuntosRecogidaId($primaryKey);

        $this->_setLoaded('PuertasIbfk2');
        return $this;
    }

    /**
     * Gets parent PuntosRecogida
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\PuntosRecogida
     */
    public function getPuntosRecogida($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PuertasIbfk2';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_PuntosRecogida = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_PuntosRecogida;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\Puertas
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\Puertas')) {

                $this->setMapper(new \Atezate\Mapper\Sql\Puertas);

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
     * @return null | \Atezate\Model\Validator\Puertas
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\Puertas')) {

                $this->setValidator(new \Atezate\Validator\Puertas);
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
     * @see \Mapper\Sql\Puertas::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPuertasId() === null) {
            $this->_logger->log('The value for PuertasId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'puertasId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPuertasId())
        );
    }
}
