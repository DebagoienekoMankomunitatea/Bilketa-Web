<?php

/**
 * Application Model Mapper
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 * @copyright ZF model generator Rev. 149

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Atezate\Model\Incidencias
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 */
namespace Atezate\Mapper\Sql;
class Incidencias extends Raw\Incidencias
{
    /**
     * Saves current row
     * @return boolean If the save action was successful
     */
    public function save(\Atezate\Model\Raw\Incidencias $model)
    {
        $new = is_null($model->getIncidenciaId());
        
        if (!$new || (! isset($_GET['file']) || $_GET['file'] != 'RutasList')) {
            $response = parent::save($model);
            if ($new && $model->getEntidad() == 'contribuyente') {

                $gestionIncidencias = new \Atezate\Incidencias;
                $gestionIncidencias->setIdIncidencia($response);
                $gestionIncidencias->gestionarIncidenciaAutomatica();
            }

            return $response;
        }
//         } elseif (!$new && ($model->getSolucionada() == 'automatico')) {
//             $model->setSolucionada('no');
//         }

        $recogida = $model->getRecogidas();

        $classOrigen = get_class($model);
        $classResultado = get_class($recogida);

        $model->setTipo($recogida->getTipos());
        $model->setCuboId($recogida->getCuboId());
        $model->setPostesId($recogida->getPosteId());
        $model->setCompostadorId($recogida->getCompostadorId());

        $result = parent::_save($model, false, false);
    }
}
