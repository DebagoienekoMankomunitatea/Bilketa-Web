<?php

/**
 * Application Model Mapper
 *
 * @package Mapper
 * @subpackage Sql
 * @author Victor Vargas
 * @copyright ZF model generator Rev. 164:165

 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for Atezate\Model\Paradas
 *
 * @package Mapper
 * @subpackage Sql
 * @author Victor Vargas
 */
namespace Atezate\Mapper\Sql;
class Paradas extends Raw\Paradas
{
    /**
     * Saves current row
     * @return boolean If the save action was successful
     */
    public function save(\Atezate\Model\Raw\Paradas $model)
    {
        $new = is_null($model->getParadaId());

        if ($model->getFinalizado() == '1') {
            $model->setHoraFinal(date('H:i:s',time()));
        } else {
            $model->setHoraFinal(NULL);
        }

        $result = parent::_save($model, false, false, null);

        if ($model->getFinalizado()) {

            //Comprobar si se han realizado todas las recogidas del turno
            $this->_checkFinalizarTurno($model);
        }

        return $result;

    }

    /**
     * @return void
     */
    protected function _checkFinalizarTurno(\Atezate\Model\Paradas $model)
    {
        $turnoRelCamiones = $model->getTurnosCamiones();
        if (!$turnoRelCamiones) {
            return;
        }

        $turno = $turnoRelCamiones->getTurno();
        if (!$turno || !$turno->getTurnosRelCamiones()) {
            return;
        }

        $turnoRelCamionIds = array(-1);
        $turnosRelCamiones = $turno->getTurnosRelCamiones();

        foreach ($turnosRelCamiones as $tupla) {
            $turnoRelCamionIds[] = $tupla->getPrimarykey();
        }

        $mapper = new RutasRelPuntosRecogida;
        $objects = $mapper->fetchList('"rutaId" = ' . $turno->getRutaId());

        $idPuntos = array(-1);
        foreach ($objects as $itemRel) {
            $idPuntos[] = $itemRel->getPuntosRecogidaId();
        }

        $puntosRecogidaMapper = new PuntosRecogida;
        $where = '"puntosRecogidaId" in ('. implode(", ", $idPuntos). ')' .
                 ' and "puntosRecogidaId" not in (select "puntosRecogidasId" from "Paradas"' .
                 ' where "puntosRecogidasId" is not null and "turnosCamionesId" in ('. implode(',', $turnoRelCamionIds) .'))';
        $puntosRecogida = $puntosRecogidaMapper->fetchList($where);

        if (! empty($puntosRecogida)) {
            return;
        }

        if ($turno->getHoraFinal()) {
            return;
        }

        $turno->setHoraFinal($model->getHoraFinal())
              ->save();
    }
}
