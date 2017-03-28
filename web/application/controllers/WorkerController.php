<?php
class WorkerController extends Zend_Controller_Action
{
    public function init()
    {
        Zend_Json::$useBuiltinEncoderDecoder = false;
    }

    public function encoderAction()
    {
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
        \Iron_Gearman_Manager::runWorker("encoder");
    }

    public function importadorAction()
    {
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
        \Iron_Gearman_Manager::runWorker("importador");
    }

    public function importadorCubosAction()
    {
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
        \Iron_Gearman_Manager::runWorker("importadorCubos");
    }
}
