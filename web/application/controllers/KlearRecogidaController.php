<?php
use Atezate\Mapper\Sql\Turnos as TurnosMapper;

class KlearRecogidaController extends Zend_Controller_Action
{
    protected $_mainRouter;
 
    public function init()
    {
        // Nos aseguramos que este controlador se ejecuta sólamente desde klear!
        $this->_mainRouter = $this->getRequest()->getUserParam("mainRouter");
        
        if (!$this->_mainRouter) {
            throw new Zend_Exception('Acces not allowed', Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION);
        }
        
        //Inicia el contenido en Json
        $this->_helper->ContextSwitch()
        ->addActionContext('index', 'json')
        ->initContext('json');
    }
 
    public function indexAction()
    {
        $idTurno = $this->_mainRouter->getParam('pk');
        
        $turnosMapper = new TurnosMapper();
        
        $turno =  $turnosMapper->findOneByField('turnoId', $idTurno);
        
        if ($turno) {
            $datos = $turno;
    
            $data = array(
                    'title' => 'Turno '.$turno->getFecha().' '.$turno->getHoraInicio().' '.$turno->getHoraFinal(),
                    'message' => $this->crearInforme($datos),
                    'buttons' => array(
                            'OK' => array(
                                    'recall' => false,
                            ),
                    ),
                    'options' => array(
                            'width' => 600
                    )
            );
        } else {
            $data = array(
                    'title' => $this->_helper->translate('Cliente Eliminado'),
                    'message' => $this->_helper->translate('Los datos del cliente fueron eliminados.'),
                    'buttons' => array(
                            'OK' => array(
                                    'recall' => false,
                                    'reloadParent' => true
                            )
                    )
            );
        }
    
        //Inicia los plugins de KlearMatrix
        $jsonResponse = new Klear_Model_DispatchResponse();
        $jsonResponse->setModule('klearMatrix');
        $jsonResponse->setPlugin('klearMatrixGenericDialog');
        $jsonResponse->addJsFile('/js/plugins/jquery.klearmatrix.genericdialog.js');
        $jsonResponse->addCssFile('/../styles/klearCustom.css');
        $jsonResponse->setData($data);
        $jsonResponse->attachView($this->view);
    }
    
    protected function crearInforme($datos)
    {
        $view = new Zend_View();
        $view->assign('datos', $datos);
    
        $view->setBasePath(APPLICATION_PATH . '/views');
        
        return $view->render('plantilla/informe.phtml');
    }
}