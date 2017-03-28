<?php

/**
 * Application Model
 *
 * @package Atezate\Model
 * @subpackage Model
 * @author Irontec
 * @copyright ZF model generator Rev. 149

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
class Incidencias extends Raw\Incidencias
{
    protected $_fieldFakeCubo = false;
    protected $_fieldFakeCamion = false;
    protected $_fieldFakeCompostador = false;
    protected $_fieldFakeContribuyente = false;
    protected $_fieldFakePostes = false;
    protected $_fieldFakePuntosRecogida = false;
    
    public function __construct()
    {
        parent::__construct();
        $this->_columnsList['fieldFakeCubo'] = 'fieldFakeCubo';
        $this->_columnsList['fieldFakeCamion'] = 'fieldFakeCamion';
        $this->_columnsList['fieldFakeCompostador'] = 'fieldFakeCompostador';
        $this->_columnsList['fieldFakeContribuyente'] = 'fieldFakeContribuyente';
        $this->_columnsList['fieldFakePostes'] = 'fieldFakePostes';
        $this->_columnsList['fieldFakePuntosRecogida'] = 'fieldFakePuntosRecogida';
    }
    
    public function getFieldFakeCubo()
    {
        $field = $this->_fieldFakeCubo;
        
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakeCubo($value)
    {
        $this->_fieldFakeCubo = $value;
        
        if (!is_null($value)) {
            $this->saveFieldFake($value);
        }
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    public function getFieldFakeCamion()
    {
        $field = $this->_fieldFakeCamion;
    
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakeCamion($value)
    {
        $this->_fieldFakeCamion = $value;
        
        if (!is_null($value)) {
            $this->saveFieldFake($value);
        }
        
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    public function getFieldFakeCompostador()
    {
        $field = $this->_fieldFakeCompostador;
    
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakeCompostador($value)
    {
        $this->_fieldFakeCompostador = $value;
        
        if (!is_null($value)) {
            $this->saveFieldFake($value);
        }
        
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    public function getFieldFakeContribuyente()
    {
        $field = $this->_fieldFakeContribuyente;
    
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakeContribuyente($value)
    {
        $this->_fieldFakeContribuyente = $value;
        
        if (!is_null($value)) {
            $this->saveFieldFake($value);
        }
        
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    public function getFieldFakePostes()
    {
        $field = $this->_fieldFakePostes;
    
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakePostes($value)
    {
        $this->_fieldFakePostes = $value;
        
        if (!is_null($value)) {
            $this->saveFieldFake($value);
        }
        
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    public function getFieldFakePuntosRecogida()
    {
        $field = $this->_fieldFakePuntosRecogida;
    
        return $field;
        //este seria el field original, que cambiaríamos por el que se necesita en la vista y lo devolveriamos con un return
    }
    
    public function setFieldFakePuntosRecogida($value)
    {
        $this->_fieldFakePuntosRecogida = $value;
        
        if (!is_null($value)) {
            $this->saveFieldFake($value);
        }
        
        //El $value trae el valor que se le a dado en el formulario, asi lo podemos tratar y guardar de la forma que necesitamos.
        return $this;
    }
    
    protected function saveFieldFake($value)
    {
        $this->setTipoId($value);
    }
}