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
 * 
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class MunicipiosRelCodigosPostales extends ModelAbstract
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
    protected $_codigoPostalId;


    /**
     * Parent relation MunicipiosRelCodigosPostales_ibfk_1
     *
     * @var \Atezate\Model\Raw\Municipios
     */
    protected $_Municipio;

    /**
     * Parent relation MunicipiosRelCodigosPostales_ibfk_2
     *
     * @var \Atezate\Model\Raw\CodigosPostales
     */
    protected $_CodigoPostal;



    protected $_columnsList = array(
        'id'=>'id',
        'municipioId'=>'municipioId',
        'codigoPostalId'=>'codigoPostalId',
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
            'MunicipiosRelCodigosPostalesIbfk1'=> array(
                    'property' => 'Municipio',
                    'table_name' => 'Municipios',
                ),
            'MunicipiosRelCodigosPostalesIbfk2'=> array(
                    'property' => 'CodigoPostal',
                    'table_name' => 'CodigosPostales',
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
     * @return \Atezate\Model\Raw\MunicipiosRelCodigosPostales
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
     * @return \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     */
    public function setMunicipioId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @return \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     */
    public function setCodigoPostalId($data)
    {

        if ($this->_codigoPostalId != $data) {
            $this->_logChange('codigoPostalId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_codigoPostalId = $data;
        } else if (!is_null($data)) {
            $this->_codigoPostalId = (int) $data;
        } else {
            $this->_codigoPostalId = $data;
        }
        return $this;
    }

    /**
     * Gets column codigoPostalId
     *
     * @return int
     */
    public function getCodigoPostalId()
    {
            return $this->_codigoPostalId;
    }


    /**
     * Sets parent relation Municipio
     *
     * @param \Atezate\Model\Raw\Municipios $data
     * @return \Atezate\Model\Raw\MunicipiosRelCodigosPostales
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

        $this->_setLoaded('MunicipiosRelCodigosPostalesIbfk1');
        return $this;
    }

    /**
     * Gets parent Municipio
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Municipios
     */
    public function getMunicipio($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCodigosPostalesIbfk1';

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
     * Sets parent relation CodigoPostal
     *
     * @param \Atezate\Model\Raw\CodigosPostales $data
     * @return \Atezate\Model\Raw\MunicipiosRelCodigosPostales
     */
    public function setCodigoPostal(\Atezate\Model\Raw\CodigosPostales $data)
    {
        $this->_CodigoPostal = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setCodigoPostalId($primaryKey);
        }

        $this->_setLoaded('MunicipiosRelCodigosPostalesIbfk2');
        return $this;
    }

    /**
     * Gets parent CodigoPostal
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\CodigosPostales
     */
    public function getCodigoPostal($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'MunicipiosRelCodigosPostalesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_CodigoPostal = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_CodigoPostal;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\MunicipiosRelCodigosPostales
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\MunicipiosRelCodigosPostales')) {

                $this->setMapper(new \Atezate\Mapper\Sql\MunicipiosRelCodigosPostales);

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
     * @return null | \Atezate\Model\Validator\MunicipiosRelCodigosPostales
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\MunicipiosRelCodigosPostales')) {

                $this->setValidator(new \Atezate\Validator\MunicipiosRelCodigosPostales);
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
     * @see \Mapper\Sql\MunicipiosRelCodigosPostales::delete
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
