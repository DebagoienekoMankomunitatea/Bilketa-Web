<?php

use Atezate\Mapper\Sql\Incidencias as IncidenciasMapper;
use Atezate\Mapper\Sql\TiposIncidencias as TiposIncidenciasMapper;

class Atezatelib_Ghost_Incidencias extends KlearMatrix_Model_Field_Ghost_Abstract
{
    public function getGravedadIncidencia($model)
    {
        if ($model->getTipoId()) {
            
            return ucfirst($model->getTipo()->getGravedad());
            
        } else {
            return '-';
        }
    }
    
    public function getSearchConditionsGravedad($values, $searchOps, $model)
    {
        $conditions = array();
    
        foreach ($values as $idx => $value) {
            $conditions[] = "gravedad like '%".$value."%'";
        }
    
        $tiposIncidenciasMapper = new TiposIncidenciasMapper();
    
        $tiposIncidencias = $tiposIncidenciasMapper->fetchList(implode(' AND ' ,$conditions));
    
        $tipoIncidenciaId = array();
    
        
        if ($tiposIncidencias) {
    
            foreach ($tiposIncidencias as $tipoIncidencia) {
                
                $tipoIncidenciaId[] = 'tipoId = '.$tipoIncidencia->getTipoId();
    
            }
        }
    
        if (count($tipoIncidenciaId) == 0) {
            return 'false';
        }
    
        return "(" . implode(' or ' ,$tipoIncidenciaId) . ")";
    }
    
    public function getOrderForTipo() {
        return 'tipoId';
    }

    
    
    public function getEntidadIncidencia($model)
    {
        if ($model->getEntidad() == 'cubo') {
            
            if ($model->getCubo()) {
                return $model->getCubo()->getRfid();
            } else {
                return '-';
            }
            
        } elseif ($model->getEntidad() == 'poste') {
            
            if ($model->getPostes()) {
                return $model->getPostes()->getPostesIden();
            } else {
                return '-';
            }
            
        } elseif ($model->getEntidad() == 'compostador') {
            
            if ($model->getCompostador()) {
                return $model->getCompostador()->getCompostadoresIden();
            } else {
                return '-';
            }
            
        } elseif ($model->getEntidad() == 'camion') {
            
            if ($model->getCamion()) {
                return $model->getCamion()->getMatricula();
            } else {
                return '-';
            }
            
        } elseif ($model->getEntidad() == 'puntoRecogida') {
            
            if ($model->getPuntoRecogida()) {
                return $model->getPuntoRecogida()->getNombreDescriptivo();
            } else {
                return '-';
            }
            
        } elseif ($model->getEntidad() == 'contribuyente') {
            
            if ($model->getContribuyente()) {
                return $model->getContribuyente()->getNif();
            } else {
                return '-';
            }
            
        } else {
            
            return '-';
            
        }
    }
    
    public function getSearchConditionsEntidad($values, $searchOps, $model)
    {
        $incidenciaMapper = new IncidenciasMapper();
        
        $incidencias = $incidenciaMapper->fetchAll();
        
        $incidenciaId = array();
        
        foreach ($incidencias as $incidencia) {
            $conditions = array();

            $entidad = $incidencia->getEntidad();
            
            $id = $incidencia->getIncidenciaId();
            
            $tomarId = false;
            
            if ($entidad == 'cubo') {
                
                $data = $incidencia->getCubo()->getRfid();
            } elseif ($entidad == 'poste') {

                $data = $incidencia->getPostes()->getPostesIden();
            } elseif ($entidad == 'compostador') {
                
                $data = $incidencia->getCompostador()->getCompostadorIden();
            } elseif ($entidad == 'camion') {
                
                $data = $incidencia->getCamion()->getMatricula();
            } elseif ($entidad == 'puntoRecogida') {
                
                $data = $incidencia->getPuntoRecogida()->getNombreDescriptivo();
            } else {
                
                $data = $incidencia->getContribuyente()->getNif();
            }
            
            if ($data) {
                foreach ($values as $idx => $value) {
                    
//                     $cadena = "Sin León no hubiera España";
//                     $buscar = "León";
//                     $resultado = strpos($cadena, $value);
                    
//                     if($resultado !== FALSE){
//                         echo "La subcadena '$buscar' fue encontrada dentro de la cadena '$cadena' en la posición: '$resultado'";
//                     } else {
//                         echo 'No encontrado';
//                     }
                    
//                     exit;
                    
//                     $pos = strpos($data, $value);
    
//                     if ($pos !== false) {
//                         var_dump('hola prueba');
//                         exit;
//                     }
                }
                
            }
            
            var_dump($data);
            
//             if ($tomarId) {
//                 $incidenciaId[] = 'incidenciaId = '.$incidencia->getIncidenciaId();
//             }
            
        }
        
        exit;
        
        if (count($incidenciaId) > 0) {
            return "(" . implode(' or ' ,$incidenciaId) . ")";
        }
        
        return 'false';
    }
    
    
    public function getEstado($model)
    {
        if ($model->getSolucionada() == 'si') {
            return 'Solucionada';
        } elseif ($model->getSolucionada () == 'automatico') {
            return 'Automatizada';
        } else {
            return 'Pendiente';
        }
    }
    
    public function getOrderForEstado() {
        return 'solucionada';
    }
}