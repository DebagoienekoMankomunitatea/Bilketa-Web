<?php
use Atezate\Mapper\Sql\Rutas as rutasMapper;
use Atezate\Mapper\Sql\Turnos as turnosMapper;

class Atezatelib_Filtros_FilterPuntosRecogidaByTurno extends Atezatelib_Filtros_FilterAbstract
{
    protected $_condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        //Get Action
        $currentAction = $routeDispatcher->getActionName();

        //Get Controller
        $currentController = $routeDispatcher->getControllerName();

        $currentItemName = $routeDispatcher->getCurrentItemName();

        $parentId = $routeDispatcher->getParam("parentId",false);
        
        if ($parentId && ($currentItemName == 'turnosRelCamionesNew_screen' || $currentItemName == 'turnosRelCamionesEdit_screen')) {
            
            $puntosRecogidas = $this->getPuntosRecogidaByRuta($parentId);
            
            if (count($puntosRecogidas) > 0) {
                //To add a condition
                $this->_condition[] = $this->_quoteInto('puntosRecogidaId') . " IN (".implode(",", $puntosRecogidas).")";
            }
        }
        
        return true;
    }

    public function getCondition()
    {
        if (count($this->_condition) > 0) {
            return '(' . implode(" AND ", $this->_condition) . ')';
        }
        return 'false';
    }

    public function getPuntosRecogidaByRuta($turnoId)
    {
        $turnosMapper = new turnosMapper();
        
        $turno = $turnosMapper->findOneByField('turnoId',$turnoId);
        
        $puntosId = array();

        foreach($turno->getRuta()->getRutasRelPuntosRecogida() as $puntosRecogidas) {
            
            $puntosId[] = $puntosRecogidas->getPuntosRecogidaId();
            
        }

        return $puntosId;
    }
}