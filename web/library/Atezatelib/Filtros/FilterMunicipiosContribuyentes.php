<?php
use Atezate\Mapper\Sql\Contribuyentes as contribuyentesMapper;
class Atezatelib_Filtros_FilterMunicipiosContribuyentes extends Atezatelib_Filtros_FilterAbstract
{
    protected $_condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        $currentAction = $routeDispatcher->getActionName();
        $currentController = $routeDispatcher->getControllerName();
        if ( $currentAction == 'index' && $currentController == 'edit') {
            $this->_condition[] = "(". $this->_quoteInto('municipioId') ." != '" . $routeDispatcher->getParam("pk") . "')";
            
            $municipiosContribuyentes = $this->getContribuyente();
            
            if(count($municipiosContribuyentes) > 0) {
                $this->_condition[]= $this->_quoteInto('municipioId') . " IN (".implode(",", $municipiosContribuyentes).")";
            } 
        }
        
        return 'false';
    }

    public function getCondition()
    {
        if (count($this->_condition) > 0) {
            return '(' . implode(" AND ", $this->_condition) . ')';
        }
        return 'false';
    } 
    
    public function getContribuyente()
    {
        $contribuyentesMapper = new contribuyentesMapper();
        
        $contribuyentes = $contribuyentesMapper->fetchAll();

        $municipios = array();
        
        foreach ($contribuyentes as $contribuyente) {
            if ($contribuyente->getMunicipioId() != null) {
                $municipios[$contribuyente->getMunicipioId()] = $contribuyente->getMunicipioId();
            }
        }
        
        return $municipios;
    }
}        
