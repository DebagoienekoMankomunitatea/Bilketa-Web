<?php
class Goldsense_Model_FilterProducts extends Atezatelib_Filtros_FilterAbstract
{
    protected $condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        $currentAction = $routeDispatcher->getActionName();
        $currentController = $routeDispatcher->getControllerName();
        if ( $currentAction == 'index' && $currentController == 'edit') {
            $this->_condition[] = "(". $this->_quoteInto('id') . " != '" . $routeDispatcher->getParam("pk") . "')";
        }

        $this->_condition[] = "(" . $this->_quoteInto('productType') ." = 'product')";
    }

    public function getCondition()
    {
        if (count($this->_condition) > 0) {
            return '(' . implode(" AND ", $this->_condition) . ')';
        }
        return 'false';
    }
}
