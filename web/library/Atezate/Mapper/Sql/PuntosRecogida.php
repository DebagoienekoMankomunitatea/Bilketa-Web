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
 * Data Mapper implementation for Atezate\Model\PuntosRecogida
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 */
namespace Atezate\Mapper\Sql;

use Atezate\Model\RutasRelPuntosRecogida as RutaslRelPuntosRecogidaModel;

class PuntosRecogida extends Raw\PuntosRecogida
{
    /**
     * Saves current row
     * @return boolean If the save action was successful
     */
    public function save(\Atezate\Model\Raw\PuntosRecogida $model)
    {
        $new = is_null($model->getPuntosRecogidaId());

        $result = parent::_save($model, false, false);

        if ($model->getRutaId() != '' && $new) {
            $RutaslRelPuntosRecogidaModel = new RutaslRelPuntosRecogidaModel();

            $RutaslRelPuntosRecogidaModel->setRutaId($model->getRutaId());
            $RutaslRelPuntosRecogidaModel->setPuntosRecogidaId($model->getPuntosRecogidaId());

            $RutaslRelPuntosRecogidaModel->save();
        }
    }

    protected function _save(\Atezate\Model\Raw\PuntosRecogida $model,
        $recursive = false, $useTransaction = true, $transactionTag = null
    )
    {
        if ($model->hasChange('posicionLat') || $model->hasChange('posicionLng')) {
            
            $lat = $model->getPosicionLat();
            $lng = $model->getPosicionLng();
            $model->setPosicion(new \Zend_Db_Expr("ST_Transform(ST_GeomFromEWKT('SRID=4326;POINT(". $lng ." ".$lat.")'),25830)"));   
        }

        return parent::_save($model, $recursive, $useTransaction, $transactionTag);
    }
}
