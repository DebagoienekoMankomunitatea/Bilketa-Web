<?php
use Atezate\Mapper\Sql\Paradas as paradasMapper;

class Atezatelib_Filtros_FilterPosteByRegister extends Atezatelib_Filtros_FilterAbstract
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
            $postes = $this->getPostesByParadas($parentId);

            if (count($postes) > 0) {
                //To add a condition
                $this->_condition[] = $this->_quoteInto('postesId') . " IN (".implode(",", $postes).")";
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

    public function getPostesByParadas($paradaId)
    {
        $paradasMapper = new paradasMapper();
        $parada = $paradasMapper->findOneByField($this->_quoteInto('paradaId'),$paradaId);

        $postes = $parada->getPuntosRecogidas()->getPostes();

        $posteList = array();

        if (count($postes)) {
            foreach ($postes as $poste) {
                $posteList[] = $poste->getPostesId();
            }
        }

        return $posteList;
    }
}