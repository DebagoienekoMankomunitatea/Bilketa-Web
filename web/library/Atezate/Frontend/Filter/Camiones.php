<?php
namespace Atezate\Frontend\Filter;
class Camiones extends FilterAbstract
{
    public function toArray($results)
    {
        if (! is_array($results)) {
            return $results->toArray();
        }

        foreach ($results as $key => $val) {

            $tmpData = $val->toArray();
            //unset($tmpData['cuandoPosicion']);
            //unset($tmpData['posicion']);
            $tmpData['posicionLat'] = $val->getPosicionLat();
            $tmpData['posicionLng'] = $val->getPosicionLng();


            $results[$key] = $tmpData;
        }

        return $results;
    }
}
