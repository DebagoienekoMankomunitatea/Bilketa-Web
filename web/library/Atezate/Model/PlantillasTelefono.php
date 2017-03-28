<?php

/**
 * Application Model
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 * @copyright ZF model generator Rev. 170

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 *  [entity]
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 */

namespace Atezate\Model;
class PlantillasTelefono extends Raw\PlantillasTelefono
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
        $this->_esLocCodificadoFso = new \Atezate_Fso($this, $this->getEsLocCodificadoSpecs());
        $this->_euLocFso = new \Iron_Model_Fso($this, $this->getEuLocSpecs());
        $this->_euLocCodificadoFso = new \Atezate_Fso($this, $this->getEuLocCodificadoSpecs());

        return $this;
    }
}
