<?php
namespace Atezate\Frontend\Filter;
abstract class FilterAbstract
{
    const ITEMS_PER_PAGE = 50;

    protected $_readBlacklist = array();
    protected $_insertBlackList = array();
    protected $_updateBlackList = array();

    protected $_loadRelationships;

    /**
     * acepted values:
     *  - boolean
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
        return !in_array($fieldName, $this->_insertBlackList);
    }

    /**
     * @return boolean
     */
    public function isValidUpdateField($fieldName)
    {
        return !in_array($fieldName, $this->_updateBlackList);
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


    public function toArray($results)
    {
        if (! is_array($results)) {
            return $results->toArray();
        }

        foreach ($results as $key => $val) {
            $results[$key] = $val->toArray();
        }

        return $results;
    }
}
