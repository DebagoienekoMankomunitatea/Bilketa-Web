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
class MunicipiosRelCercania extends ModelAbstract
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
    protected $_municipioId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_municipioCercanoId;


    /**
     * Parent relation MunicipiosRelCercania_ibfk_1
     *
     * @var \Atezate\Model\Raw\Municipios
     */
    protected $_Municipio;

    /**
     * Parent relation MunicipiosRelCercania_ibfk_2
     *
     * @var \Atezate\Model\Raw\Municipios
     */
    protected $_MunicipioCercano;



    protected $_columnsList = array(
        'id'=>'id',
        'municipioId'=>'municipioId',
        'municipioCercanoId'=>'municipioCercanoId',
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
            'MunicipiosRelCercaniaIbfk1'=> array(
                    'property' => 'Municipio',
                    'table_name' => 'Municipios',
                ),
            'MunicipiosRelCercaniaIbfk2'=> array(
                    'property' => 'MunicipioCercano',
                    'table_name' => 'Municipios',
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
     * @return \Atezate\Model\Raw\MunicipiosRelCercania
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
     * @return \Atezate\Model\Raw\MunicipiosRelCercania
     */
    public function setMunicipioId($data)
    {

        if ($this->_municipioId != $data) {
            $this->_logChange('municipioId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_municipioId = $data;
        } else if (!is_null($data)) {
            $this->_municipioId = (int) $data;
        } else {
            $this->_municipioId = $data;
        }
        return $this;
    }

    /**
     * Gets column municipioId
     *
     * @return int
     */
    public function getMunicipioId()
    {
            return $this->_municipioId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\MunicipiosRelCercania
     */
    public function setMunicipioCercanoId($data)
    {

        if ($this->_municipioCercanoId != $data) {
            $this->_logChange('municipioCercanoId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_municipioCercanoId = $data;
        } else if (!is_null($data)) {
            $this->_municipioCercanoId = (int) $data;
        } else {
            $this->_municipioCercanoId = $data;
        }
        return $this;
    }

    /**
     * Gets column municipioCercanoId
     *
     * @return int
     */
    public function getMunicipioCercanoId()
    {
            return $this->_municipioCercanoId;
    }


    /**
     * Sets parent relation Municipio
     *
     * @param \Atezate\Model\Raw\Municipios $data
     * @return \Atezate\Model\Raw\MunicipiosRelCercania
     */
    public function setMunicipio(\Atezate\Model\Raw\Municipios $data)
    {
        $this->_Municipio = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['municipioId'];
        }

        if (!is_null($primaryKey)) {
            $this->setMunicipioId($primaryKey);
        }

        $this->_setLoaded('MunicipiosRelCercaniaIbfk1');
        return $this;
    }

    /**
     * Gets parent Municipio
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Municipios
     */
    public function getMunicipio($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCercaniaIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Municipio = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Municipio;
    }

    /**
     * Sets parent relation MunicipioCercano
     *
     * @param \Atezate\Model\Raw\Municipios $data
     * @return \Atezate\Model\Raw\MunicipiosRelCercania
     */
    public function setMunicipioCercano(\Atezate\Model\Raw\Municipios $data)
    {
        $this->_MunicipioCercano = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['municipioId'];
        }

        if (!is_null($primaryKey)) {
            $this->setMunicipioCercanoId($primaryKey);
        }

        $this->_setLoaded('MunicipiosRelCercaniaIbfk2');
        return $this;
    }

    /**
     * Gets parent MunicipioCercano
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Municipios
     */
    public function getMunicipioCercano($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCercaniaIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_MunicipioCercano = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_MunicipioCercano;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\MunicipiosRelCercania
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\MunicipiosRelCercania')) {

                $this->setMapper(new \Atezate\Mapper\Sql\MunicipiosRelCercania);

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
     * @return null | \Atezate\Model\Validator\MunicipiosRelCercania
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\MunicipiosRelCercania')) {

                $this->setValidator(new \Atezate\Validator\MunicipiosRelCercania);
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
     * @see \Mapper\Sql\MunicipiosRelCercania::delete
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
