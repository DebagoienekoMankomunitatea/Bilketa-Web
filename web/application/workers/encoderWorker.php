<?php
class encoderWorker extends Iron_Gearman_Worker
{
    protected $_timeout = 30000; // 1000 = 1 second

    protected $_frontend;

    protected function initRegisterFunctions()
    {
        $this->_registerFunction = array(
                'encode' => '_encodeEntity'
        );
    }

    protected function init()
    {

    }


    protected function timeout()
    {
        $pMapper = new \Atezate\Mapper\Sql\Camiones;
        $pMapper->getDbTable()->getAdapter()->closeConnection();

    }

    public function _encodeEntity($job)
    {
        $job = unserialize($job->workload());

        $mapper = $job->getMapper();
        $audio = $mapper->find($job->getId());

        //ubicación del fichero original
        $rutaFicheroOriginal = $job->getSourceFilePath();

        //extensión del archivo original
        $extension = '.'.$job->getExtension();

        //ruta del archivo donde se copiará el archivo original con su extensión
        $nameRuta1 = tempnam(sys_get_temp_dir(),'toEncode');
        $rutaFicheroOrigen = $nameRuta1.$extension;

        //ruta y nombre con la extensión .mp3 de como terminará el archivo
        $nameRuta2 = tempnam(sys_get_temp_dir(),'encoded');
        $rutaFicheroDestino = $nameRuta2.'.wav';

        //copiar el archivo con su extensión en una carpeta temporal
        if (copy($rutaFicheroOriginal, $rutaFicheroOrigen)) {
            $audio->setEstado('encoding');
            $audio->save();
        } else {
            $audio->setEstado('error');
            $audio->save();
        }

        $ret = $retValues = false;
        exec("/usr/bin/ffmpeg -y -loglevel quiet -i ". escapeshellarg($rutaFicheroOrigen)." -vn -ar 8000 -ac 1 ". escapeshellarg($rutaFicheroDestino), $ret, $retValue);

        if ($ret != 0) {
            if ($job->getLang() == 'es') {
                $audio->putEsLocCodificado($rutaFicheroDestino,'encoded.wav');
            } else {
                $audio->putEuLocCodificado($rutaFicheroDestino,'encoded.wav');
            }

            $audio->setEstado('encoded');
            $audio->save();

        } else {
            $audio->setEstado('error');
            $audio->save();
        }

        //Borrado de los archivos de la carpeta TMP
        if (file_exists($nameRuta1)) {
            unlink($nameRuta1);
        }
        if (file_exists($nameRuta2)) {
            unlink($nameRuta2);
        }
        if (file_exists($rutaFicheroOrigen)) {
            unlink($rutaFicheroOrigen);
        }
        if (file_exists($rutaFicheroDestino)) {
            unlink($rutaFicheroDestino);
        }

        //Sincronizar locuciones con asterix
        exec("sh " . APPLICATION_PATH . "/bin/rsyncLocuciones.sh");

        if ($audio->getIden() == 'problemasTecnicos') {

            //Sincronizar locuciones de error a ruta hardcodeada
            $audioEu = $audio->fetchEuLocCodificado();
            $audioEs = $audio->fetchEsLocCodificado();

            if ($audioEu && $audioEs) {

                $pathEu = $audioEu->getFilePath();
                $pathEs = $audioEs->getFilePath();

                exec("sh " . APPLICATION_PATH . "/bin/rsyncLocucionesError.sh " . escapeshellarg($pathEu) . " " . escapeshellarg($pathEs));
            }
        }
    }
}
?>
