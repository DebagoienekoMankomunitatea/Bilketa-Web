<?php
namespace Atezate\Frontend\Filter;
class Turnos extends FilterAbstract
{

    public function toArray($results)
    {
        if (! is_array($results)) {
            return $results->toArray();
        }

        foreach ($results as $key => $val) {

            $ruta = $val->getRuta();
            $tmpData = $val->toArray();

            if ($ruta) {

                unset($tmpData['rutaId']);
                $tmpData['ruta'] = $ruta->toArray();
            }

            $results[$key] = $tmpData;
        }

        return $results;
    }


}
