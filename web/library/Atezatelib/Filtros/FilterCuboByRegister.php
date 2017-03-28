<?php
use Atezate\Mapper\Sql\Paradas as paradasMapper;

class Atezatelib_Filtros_FilterCuboByRegister extends Atezatelib_Filtros_FilterAbstract
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
            $cubos = $this->getCubosByParadas($parentId);

            if (count($cubos) > 0) {
                //To add a condition
                $this->_condition[] = $this->_quoteInto('cuboId') . " IN (".implode(",", $cubos).")";
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

    public function getCubosByParadas($paradaId)
    {
        $paradasMapper = new paradasMapper();
        $parada = $paradasMapper->findOneByField('paradaId',$paradaId);
        $parada = $paradasMapper->findOneByField($this->_quoteInto('paradaId'),$paradaId);

        $postes = $parada->getPuntosRecogidas()->getPostes();

        $cuboList = array();

        if ($parada) {
            $postes = $parada->getPuntosRecogidas()->getPostes();

            
            if (count($postes)) {
                
                foreach ($postes as $poste) {
                    $cubos = $poste->getCubos();
                    if ($cubos) {
                        foreach ($cubos as $cubo) {
                            $cuboList[] = $cubo->getCuboId();
                        }
                    }
                }
            } 
            
        }
        
        return $cuboList;
        
    }

}