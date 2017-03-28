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
 * Data Mapper implementation for Atezate\Model\Municipios
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 */
namespace Atezate\Mapper\Sql;
class Municipios extends Raw\Municipios
{

    protected function _save(\Atezate\Model\Raw\Municipios $model,
        $recursive = false, $useTransaction = true, $transactionTag = null)
    {
        if ($model->hasChange('esLocBaseName') || $model->hasChange('euLocBaseName')) {
            
            $bootstrap =  \Zend_Controller_Front::getInstance()->getParam('bootstrap');
            \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
            $gearmandClient = \Iron_Gearman_Manager::getClient();

            parent::_save($model, $recursive, $useTransaction, $transactionTag);
            
            $job = new \Atezate_Jobs_Encode();
            $job->setEntity('Municipios');
            $job->setId($model->getMunicipioId());
            
            if ($model->hasChange('esLocBaseName')) {
                $job->setLang('es');
                $job->setExtension($model->getEsLocBaseName());
                
                $gearmandClient->doBackground("encode", serialize($job));
            }
            
            if ($model->hasChange('euLocBaseName')) {
                $job->setLang('eu');
                $job->setExtension($model->getEuLocBaseName());
                
                $gearmandClient->doBackground("encode", serialize($job));
            }
            
        } else {
            return parent::_save($model, $recursive, $useTransaction, $transactionTag);
        }
    }
}
