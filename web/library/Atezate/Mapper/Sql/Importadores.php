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
 * Data Mapper implementation for Atezate\Model\Importadores
 *
 * @package Mapper
 * @subpackage Sql
 * @author Victor Vargas
 */
namespace Atezate\Mapper\Sql;
class Importadores extends Raw\Importadores
{
    public function save(\Atezate\Model\Raw\Importadores $model)
    {
        if ($model->hasChange('archivoBaseName')) {
            if ($model->hasChange('archivoBaseName')) {

                $bootstrap =  \Zend_Controller_Front::getInstance()->getParam('bootstrap');
                \Iron_Gearman_Manager::setOptions($bootstrap->getOption("gearmand"));
                $gearmandClient = \Iron_Gearman_Manager::getClient();

                parent::_save($model, false, false);

                $job = new \Atezate_Jobs_Importador();
                $job->setId($model->getId());
                $job->setExtension($model->getArchivoBaseName());
                $job->setClassName($model->getClassName());

                if ($model->getTipo() == 'contribuyente') {
                    $job->setEntity('Contribuyentes');
                } else {
                    $job->setEntity('Postes');
                }

                $gearmandClient->doBackground("importador", serialize($job));

            } else {
                return parent::_save($model, false, false);
            }

        } else {
            return parent::_save($model, false, false);
        }
    }
}
