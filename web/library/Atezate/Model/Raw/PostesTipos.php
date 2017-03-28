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
 * [entity] No es posible eliminar PostesTispos de los que dependan Postes
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model\Raw;
class PostesTipos extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_postesTiposId;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_columna;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_capacidad;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_caras;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_marcaPosteId;


    /**
     * Parent relation PostesTipos_ibfk_1
     *
     * @var \Atezate\Model\Raw\MarcasPoste
     */
    protected $_MarcaPoste;


    /**
     * Dependent relation Postes_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \Atezate\Model\Raw\Postes[]
     */
    protected $_Postes;


    protected $_columnsList = array(
        'postesTiposId'=>'postesTiposId',
        'columna'=>'columna',
        'capacidad'=>'capacidad',
        'caras'=>'caras',
        'marcaPosteId'=>'marcaPosteId',
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
            'PostesTiposIbfk1'=> array(
                    'property' => 'MarcaPoste',
                    'table_name' => 'MarcasPoste',
                ),
        ));

        $this->setDependentList(array(
            'PostesIbfk2' => array(
                    'property' => 'Postes',
                    'table_name' => 'Postes',
                ),
        ));


        $this->setOnDeleteSetNullRelationships(array(
            'Postes_ibfk_2'
        ));


        $this->_defaultValues = array(
            'capacidad' => '0',
            'caras' => '0',
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
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setPostesTiposId($data)
    {

        if ($this->_postesTiposId != $data) {
            $this->_logChange('postesTiposId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_postesTiposId = $data;
        } else if (!is_null($data)) {
            $this->_postesTiposId = (int) $data;
        } else {
            $this->_postesTiposId = $data;
        }
        return $this;
    }

    /**
     * Gets column postesTiposId
     *
     * @return int
     */
    public function getPostesTiposId()
    {
            return $this->_postesTiposId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setColumna($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_columna != $data) {
            $this->_logChange('columna');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_columna = $data;
        } else if (!is_null($data)) {
            $this->_columna = (string) $data;
        } else {
            $this->_columna = $data;
        }
        return $this;
    }

    /**
     * Gets column columna
     *
     * @return text
     */
    public function getColumna()
    {
            return $this->_columna;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setCapacidad($data)
    {

        if ($this->_capacidad != $data) {
            $this->_logChange('capacidad');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_capacidad = $data;
        } else if (!is_null($data)) {
            $this->_capacidad = (int) $data;
        } else {
            $this->_capacidad = $data;
        }
        return $this;
    }

    /**
     * Gets column capacidad
     *
     * @return int
     */
    public function getCapacidad()
    {
            return $this->_capacidad;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setCaras($data)
    {

        if ($this->_caras != $data) {
            $this->_logChange('caras');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_caras = $data;
        } else if (!is_null($data)) {
            $this->_caras = (int) $data;
        } else {
            $this->_caras = $data;
        }
        return $this;
    }

    /**
     * Gets column caras
     *
     * @return int
     */
    public function getCaras()
    {
            return $this->_caras;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setMarcaPosteId($data)
    {

        if ($this->_marcaPosteId != $data) {
            $this->_logChange('marcaPosteId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_marcaPosteId = $data;
        } else if (!is_null($data)) {
            $this->_marcaPosteId = (int) $data;
        } else {
            $this->_marcaPosteId = $data;
        }
        return $this;
    }

    /**
     * Gets column marcaPosteId
     *
     * @return int
     */
    public function getMarcaPosteId()
    {
            return $this->_marcaPosteId;
    }


    /**
     * Sets parent relation MarcaPoste
     *
     * @param \Atezate\Model\Raw\MarcasPoste $data
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setMarcaPoste(\Atezate\Model\Raw\MarcasPoste $data)
    {
        $this->_MarcaPoste = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setMarcaPosteId($primaryKey);
        }

        $this->_setLoaded('PostesTiposIbfk1');
        return $this;
    }

    /**
     * Gets parent MarcaPoste
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\MarcasPoste
     */
    public function getMarcaPoste($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PostesTiposIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_MarcaPoste = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_MarcaPoste;
    }

    /**
     * Sets dependent relations Postes_ibfk_2
     *
     * @param array $data An array of \Atezate\Model\Raw\Postes
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function setPostes(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_Postes === null) {

                $this->getPostes();
            }

            $oldRelations = $this->_Postes;

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

        $this->_Postes = array();

        foreach ($data as $object) {
            $this->addPostes($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations Postes_ibfk_2
     *
     * @param \Atezate\Model\Raw\Postes $data
     * @return \Atezate\Model\Raw\PostesTipos
     */
    public function addPostes(\Atezate\Model\Raw\Postes $data)
    {
        $this->_Postes[] = $data;
        $this->_setLoaded('PostesIbfk2');
        return $this;
    }

    /**
     * Gets dependent Postes_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \Atezate\Model\Raw\Postes
     */
    public function getPostes($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'PostesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_Postes = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_Postes;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\PostesTipos
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\PostesTipos')) {

                $this->setMapper(new \Atezate\Mapper\Sql\PostesTipos);

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
     * @return null | \Atezate\Model\Validator\PostesTipos
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\PostesTipos')) {

                $this->setValidator(new \Atezate\Validator\PostesTipos);
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
     * @see \Mapper\Sql\PostesTipos::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getPostesTiposId() === null) {
            $this->_logger->log('The value for PostesTiposId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'postesTiposId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getPostesTiposId())
        );
    }
}
