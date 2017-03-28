<?php
/***
 * File system object con extension
*/
class Atezate_Fso extends Iron_Model_Fso
{
    /**
     * @return Klear_Model_Fso
     */
    public function flush($pk)
    {
        if (!$this->mustFlush()) {

            throw new Exception('Nothing to flush');
        }

        if (!is_numeric($pk)) {

            throw new Exception('Invalid Primary Key');
        }

        $targetPath = $this->_basePath . DIRECTORY_SEPARATOR . $this->_pk2path($pk);
        $targetFile = $targetPath . $pk . '.' . pathinfo($this->_baseName, PATHINFO_EXTENSION);

        if (!file_exists($targetPath)) {

            if (!mkdir($targetPath, 0777, true)) {

                throw new Exception('Could not create dir ' . $targetPath);
            }

            chmod($targetPath, 0777);
        }

        $srcFileSize = filesize($this->_srcFile);

        if ($this->getSize() != $srcFileSize) {

            unlink($this->_srcFile);

            throw new KlearMatrix_Exception_File(
                'Something went wrong. New filesize: ' . $srcFileSize . '. Expected: ' . $this->getSize()
            );
        }

        if (true === copy($this->_srcFile, $targetFile)) {

            unlink($this->_srcFile);
            chmod($targetFile, 0777);

        } else {

            throw new KlearMatrix_Exception_File("Could not rename file " . $this->_srcFile . " to " . $targetFile);
        }

        $this->_mustFlush = false;
        return $this;
    }

    /**
     * Prepara el módelo para permitir la descarga del fichero llamando a getBinary()
     * @return Iron_Model_Fso
     */
    public function fetch()
    {
        $pk = $this->_model->getPrimaryKey();

        if (!is_numeric($pk) ) {

            throw new Exception("Empty object. No PK found");
        }

        $baseNameGetter = 'get' . ucfirst($this->_modelSpecs['baseNameName']);
        $this->setBaseName($this->_model->$baseNameGetter());
        $file = $this->_basePath . DIRECTORY_SEPARATOR . $this->_pk2path($pk) . $pk .
                '.' . pathinfo($this->_baseName, PATHINFO_EXTENSION);

        if (!file_exists($file)) {

            throw new Exception("File $file not found");
        }

        $this->_setSize(filesize($file));
        $this->_setSrcFile($file);
        $this->_setMimeType($file);
        $this->_setMd5Sum($file);

        return $this;
    }

    /**
     * @var string
     * @var int
     */
    public function remove()
    {
        $pk = $this->_model->getPrimaryKey();

        if (!is_numeric($pk)) {
            throw new Exception('Empty object. No PK found');
        }

        $baseNameGetter = 'get' . ucfirst($this->_modelSpecs['baseNameName']);
        $this->setBaseName($this->_model->$baseNameGetter());

        $file = $this->_basePath . DIRECTORY_SEPARATOR . $this->_pk2path($pk) . $pk .
                '.' . pathinfo($this->_baseName, PATHINFO_EXTENSION);

        if (file_exists($file)) {

            unlink($file);

        } else {

            //TODO: loggear que el fichero que se intenta borrar no existe...
        }

        $this->_size = null;
        $this->_mimeType = null;
        $this->_binary = null;

        $this->_updateModelSpecs();

        return $this;
    }

    public function getStoragePath()
    {
        return $this->_getLocalStorage($this->_getConfig());;
    }

}
