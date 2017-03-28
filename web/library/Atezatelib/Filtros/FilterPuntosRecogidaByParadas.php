<?php
use Atezate\Mapper\Sql\TurnosRelCamiones as turnosRelCamionesMapper;
use Atezate\Mapper\Sql\Turnos as turnosMapper;

class Atezatelib_Filtros_FilterPuntosRecogidaByParadas extends Atezatelib_Filtros_FilterAbstract
{
    protected $_condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        //Get Action
        $currentAction = $routeDispatcher->getActionName();

        //Get Controller
        $currentController = $routeDispatcher->getControllerName();
        
        $currentItemName = $routeDispatcher->getCurrentItemName();

        $parentId = $routeDispatcher->getParam("parentId", false);
        
        if ($parentId && ($currentItemName == 'paradasNew_screen' || $currentItemName == 'paradasEdit_screen')) {
            
            $puntosRecogidas = $this->getPuntosRecogidaByParadas($parentId);
    
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

    public function getPuntosRecogidaByParadas($turnosRelCamionesId)
    {
        $turnosRelCamionesMapper = new turnosRelCamionesMapper();
        $turnosRelCamiones = $turnosRelCamionesMapper->findOneByField('id',$turnosRelCamionesId);

        $turnosMapper =  new turnosMapper();
        $turno = $turnosMapper->findOneByField('turnoId',$turnosRelCamiones->getTurnoId());

        $puntosId = array();

        foreach($turno->getRuta()->getRutasRelPuntosRecogida() as $puntosRecogidas) {
            $puntosId[] = $puntosRecogidas->getPuntosRecogidaId();
        }

        return $puntosId;
    }
}