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
class LogEmails extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_emailMensajeId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_asunto;

    /**
     * Database var type mediumtext
     *
     * @var text
     */
    protected $_mensaje;

    /**
     * Database var type timestamp
     *
     * @var string
     */
    protected $_createdOn;

    /**
     * Este campo se tratará como NOT NULL a nivel de aplicación
     * Database var type mediumint
     *
     * @var int
     */
    protected $_incidenciaId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_email;


    /**
     * Parent relation LogEmails_ibfk_3
     *
     * @var \Atezate\Model\Raw\Incidencias
     */
    protected $_Incidencia;



    protected $_columnsList = array(
        'emailMensajeId'=>'emailMensajeId',
        'asunto'=>'asunto',
        'mensaje'=>'mensaje',
        'createdOn'=>'createdOn',
        'incidenciaId'=>'incidenciaId',
        'email'=>'email',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'incidenciaId'=> array(''),
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'eu'));

        $this->setParentList(array(
            'LogEmailsIbfk3'=> array(
                    'property' => 'Incidencia',
                    'table_name' => 'Incidencias',
                ),
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
            'createdOn' => 'CURRENT_TIMESTAMP',
            'email' => '',
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
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setEmailMensajeId($data)
    {

        if ($this->_emailMensajeId != $data) {
            $this->_logChange('emailMensajeId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_emailMensajeId = $data;
        } else if (!is_null($data)) {
            $this->_emailMensajeId = (int) $data;
        } else {
            $this->_emailMensajeId = $data;
        }
        return $this;
    }

    /**
     * Gets column emailMensajeId
     *
     * @return int
     */
    public function getEmailMensajeId()
    {
            return $this->_emailMensajeId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setAsunto($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_asunto != $data) {
            $this->_logChange('asunto');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_asunto = $data;
        } else if (!is_null($data)) {
            $this->_asunto = (string) $data;
        } else {
            $this->_asunto = $data;
        }
        return $this;
    }

    /**
     * Gets column asunto
     *
     * @return string
     */
    public function getAsunto()
    {
            return $this->_asunto;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setMensaje($data)
    {

        if ($this->_mensaje != $data) {
            $this->_logChange('mensaje');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_mensaje = $data;
        } else if (!is_null($data)) {
            $this->_mensaje = (string) $data;
        } else {
            $this->_mensaje = $data;
        }
        return $this;
    }

    /**
     * Gets column mensaje
     *
     * @return text
     */
    public function getMensaje()
    {
            return $this->_mensaje;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string|Zend_Date $date
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setCreatedOn($data)
    {

        if ($data == '0000-00-00 00:00:00') {
            $data = null;
        }

        if ($data === 'CURRENT_TIMESTAMP' || is_null($data)) {
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


        if ($this->_createdOn != $data) {
            $this->_logChange('createdOn');
        }


        $this->_createdOn = $data;
        return $this;
    }

    /**
     * Gets column createdOn
     *
     * @param boolean $returnZendDate
     * @return Zend_Date|null|string Zend_Date representation of this datetime if enabled, or ISO 8601 string if not
     */
    public function getCreatedOn($returnZendDate = false)
    {
    
        if (is_null($this->_createdOn)) {

            return null;
        }

        if ($returnZendDate) {
            $zendDate = new \Zend_Date($this->_createdOn->getTimestamp(), \Zend_Date::TIMESTAMP);
            $zendDate->setTimezone('UTC');
            return $zendDate;
        }


        return $this->_createdOn->format('Y-m-d H:i:s');

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setIncidenciaId($data)
    {

        if ($this->_incidenciaId != $data) {
            $this->_logChange('incidenciaId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_incidenciaId = $data;
        } else if (!is_null($data)) {
            $this->_incidenciaId = (int) $data;
        } else {
            $this->_incidenciaId = $data;
        }
        return $this;
    }

    /**
     * Gets column incidenciaId
     *
     * @return int
     */
    public function getIncidenciaId()
    {
            return $this->_incidenciaId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setEmail($data)
    {

        if ($this->_email != $data) {
            $this->_logChange('email');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_email = $data;
        } else if (!is_null($data)) {
            $this->_email = (string) $data;
        } else {
            $this->_email = $data;
        }
        return $this;
    }

    /**
     * Gets column email
     *
     * @return string
     */
    public function getEmail()
    {
            return $this->_email;
    }


    /**
     * Sets parent relation Incidencia
     *
     * @param \Atezate\Model\Raw\Incidencias $data
     * @return \Atezate\Model\Raw\LogEmails
     */
    public function setIncidencia(\Atezate\Model\Raw\Incidencias $data)
    {
        $this->_Incidencia = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['incidenciaId'];
        }

        if (!is_null($primaryKey)) {
            $this->setIncidenciaId($primaryKey);
        }

        $this->_setLoaded('LogEmailsIbfk3');
        return $this;
    }

    /**
     * Gets parent Incidencia
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \Atezate\Model\Raw\Incidencias
     */
    public function getIncidencia($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LogEmailsIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Incidencia = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Incidencia;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return Atezate\Mapper\Sql\LogEmails
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\Atezate\Mapper\Sql\LogEmails')) {

                $this->setMapper(new \Atezate\Mapper\Sql\LogEmails);

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
     * @return null | \Atezate\Model\Validator\LogEmails
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\Atezate\\Validator\LogEmails')) {

                $this->setValidator(new \Atezate\Validator\LogEmails);
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
     * @see \Mapper\Sql\LogEmails::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getEmailMensajeId() === null) {
            $this->_logger->log('The value for EmailMensajeId cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'emailMensajeId = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getEmailMensajeId())
        );
    }
}
