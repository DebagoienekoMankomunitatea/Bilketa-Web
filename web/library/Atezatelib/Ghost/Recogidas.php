<?php

class Atezatelib_Ghost_Recogidas extends KlearMatrix_Model_Field_Ghost_Abstract
{
    public function getGradoLlenado($model)
    {
        if ($model->getGradoLlenado()) {
            
            return $model->getGradoLlenado().'%';
            
        } else {
            return '-';
        }
    }
    
    public function getOrderGradoLlenado()
    {
        return 'gradoLlenado';
    }
    
    
}