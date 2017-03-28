<?php
use Atezate\Model as Model;
use Atezate\Mapper\Sql as Mapper;

class DaemonController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction()
    {
        while (true) {

            $where = '"fechaLlamada" >= (now() - interval \'1 day\') and activado = false';
            $codigosAperturaMapper = new Mapper\CodigosApertura;
            $codigosApertura = $codigosAperturaMapper->fetchList($where);

            foreach ($codigosApertura as $codigoApertura) {

                $centroEmergencia = $codigoApertura->getCentroEmergencia();
                if (!$centroEmergencia) {
                    continue;
                }

                $puerta = new \Atezate\Puertas;
                $puerta->setCode($codigoApertura->getCodigoApertura());

                $openTime = new \DateTime($codigoApertura->getFechaLlamada(), new \DateTimeZone('UTC'));
                $openTime->setTimezone(new \DateTimeZone('Europe/Madrid'));

                $closeTime =  new \DateTime($codigoApertura->getFechaLlamada(), new \DateTimeZone('UTC'));
                $closeTime->setTimezone(new \DateTimeZone('Europe/Madrid'));
                $closeTime->add(new DateInterval('PT24H'));

                $puerta->setOpenTime($openTime);
                $puerta->setCloseTime($closeTime);

                $puerta->setIp($centroEmergencia->getIp());
                $puerta->setPort($centroEmergencia->getPuerto());

                if ($puerta->abrir()) {
                    $codigoApertura->setActivado(1)
                                   ->save();
                }
            }

            sleep(1);
            //break;
        }
    }

}