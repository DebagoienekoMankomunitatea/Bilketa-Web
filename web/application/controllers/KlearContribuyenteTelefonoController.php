<?php
use Atezate\Model\Telefonos as TelefonosModel;
use Atezate\Mapper\Sql\Telefonos as TelefonosMapper;
use Atezate\Model\Emails as EmailsModel;
use Atezate\Mapper\Sql\Emails as EmailsMapper;

class KlearContribuyenteTelefonoController extends Zend_Controller_Action
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
        $form = new Atezate_Form_KlearTelefono();
        
        $contribuyenteId = $this->_mainRouter->getParam('pk');
        
        $telefonosMapper = new TelefonosMapper();
        
        $telefonos = $telefonosMapper->fetchListToArray($this->_quoteInto('contribuyenteId')." = ".$contribuyenteId);
        
        $telefonosArray = array();
        
        foreach($telefonos as $telefono) {
            $form->addElement('checkbox', $telefono["telefono"], array(
                'label' => $telefono["telefono"],
                'name' => $telefono["telefono"],
                'use_hidden_element' => false,
                'checkedValue' => $telefono["telefonoId"],
                'uncheckedValue' => 'none',
                'value' => $telefono["telefonoId"],
                'decorators' => array( array('ViewHelper'), array('Errors'), array('Label'),array('HtmlTag', array('tag' => 'div', 'class' => 'optionCheck'))),
            ));
        }
        
        if ($this->getRequest()->getParam('send')) {
            if ($form->isValid($this->_getAllParams())) {
                
                $buscarTelefono = $telefonosMapper->findOneByField(array('contribuyenteId','telefono'),array($contribuyenteId,$form->getValue('telefono')));
                
                if ($buscarTelefono) {
                    $data = array(
                        'title' => $this->_helper->translate('Teléfono repetido'),
                        'message' => $this->_helper->translate('Este número de teléfono se encuentra agregado.'),
                        'buttons' => array(
                                $this->_helper->translate('Ok') => array(
                                        'recall' => false,
                                ),
                        ),
                    );
                } else {
                    $telefonosModel = new TelefonosModel();
                    
                    $mensaje = '';
                    
                    if($form->getValue('telefono')) {
                        $telefonosModel->setTelefono($form->getValue('telefono'));
                        $telefonosModel->setContribuyenteId($contribuyenteId);
                        $telefonosModel->setTipo($form->getValue('tipo'));
                        $telefonosModel->save();
                        
                        $mensaje = $this->_helper->translate('Número añadido:').' '.$form->getValue('telefono').'<br>';
                    }
                    
                    
                    if(count($telefonosArray > 0)) {
                        
                        $telefonosEliminados = array();
                        
                        foreach($telefonos as $telefono) {
                            if ($form->getValue($telefono["telefono"]) == 'none') {
                                $telefonoDel = $telefonosMapper->find($telefono["telefonoId"]);
                                $telefonoDel->delete();
                                
                                $telefonosEliminados[] = '<li>'.$telefono["telefono"].'</li>';
                            }
                        }
                        
                        if (count($telefonosEliminados) > 0) {
                            $mensaje .= $this->_helper->translate('Borrado:').'<br>';
                            
                            $mensaje .= implode('',$telefonosEliminados);
                        }
                        
                    }
                    
                    if ($mensaje == '') {
                        $mensaje = 'Sin cambios';
                    }
                    
                    $data = array(
                        'title' => $this->_helper->translate('Teléfonos registrados'),
                        'message' => $mensaje,
                        'buttons' => array(
                            $this->_helper->translate('Ok') => array(
                                'recall' => false,
                                'reloadParent' => true,
                            ),
                        ),
                        'options' => array(
                            'width' => 250
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
                'title' => $this->_helper->translate('Añadir Teléfono'),
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