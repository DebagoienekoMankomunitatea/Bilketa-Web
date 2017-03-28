<?php
namespace Atezate\IVR\Locucion;
class Playback implements LocucionInterface
{
    protected $_path;

    public function __construct($path = null)
    {
        if ($path) {
            $this->setPath($path);
        }
    }

    public function isDigit()
    {
        return false;
    }

    public function setPath($path)
    {
        $this->_path = $path;
    }

    public function getPath()
    {
        return $this->_path;
    }
}
