<?php
class Atezate_Controller_Helper_Fastagi extends Zend_Controller_Action_Helper_Abstract
{
    public function preDispatch()
    {
        $controller = $this->getActionController();

        if (Zend_Registry::isRegistered("fastagi")) {

            $controller->fastagi = Zend_Registry::get("fastagi");
        }
    }
}
