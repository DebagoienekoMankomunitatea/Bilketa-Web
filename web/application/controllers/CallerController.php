<?php
use Atezate\Mapper\Sql as Mapper;
class CallerController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->getHelper('viewRenderer')->setNoRender();
    }

    public function llamarAction()
    {
        $this->_checkProcess('llamar');

        try {
            $dbAdapter = Zend_Db_Table::getDefaultAdapter();

            $targetTiposIncidenciasPks = array();
            $tiposIncidenciasMapper = new Mapper\TiposIncidencias;
            $condition = $dbAdapter->quoteIdentifier('plantillasTelefonoId') . ' is not null';
            $tiposIncidencias = $tiposIncidenciasMapper->fetchList($condition);

            foreach ($tiposIncidencias as $tiposIncidencia) {
                $targetTiposIncidenciasPks[] = $tiposIncidencia->getPrimaryKey();
            }

            if (count($targetTiposIncidenciasPks) > 0) {
                $incidenciasMapper = new Mapper\Incidencias;

                $condition = $dbAdapter->quoteIdentifier('tipoId') . ' in('. implode(',', $targetTiposIncidenciasPks) .')';
                $condition .= " AND solucionada = 'no'";

                $incidencias = $incidenciasMapper->fetchList($condition);

                $gestionIncidencias = new \Atezate\Incidencias;
                $gestionIncidencias->activarLlamadas(true);

                foreach ($incidencias as $incidencia) {
                    $gestionIncidencias->setIdIncidencia($incidencia->getPrimaryKey());
                    $gestionIncidencias->lanzarLlamada();
                    sleep(15);
                }
            }
        } catch (\Exception $e) {
            $this->_exitProcess('llamar');
            throw $e;
        }

        $this->_exitProcess('llamar');
    }

    protected function _checkProcess($name)
    {
        $pidFile = "/tmp/" .$name . '.run';
        clearstatcache();
        if (file_exists($pidFile))
        {
            if ($this->_checkProblem($pidFile)) {

                $this->_email();

            } else {

                echo "Ya existe un proceso hermano en ejecución";
            }

            exit(1);
        }

        touch($pidFile);
    }

    protected function _exitProcess($name)
    {
        $pidFile = "/tmp/" .$name . '.run';
        unlink($pidFile);

    }

    public function _checkProblem($pidFile)
    {
        $wait_day = filemtime($pidFile) + (2 * 60 * 60);

        if (time() > $wait_day) {
            return true;
        } else {
            return false;
        }
    }

    public function _email()
    {
        // $mail = new Zend_Mail('UTF-8');
        // $mail->setBodyText('Hay un proceso que lleva activo 2 horas en debagoiena. Luego de arreglarlo, asegurarse de eliminar el archivo /tmp/llamar.run para recibir notificaciones futuras.');
        // $mail->setFrom('', '');
        // $mail->addTo('userto@example.com', 'user to');
        // $mail->addCc('usercc@example.com', 'user cc');
        // $mail->setSubject('Debagoiena - Proceso activo 2 horas');
        //
        // return $mail->send();
    }

}
