<?php

class Atezatelib_Filtros_FilterIncidenciaCamion extends Atezatelib_Filtros_FilterAbstract
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

        if (($currentItemName == 'incidenciasEdit_screen') || ($currentItemName == 'incidenciasNew_screen')) {
            
            $this->_condition[] = "tipo = 'camion'";

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

}