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
class Cubos extends Raw\Cubos
{
    protected $_fieldFakeSelectContribuyente = false;
    protected $_fieldFakeContribuyenteNombre = false;
    
    public function __construct()
    {
        parent::__construct();
        $this->_columnsList['fieldFakeSelectContribuyente'] = 'fieldFakeSelectContribuyente';
        $this->_columnsList['fieldFakeContribuyenteNombre'] = 'fieldFakeContribuyenteNombre';
    }
    
    public function getFieldFakeSelectContribuyente()
    {
        $field = $this->_fieldFakeSelectContribuyente;
    
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakeSelectContribuyente($value)
    {
        $this->_fieldFakeSelectContribuyente = $value;
    
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    public function getFieldFakeContribuyenteNombre()
    {
        $field = $this->_fieldFakeContribuyenteNombre;
        
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakeContribuyenteNombre($value)
    {
        $this->_fieldFakeContribuyenteNombre = $value;
    
        if (!is_null($value) && ($this->getFieldFakeSelectContribuyente() == 'nombre')) {
            $this->saveFieldFake($value);
        }
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    protected function saveFieldFake($value)
    {
        $this->setContribuyenteId($value);
    }
}
