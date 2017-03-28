<?php
use Atezate\Mapper\Sql\Paradas as paradasMapper;

abstract class Atezate_Model_FilterAbstract implements KlearMatrix_Model_Field_Select_Filter_Interface
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