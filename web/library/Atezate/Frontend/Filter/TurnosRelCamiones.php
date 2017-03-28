<?php
namespace Atezate\Frontend\Filter;
class TurnosRelCamiones extends FilterAbstract
{
    public function toArray($results)
    {
        $isArray = is_array($results);

        if (! $isArray) {
            $results = array($results);
        }

        foreach ($results as $key => $element) {

            $operariosIds = array(-1);
            foreach ($element->getTurnosCamionesRelOperarios() as $tupla) {
                if($tupla->getOperario()) {
                    $operariosIds[] = $tupla->getOperarioId();
                }
            }

            $data = $element->toArray();
            $operariosMapper = new \Atezate\Mapper\Sql\Operarios;
            $where = '"operarioId" in ('. implode(", ", $operariosIds)  .')';

            $operarios = $operariosMapper->fetchList($where);

            foreach ($operarios as $clave => $valor) {
                $operarios[$clave] = $valor->toArray();
            }

            $data['operarios'] = $operarios;

            $turno = $element ? $element->getTurno() : null;
            $ruta = $turno ? $turno->getRuta() : null;

            $data['ruta'] = $ruta ? $ruta->toArray() : array();

            $results[$key] = $data;
        }

        if (! $isArray) {
            return array_shift($results);
        }

        return $results;
    }
}
