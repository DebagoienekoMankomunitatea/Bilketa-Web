<?php

class Atezatelib_Ghost_Contribuyentes extends KlearMatrix_Model_Field_Ghost_Abstract
{
    public function getPhones($model)
    {
        if ($model->getTelefonos()) {
            
            $telefonosContribuyente = array();
            
            foreach ($model->getTelefonos() as $telefonos) {
                $telefonosContribuyente[] = '<li style="list-style: circle;">'.$telefonos->getTelefono().'</li>';
            }
            
            return '<ul>'.implode(' ',$telefonosContribuyente).'</ul>';
            
        } else {
            return '';
        }
    }
    
    public function getEmails($model)
    {
        if ($model->getEmails()) {
            
            $emailsContribuyentes = array();
    
            foreach ($model->getEmails() as $emails) {
                $emailsContribuyentes[] = '<li style="list-style: circle;">'.$emails->getEmail().'</li>';
            }
            
            return '<ul>'.implode(' ',$emailsContribuyentes).'</ul>';
    
        } else {
            return '';
        }
    }
}