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
 * Data Mapper implementation for Atezate\Model\Camiones
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 */
namespace Atezate\Mapper\Sql;
class Camiones extends Raw\Camiones
{
    protected function _save(\Atezate\Model\Raw\Camiones $model,
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
