<?php

/**
 * Application Model
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Irontec
 * @copyright ZF model generator Rev. 151

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity]
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Irontec
 */

namespace Atezate\Model;
class PuntosRecogida extends Raw\PuntosRecogida
{
    protected $_rutaId;

    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
        $this->_columnsList += array(
            'rutaId' => 'rutaId',
            'posicionAddrLat'=>'posicionLat',
            'posicionAddrLng'=>'posicionLng',
        );
    }

    public function getRutaId()
    {
        return $this->_rutaId;
        //este sería el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }

    public function setRutaId($value)
    {
        $this->_rutaId = $value;
        return $value;
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
