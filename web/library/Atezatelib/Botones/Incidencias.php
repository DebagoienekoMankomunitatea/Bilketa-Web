<?php
use Atezate\Mapper\Sql\Incidencias as IncidenciasMapper;

class Atezatelib_Botones_Incidencias implements \KlearMatrix_Model_Interfaces_ParentOptionCustomizer
{
    /**
     * @var KlearMatrix_Model_RouteDispatcher
     */
    protected $_mainRouter = null;

    /**
     * @var array
     */
    protected $_mainRouterOriginalParams = null;

    /**
     * @var KlearMatrix_Model_Option_Abstract
     */
    protected $_option = null;

    protected $_resultWrapper = 'div';
    protected $_cssClass = 'hidden';

    public function __construct(\Zend_Config $configuration)
    {
        $front = \Zend_Controller_Front::getInstance();
        $this->_mainRouter = $front->getRequest()->getUserParam("mainRouter");
        $this->_mainRouterOriginalParams = $this->_mainRouter->getParams();
    }

    public function setOption (\KlearMatrix_Model_Option_Abstract $option)
    {
        $this->_option = $option;
    }

    /**
     * @return KlearMatrix_Model_ParentOptionCustomizer_Response
     */
    public function customize($parentModel)
    {
        /* **NUESTRO CÓDIGO A IMPLEMENTAR** */

        $tipo = $parentModel->getTipo();

        if (!$tipo || $tipo->getResolucionAutomatica() === 0) {
             /* Para no mostrarlo iniciamos una respuesta vacía */
            $response = new \KlearMatrix_Model_ParentOptionCustomizer_Response();
            $response->setParentWrapper($this->_resultWrapper)
                ->setParentCssClass($this->_cssClass);

            return $response;
        }

        return null;

    }

}