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
class CompostadoresRelContribuyentes extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_idRel;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_compostadoresId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_contribuyenteId;


    /**
     * Parent relation CompostadoresRelContribuyentes_ibfk_1
     *
     * @var \Atezate\Model\Raw\Contribuyentes
     */
    protected $_Contribuyente;

    /**
     * Parent relation CompostadoresRelContribuyentes_ibfk_2
     *
     * @var \Atezate\Model\Raw\Compostadores
     */
    protected $_Compostadores;



    protected $_columnsList = array(
        'idRel'=>'idRel',
        'compostadoresId'=>'compostadoresId',
        'contribuyenteId'=>'contribuyenteId',
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
            'CompostadoresRelContribuyentesIbfk1'=> array(
                    'property' => 'Contribuyente',
                    'table_name' => 'Contribuyentes',
                ),
            'CompostadoresRelContribuyentesIbfk2'=> array(
                    'property' => 'Compostadores',
                    'table_name' => 'Compostadores',
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
     * @return \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function setIdRel($data)
    {

        if ($this->_idRel != $data) {
            $this->_logChange('idRel');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_idRel = $data;
        } else if (!is_null($data)) {
            $this->_idRel = (int) $data;
        } else {
            $this->_idRel = $data;
        }
        return $this;
    }

    /**
     * Gets column idRel
     *
     * @return int
     */
    public function getIdRel()
    {
            return $this->_idRel;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function setCompostadoresId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

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
     * @param int $data
     * @return \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function setContribuyenteId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_contribuyenteId != $data) {
            $this->_logChange('contribuyenteId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_contribuyenteId = $data;
        } else if (!is_null($data)) {
            $this->_contribuyenteId = (int) $data;
        } else {
            $this->_contribuyenteId = $data;
        }
        return $this;
    }

    /**
     * Gets column contribuyenteId
     *
     * @return int
     */
    public function getContribuyenteId()
    {
            return $this->_contribuyenteId;
    }


    /**
     * Sets parent relation Contribuyente
     *
     * @param \Atezate\Model\Raw\Contribuyentes $data
     * @return \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function setContribuyente(\Atezate\Model\Raw\Contribuyentes $data)
    {
        $this->_Contribuyente = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['contribuyenteId'];
        }

        if (!is_null($primaryKey)) {
            $this->setContribuyenteId($primaryKey);
        }

        $this->_setLoaded('CompostadoresRelContribuyentesIbfk1');
        return $this;
    }

    /**
     * Gets parent Contribuyente
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Contribuyentes
     */
    public function getContribuyente($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CompostadoresRelContribuyentesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Contribuyente = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Contribuyente;
    }

    /**
     * Sets parent relation Compostadores
     *
     * @param \Atezate\Model\Raw\Compostadores $data
     * @return \Atezate\Model\Raw\CompostadoresRelContribuyentes
     */
    public function setCompostadores(\Atezate\Model\Raw\Compostadores $data)
    {
        $this->_Compostadores = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['compostadoresId'];
        }

        if (!is_null($primaryKey)) {
            $this->setCompostadoresId($primaryKey);
        }

        $this->_setLoaded('CompostadoresRelContribuyentesIbfk2');
        return $this;
    }

    /**
     * Gets parent Compostadores
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Compostadores
     */
    public function getCompostadores($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'CompostadoresRelContribuyentesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Compostadores = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Compostadores;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\CompostadoresRelContribuyentes
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\CompostadoresRelContribuyentes')) {

                $this->setMapper(new \Atezate\Mapper\Sql\CompostadoresRelContribuyentes);

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
     * @return null | \Atezate\Model\Validator\CompostadoresRelContribuyentes
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\CompostadoresRelContribuyentes')) {

                $this->setValidator(new \Atezate\Validator\CompostadoresRelContribuyentes);
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
     * @see \Mapper\Sql\CompostadoresRelContribuyentes::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getIdRel() === null) {
            $this->_logger->log('The value for IdRel cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'idRel = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getIdRel())
        );
    }
}
