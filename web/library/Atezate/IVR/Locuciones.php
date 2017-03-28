<?php
namespace Atezate\IVR;
class Locuciones
{
    protected $_locuciones = array();

    public function __construct(array $locuciones = array())
    {
        foreach ($locuciones as $value => $type) {
            $className = '\\Atezate\\IVR\\Locucion\\' . ucfirst($type);

            /*if (! class_exists($class)) {
                throw new \Exception("Unkown class " . $className);
            }*/

            $this->addLocucion(new $className($value));
        }
    }

    public function isComposed()
    {
        return count($this->_locuciones) > 1;
    }

    public function setLocuciones(array $locuciones)
    {
        $this->_resetLocuciones();
        foreach ($locuciones as $locucion) {
            $this->addLocucion($locucion);
        }
    }

    public function addLocucion(\Atezate\IVR\Locucion\LocucionInterface $locucion)
    {
        $this->_locuciones[] = $locucion;
    }

    public function getLocuciones()
    {
        return $this->_locuciones;
    }

    public function getLocucion()
    {
        return reset($this->_locuciones);
    }

    protected function _resetLocuciones()
    {
        $this->_locuciones = array();
    }
}
