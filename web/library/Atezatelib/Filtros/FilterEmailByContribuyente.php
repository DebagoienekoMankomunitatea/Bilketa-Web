<?php
use Atezate\Mapper\Sql\Contribuyentes as contribuyenteMapper;

class Atezatelib_Filtros_FilterEmailByContribuyente extends Atezatelib_Filtros_FilterAbstract
{
    protected $_condition = array();
    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        //Get Action
        $currentAction = $routeDispatcher->getActionName();

        //Get Controller
        $currentController = $routeDispatcher->getControllerName();
        
        //Get NombredelModel y su Controlador
        $currentItemName = $routeDispatcher->getCurrentItemName();

        $parentId = $routeDispatcher->getParam("parentId",false);
        
        if ($parentId && (($currentItemName == 'emailsMensajesEdit_screen') || ($currentItemName == 'emailsMensajesNew_screen'))) {
            
            $emails = $this->getEmailsByContribuyente($parentId);

            if (count($emails) > 0) {
                //To add a condition
                $this->_condition[] = $this->_quoteInto('emailId') . " IN (".implode(",", $emails).")";
            }

        }

        return true;
    }

    public function getCondition()
    {
        if (count($this->_condition) > 0) {
            return '(' . implode(" AND ", $this->_condition) . ')';
        }
        return;
    }

    public function getEmailsByContribuyente($contribuyenteId)
    {
        $contribuyenteMapper = new contribuyenteMapper();
        
        $contribuyente = $contribuyenteMapper->findOneByField('contribuyenteId',$contribuyenteId);
        
        $emailsContribuyente = $contribuyente->getEmails();
        
        $emailList = array();
        
        if (count($emailsContribuyente)) {
            foreach ($emailsContribuyente as $emails) {
                $emailList[] = $emails->getEmailId();
            } 
        }
        
        return $emailList;
    }

}