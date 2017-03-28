<?php
use Atezate\Mapper\Sql\Incidencias as incidenciaMapper;

class Atezatelib_Filtros_FilterTelefonoByContribuyente extends Atezatelib_Filtros_FilterAbstract
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
        
        
        if ($parentId && (($currentItemName == 'llamadasContribuyenteNew_screen') || ($currentItemName == 'llamadasContribuyenteEdit_screen'))) {
            
            $idTelefonos = $this->getTelefonosByContribuyente($parentId);

            if (count($idTelefonos) > 0) {
                //To add a condition
                $this->_condition[] = $this->_quoteInto('telefonoId') . " IN (".implode(",", $idTelefonos).")";
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

    public function getTelefonosByContribuyente($incidenciaId)
    {
        $incidenciaMapper = new incidenciaMapper();
        
        $incidencia = $incidenciaMapper->findOneByField('incidenciaId',$incidenciaId);
        
        $contribuyente = $incidencia->getContribuyente();
        
        $telefonosList = array();
        
        if ($contribuyente) {
            
            $telefonos = $contribuyente->getTelefonos();
            
            if (count($telefonos)) {
                foreach ($telefonos as $telefono) {
                    $telefonosList[] = $telefono->getTelefonoId();
                }
            }
        }
        
        return $telefonosList;
    }
}