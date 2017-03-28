<?php

/**
 * Application Model Mapper
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 * @copyright ZF model generator Rev. 151

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Atezate\Model\Cubos
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 */
namespace Atezate\Mapper\Sql;
class Cubos extends Raw\Cubos
{
    /**
     * Saves current row
     * @return boolean If the save action was successful
     */
    public function save(\Atezate\Model\Raw\Cubos $model)
    {

        if ($model->getUbicacion() == 'poste') {
            $model->setPuntosRecogidaId(null);
            $model->setCentrosEmergenciaId(null);
        } elseif ($model->getUbicacion() == 'puntoRecogida') {
            $model->setPosteId(null);
            $model->setCentrosEmergenciaId(null);
        } else {
            $model->setPosteId(null);
            $model->setPuntosRecogidaId(null);
        }

        $result = parent::_save($model, false, false, null);

        return $result;

    }
}
