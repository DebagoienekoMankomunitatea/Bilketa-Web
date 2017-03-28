<?php

/**
 * Application Model
 *
 * @package Atezate\Model
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

namespace Atezate\Model;
class Locuciones extends Raw\Locuciones
{
    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }

    protected function _initFileObjects()
    {
        $this->_esLocFso = new \Iron_Model_Fso($this, $this->getEsLocSpecs());
        $this->_euLocFso = new \Iron_Model_Fso($this, $this->getEuLocSpecs());
        $this->_esLocCodificadoFso = new \Atezate_Fso($this, $this->getEsLocCodificadoSpecs());
        $this->_euLocCodificadoFso = new \Atezate_Fso($this, $this->getEuLocCodificadoSpecs());

        return $this;
    }
}
