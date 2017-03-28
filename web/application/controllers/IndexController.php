<?php
use Atezate\Model as Model;
use Atezate\Mapper\Sql as Mapper;

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender();

        $server = new Zend_Json_Server();
        $server->setClass('Atezate\\Frontend');

        if ('GET' == $_SERVER['REQUEST_METHOD']) {

            // Hang if we're asked to
            if(array_key_exists('hang', $_REQUEST)) {
                sleep((int)$_REQUEST['hang']);
            }

            // Indicate the URL endpoint, and the JSON-RPC version used:
            $server->setTarget($this->view->url())
                   ->setEnvelope(Zend_Json_Server_Smd::ENV_JSONRPC_2);

            // Grab the SMD
            $smd = $server->getServiceMap();

            // Return the SMD to the client
            header('Content-Type: application/json');
            echo $smd;
            return;
        }

        try {

            $server->handle();

        } catch(Exception $e) {

            $err = new Zend_Json_Server_Error($e->getMessage(), $e->getCode());
            echo $err;
        }
    }

    public function wsdlTestAction()
    {
        $this->_helper->viewRenderer->setNoRender();

        $server = new Zend_Json_Server();
        $server->setClass('Atezate\\Test');

        if ('GET' == $_SERVER['REQUEST_METHOD']) {

            // Hang if we're asked to
            if(array_key_exists('hang', $_REQUEST)) {
                sleep((int)$_REQUEST['hang']);
            }

            // Indicate the URL endpoint, and the JSON-RPC version used:
            $server->setTarget($this->view->url())
                   ->setEnvelope(Zend_Json_Server_Smd::ENV_JSONRPC_2);

            // Grab the SMD
            $smd = $server->getServiceMap();

            // Return the SMD to the client
            header('Content-Type: application/json');
            echo $smd;
            return;
        }

        try {

            $server->handle();

        } catch(Exception $e) {

            $err = new Zend_Json_Server_Error($e->getMessage());
            echo $err;
        }
    }

    public function clientTestAction()
    {
        //die("checkpoint");
    }
}

