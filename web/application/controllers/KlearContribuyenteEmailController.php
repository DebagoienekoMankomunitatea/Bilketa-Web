<?php
use Atezate\Model\Telefonos as TelefonosModel;
use Atezate\Mapper\Sql\Telefonos as TelefonosMapper;
use Atezate\Model\Emails as EmailsModel;
use Atezate\Mapper\Sql\Emails as EmailsMapper;

class KlearContribuyenteEmailController extends Zend_Controller_Action
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
        $form = new Atezate_Form_KlearEmail();
    
        $contribuyenteId = $this->_mainRouter->getParam('pk');
        
        $emailsMapper = new EmailsMapper();
        
        $emails = $emailsMapper->fetchListToArray($this->_quoteInto('contribuyenteId')." = ".$contribuyenteId);
        
        $emailsArray = array();
        
        foreach($emails as $email) {
            $form->addElement('checkbox', 'email'.$email["emailId"], array(
                'label' => $email["email"],
                'disableHidden' => false,
                'name' => 'email'.$email["emailId"],
                'checkedValue' => $email["emailId"],
                'uncheckedValue' => 'none',
                'value' => $email["emailId"],
                'decorators' => array( array('ViewHelper'), array('Errors'), array('Label'),array('HtmlTag', array('tag' => 'div', 'class' => 'optionCheck'))),
            ));
        }
    
        if ($this->getRequest()->getParam('send')) {
            if ($form->isValid($this->_getAllParams())) {
                $buscarEmail = $emailsMapper->findOneByField(array('contribuyenteId','email'),array($contribuyenteId,$form->getValue('email')));
    
                if ($buscarEmail) {
                    $data = array(
                        'title' => $this->_helper->translate('Correo repetido'),
                        'message' => $this->_helper->translate('Esta cuenta ya se encuentra agregado en nuestra base de datos.'),
                        'buttons' => array(
                            $this->_helper->translate('Ok') => array(
                                'recall' => false,
                            ),
                        ),
                    );
                } else {
                    $emailsModel = new EmailsModel();
                    
                    $mensaje = '';
                    
                    if($form->getValue('email')) {
                        $emailsModel->setEmail($form->getValue('email'));
                        $emailsModel->setContribuyenteId($contribuyenteId);
                        $emailsModel->save();
                        
                        $mensaje = $this->_helper->translate('Email añadido:').' '.$form->getValue('email').'<br>';
                    }
                    
                    if(count($emailsArray > 0)) {
                    
                        $emailsEliminados = array();
                        
                        foreach($emails as $email) {
                            if ($form->getValue('email'.$email["emailId"]) == 'none') {
                                $emailDel = $emailsMapper->find($email["emailId"]);
                                $emailDel->delete();
                    
                                $emailsEliminados[] = '<li>'.$email["email"].'</li>';
                            }
                            
                        }
                        
                        if (count($emailsEliminados) > 0) {
                            $mensaje .= $this->_helper->translate('Borrado:').'<br>';
                    
                            $mensaje .= implode('',$emailsEliminados);
                        }
                    }
                    
                    if ($mensaje == '') {
                        $mensaje = 'Sin cambios';
                    }
                    
                    $data = array(
                        'title' => $this->_helper->translate('Emails registrados'),
                        'message' => $mensaje,
                        'buttons' => array(
                            $this->_helper->translate('Ok') => array(
                                'recall' => false,
                                'reloadParent' => true,
                            ),
                        ),
                        'options' => array(
                            'width' => 300
                        )
                    );
                }
            } else {
                $data = array(
                    'title' => $this->_helper->translate('Mensaje'),
                    'message' => $this->_helper->translate('Rellene todos los campos'),
                    'buttons' => array(
                        $this->_helper->translate('Ok') => array(
                            'recall' => false,
                            ),
                    ),
                );
            }
        } else {
            $data = array(
                'title' => $this->_helper->translate('Añadir Email'),
                'message' => $form->render(new Zend_View()),
                'buttons' => array(
                                $this->_helper->translate('Cancelar') => array(
                                                'recall' => false,
                                ),
                                $this->_helper->translate('Modificar') => array(
                                    'recall' => true,
                                    'params' => array(
                                    'send' => true
                                    )
                                ),
                ),
                'options' => array(
                                'width' => 300
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
    
    protected function _quoteInto($fieldName)
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
    
        if ($dbAdapter) {
    
            return $dbAdapter->quoteIdentifier($fieldName);
        }
    
        return $fieldName;
    }
}