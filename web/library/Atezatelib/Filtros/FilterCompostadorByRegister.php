<?php
use Atezate\Mapper\Sql\Paradas as paradasMapper;

class Atezatelib_Filtros_FilterCompostadorByRegister extends Atezatelib_Filtros_FilterAbstract
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

        if ($parentId && (($currentItemName == 'recogidasNew_screen') || ($currentItemName == 'recogidasEdit_screen'))) {
            $compostadores = $this->getCompostadoresByParadas($parentId);

            if (count($compostadores) > 0) {
                //To add a condition
                $this->_condition[] = $this->_quoteInto('postesId') . " IN (".implode(",", $compostadores).")";
            }

        }

    }

    public function getCondition()
    {
        if (count($this->_condition) > 0) {
            return '(' . implode(" AND ", $this->_condition) . ')';
        }
        return 'false';
    }

    public function getCompostadoresByParadas($paradaId)
    {
        $paradasMapper = new paradasMapper();
        $parada = $paradasMapper->findOneByField($this->_quoteInto('paradaId'),$paradaId);

        $compostadores = $parada->getPuntosRecogidas()->getCompostadores();

        $compostadorList = array();

        if (count($compostadores)) {
            foreach ($compostadores as $compostador) {
                $compostadorList[] = $compostador->getcompostadoresId();
            }
        }

        return $compostadorList;
    }
}