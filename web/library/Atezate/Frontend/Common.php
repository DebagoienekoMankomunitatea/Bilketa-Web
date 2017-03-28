<?php
namespace Atezate\Frontend;
abstract class Common
{
    /**
     * @var Atezate\Frontend\Status
     */
    protected $_status;

    protected $_mapperClassName;
    protected $_filterClassName;
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
        $this->_filterClassName = 'Atezate\\Frontend\\Filter\\' . $tableName;

        $this->_mapper = new $mapperClassName;
    }

    public function setError($code, $errorMessage = null)
    {
        $this->_status->setCode($code, $errorMessage);
    }

    private function _resetResults()
    {
        $this->_numTotalResultados = null;
        $this->_resultados = null;

        return $this;
    }

    protected function _getFilterClassName()
    {
        return $this->_filterClassName;
    }

    protected function _objectToArray($results)
    {
        if (is_object($results)) {
            $results = array($results);
        }

        if (! is_array($results) || ! isset($results[0])) {

            return array();
        }

        $parserClass = $this->_getFilterClassName();

        if (@class_exists($parserClass)) {

            $parser = new $parserClass;
            return $parser->toArray($results);

        } else {

            foreach ($results as $key => $val) {
                $results[$key] = $val->toArray();
            }
        }

        return $results;
    }
}
