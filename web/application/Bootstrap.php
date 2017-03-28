<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initControllerFastagi()
    {
        Zend_Controller_Action_HelperBroker::addPrefix('Atezate_Controller_Helper');

        Zend_Controller_Action_HelperBroker::addHelper(
            new Atezate_Controller_Helper_Fastagi()
        );
    }
}

