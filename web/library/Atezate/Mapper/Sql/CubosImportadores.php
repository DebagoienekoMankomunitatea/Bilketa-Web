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
 * Data Mapper implementation for Atezate\Model\CubosImportadores
 *
 * @package Mapper
 * @subpackage Sql
 * @author Victor Vargas
 */
namespace Atezate\Mapper\Sql;
class CubosImportadores extends Raw\CubosImportadores
{
    public function save(\Atezate\Model\Raw\CubosImportadores $model)
    {
        if ($model->hasChange('csvBaseName')) {

            if ($model->hasChange('csvBaseName')) {

                $bootstrap =  \Zend_Controller_Front::getInstance()->getParam('bootstrap');
                \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
                $gearmandClient = \Iron_Gearman_Manager::getClient();

                parent::_save($model, false, false);

                $job = new \Atezate_Jobs_Importador();
                $job->setId($model->getId());
                $job->setExtension($model->getCsvBaseName());
                $job->setEntity('Cubos');

                $gearmandClient->doBackground("importadorCubos", serialize($job));

            } else {
                return parent::_save($model, false, false);
            }

        } else {
            return parent::_save($model, false, false);
        }
    }
}
