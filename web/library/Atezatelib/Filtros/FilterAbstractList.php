<?php

abstract class Atezatelib_Filtros_FilterAbstractList implements KlearMatrix_Model_Interfaces_FilterList
{
    protected $_dbAdapter = null;

    public function __construct()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        if ($dbAdapter) {
           $this->_dbAdapter = $dbAdapter;
        }

        $this->_init();
    }

    protected function _quoteInto($fieldName)
    {
        if ($this->_dbAdapter) {

           return $this->_dbAdapter->quoteIdentifier($fieldName);
        }

        return $fieldName;
    }

    protected function _init() {}
}