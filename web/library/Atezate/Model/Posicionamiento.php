<?php

/**
 * Application Model
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Victor Vargas
 * @copyright ZF model generator Rev. 164:165

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
class Posicionamiento extends Raw\Posicionamiento
{
    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
        $this->_columnsList += array(
            'posicionAddrLat'=>'posicionLat',
            'posicionAddrLng'=>'posicionLng',
        );
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicion($data)
    {
        if ($this->_posicion != $data) {
            $this->_logChange('posicion');
        }

        if (!is_null($data) && !is_object($data)) {
            $this->_posicion = (string) $data;
        } else {
            $this->_posicion = $data;
        }
        return $this;
    }

    /**
     * Proxy setter
     * @param float $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicionAddrLat($data)
    {
        return $this->setPosicionLat($data);
    }

    /**
     * Proxy getter
     *
     * @return float
     */
    public function getPosicionAddrLat()
    {
        return $this->getPosicionLat();
    }
    

    /**
     * Proxy setter
     * @param float $data
     * @return \Atezate\Model\Raw\Posicionamiento
     */
    public function setPosicionAddrLng($data)
    {
        return $this->setPosicionLng($data);
    }

    /**
     * Proxy getter
     *
     * @return float
     */
    public function getPosicionAddrLng()
    {
        return $this->getPosicionLng();
    }
}
