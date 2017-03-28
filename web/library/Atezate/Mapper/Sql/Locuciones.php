<?php

/**
 * Application Model Mapper
 *
 * @package Mapper
 * @subpackage Sql
 * @author Victor Vargas
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Atezate\Model\Locuciones
 *
 * @package Mapper
 * @subpackage Sql
 * @author Victor Vargas
 */
namespace Atezate\Mapper\Sql;
class Locuciones extends Raw\Locuciones
{
    public function save(\Atezate\Model\Raw\Locuciones $model)
    {
        if ($model->hasChange('esLocBaseName') || $model->hasChange('euLocBaseName')) {
            
            $bootstrap =  \Zend_Controller_Front::getInstance()->getParam('bootstrap');
            \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
            $gearmandClient = \Iron_Gearman_Manager::getClient();
            
            parent::_save($model, false, false);
            
            $job = new \Atezate_Jobs_Encode();
            $job->getDestinationFilePath();
            $job->setEntity('Locuciones');
            $job->setId($model->getId());

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
            return $this->_save($model, false, false);
        }
    }
}
