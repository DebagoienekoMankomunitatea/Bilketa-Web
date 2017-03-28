<?php
// namespace Atezate\Jobs;
class Atezate_Jobs_Importador
{
    protected $_entity;
    protected $_availableEntities = array(
                'Contribuyentes',
                'Postes',
                'Cubos'
            );

    protected $_id;
    protected $_extension;
    protected $_className;

    public function setEntity($entity) 
    {
        //TODO: comprobar que entity está en $_availableEntities
        foreach($this->_availableEntities as $availableEntity) {
            if ($entity == $availableEntity) {
                $this->_entity = $entity;
                return $this;
                break;
            }
        }

        throw new \Exception("El job no tiene especificada la entidad.");
    }

    public function getEntity() 
    {
        return $this->_entity;
    }

    public function setExtension($file) 
    {
        $parts = explode(".", $file);
        $this->_extension = $parts[count($parts)-1];
        return $this;
    }

    public function getExtension() 
    {
        return $this->_extension;
    }
    
    public function setId($id) 
    {
        $this->_id = $id;
        return $this;
    }
    
    public function getId() 
    {
        return $this->_id;
    }

    public function getModel() 
    {
        $className = "\Atezate\Model\\" . $this->_entity;
        $model = new $className;
        return $model;
    }

    public function getMapper() 
    {
        $className = '\Atezate\Mapper\Sql\\' . $this->_entity;
        $mapper = new $className;
        return $mapper;
    }

    public function getSourceFilePath()
    {
         $path = new \Iron_Controller_Action_Helper_KarmaDocPath();
         $classAndFieldName = 'importadores.archivo';
         if ($this->getEntity() == '') {
             $classAndFieldName = 'cubosimportadores.csv';
         }

         $basePath = APPLICATION_PATH.'/../storage/atezate_model_' . $classAndFieldName;
         return $path->getDocumentPath($basePath, $this->_id);
    }

    public function setClassName($className)
    {
        $this->_className = $className;
        return $this;
    }

    public function getClassName()
    {
        return $this->_className;
    }
}