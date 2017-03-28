<?php
namespace Atezate\Frontend\Request;
abstract class Common
{
    /**
     * @var Atezate\Frontend\Status
     */
    protected $_status;

    protected $_mapperClassName;
    protected $_mapper;

    /**
     * @param string table name
     */
    public function __construct($tableName)
    {
        $this->_status = new Status;

        $mapperClassName = 'Atezate\\Mapper\\Sql\\' . $tableName;
        if (! @class_exists($mapperClassName)) {
            $this->_status->setCode(501, 'Unkown entity ' . $tableName);
            return;
        }

        $this->_mapperClassName = $mapperClassName;
        $this->_mapper = new $mapperClassName;
    }

    protected function setError($code, $errorMessage = null)
    {
        $this->_status->setCode($code, $errorMessage);
    }

    private function _resetResults()
    {
        $this->_numTotalResultados = null;
        $this->_resultados = null;

        return $this;
    }
}
