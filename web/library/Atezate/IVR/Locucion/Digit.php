<?php
namespace Atezate\IVR\Locucion;
class Digit implements LocucionInterface
{
    protected $_value;

    public function __construct($value = null)
    {
        if ($value) {
            $this->setValue($value);
        }
    }

    public function isDigit()
    {
        return true;
    }

    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->_value;
    }
}
