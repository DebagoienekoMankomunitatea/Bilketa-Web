<?php

use Atezate\Mapper\Sql\CentrosEmergencia as CentroEmergenciaMapper;

class Atezatelib_Filtros_FilterMunicipiosCentroEmergencia extends Atezatelib_Filtros_FilterAbstractList
{

    protected $_conditions = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        //Get Action
        $currentAction = $routeDispatcher->getActionName();
        
        //Get Controller
        $currentController = $routeDispatcher->getControllerName();
        
        //Depending the action we are, we can fetch ours row ID or it's parent's ID as follows
        
        $municipios = $this->getCentroEmergencia();
        
        if (count($municipios) > 0) {
            $this->_conditions[] = $this->_quoteInto('municipioId')." IN (" . implode(",", $municipios) . ")";
        }
    }

    public function getCondition()
    {
        if(count($this->_conditions) > 0) {
            return '(' . implode(' AND ', $this->_conditions) . ')';
        } else {
            return 'false';
        }
    }
    
    public function getCentroEmergencia()
    {
        $CentroEmergenciaMapper = new CentroEmergenciaMapper();
        
        $centrosEmergencia = $CentroEmergenciaMapper->fetchAll();
        
        $municipios = array();
        
        foreach ($centrosEmergencia as $centroEmergencia) {
            
            $municipioId = $centroEmergencia->getPuntoRecogida()->getMunicipioId();
            
            if ($municipioId) {
                $municipios[$municipioId] = $municipioId;
            }
        }
        
        return $municipios;
    }

} 