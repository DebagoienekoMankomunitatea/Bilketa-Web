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
 * Data Mapper implementation for Atezate\Model\Turnos
 *
 * @package Mapper
 * @subpackage Sql
 * @author Irontec
 */
namespace Atezate\Mapper\Sql;
class Turnos extends Raw\Turnos
{
    protected function _save(\Atezate\Model\Raw\Turnos $model,
        $recursive = false, $useTransaction = true, $transactionTag = null
    )
    {
        if ($model->hasChange('horaFinal')) {
            $model = $this->_calcularCosteTurno($model);
        }

        return parent::_save($model, $recursive, $useTransaction, $transactionTag);
    }

    /**
     * 
     * @param \Atezate\Model\Paradas
     * @return \Atezate\Model\Paradas
     */
    protected function _calcularCosteTurno(\Atezate\Model\Turnos $turno)
    {
        // Turno < TurnoRelCamion > Paradas [> Camiones.costeHora] < TurnoRelCamionRelOperario < Operarios [> Roles.costeHora]
        $turnosRelCamiones = $turno->getTurnosRelCamiones();
        $dbAdapter = $this->getDbTable()->getAdapter();

        $coste = 0;
        foreach ($turnosRelCamiones as $turnoRelCamion) {

            $costeHora = 0;
            $whereParadas = 'where  finalizado = true and "turnosCamionesId" = ' .intval($turnoRelCamion->getPrimaryKey());
            $queryParadas = 'select "turnosCamionesId", max("horaFinal") as "horaFinal" from "Paradas" ';;
            $queryParadas .= $whereParadas . ' group by "turnosCamionesId"';

            $paradas = $dbAdapter->query($queryParadas)->fetchAll();

            if (! (is_array($paradas) && isset($paradas[0]) && isset($paradas[0]['horaFinal']))) {
                continue;
                //throw new \Exception("No fue posible recoger la hora-fin de la última parada");
            }

            $horaFinal = $paradas[0]['horaFinal'];

            $camion = $turnoRelCamion->getCamiones();
            if (!$camion) {
                continue;
            }
            $costeHora += floatval($camion->getCosteHora());

            $turnosCamionesRelOperarios = $turnoRelCamion->getTurnosCamionesRelOperarios();
            foreach ($turnosCamionesRelOperarios as $turnoRelOperario) {

                $operario = $turnoRelOperario->getOperario();
                if (!$operario) {
                    continue;
                }

                $rolOperario = $operario->getRol();
                if (!$rolOperario) {
                    continue;
                }

                $costeHora += floatval($rolOperario->getCosteHora());
            }

            $time1 = $this->_timeToSeconds($turno->getHoraInicio());
            $time2 = $this->_timeToSeconds($horaFinal);

            if ($time1 > $time2) {
                //En plan inicio(23:00:00) -> final(02:00:00)
                $time2 += 24*60*60;
            }

            $timeDiff = ($time2 - $time1)/60/60;
            $coste += $costeHora * $timeDiff;
        }

        return $turno->setCoste($coste);
    }

    protected function _timeToSeconds($time)
    {
        list($hours, $minutes, $seconds) = explode(":", $time);
        return $seconds + ($minutes*60) + ($hours*60*60);
    }
}
