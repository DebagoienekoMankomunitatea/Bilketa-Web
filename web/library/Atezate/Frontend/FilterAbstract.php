<?php
/**
* Calculator - sample class to expose via JSON-RPC
*/
namespace Atezate\Frontend;
abstract class FilterAbstract
{
    protected $_commonBlacklist = array();
    protected $_insertBlackList = array();
    protected $_updateBlackList = array();

    /**
     * acepted values:
     * 	- boolean
     *  - integer
     *  - float
     *  - string
     */
    protected $_fieldDataTyping = array();

    /**
     * @return boolean
     */
    public function isValidInsertField($fieldName)
    {
        return !in_array($fieldName, ($this->_insertBlackList+$this->_commonBlacklist));
    }

    /**
     * @return boolean
     */
    public function isValidUpdateField($fieldName)
    {
        return !in_array($fieldName, ($this->_updateBlackList+$this->_commonBlacklist));
    }

    public function cleanValue($fieldName, $value)
    {
        if (! array_key_exists($fieldName, $this->_fieldDataTyping)) {

            return $value;
        }

        switch ($this->_fieldDataTyping[$fieldName])
        {
            case 'boolean':

                return (bool) $value;
                break;

            case 'integer':

                return intval($value);
                break;

            case 'float':

                return floatval($value);
                break;
        }

        return $value;
    }
}
