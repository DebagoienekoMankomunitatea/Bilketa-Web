<?php
namespace Atezate\Frontend\Filter;
class Posicionamiento extends FilterAbstract
{
    public function toArray($results)
    {
        if (is_array($results)) {

            if (is_object(current($results))) {

                $resultArray = array();
                $tmpArray = array();
                foreach ($results as $record) {

                    $tmpArray = $record->toArray();
                    $tmpArray['posicionLat'] = $record->getPosicionLat();
                    $tmpArray['posicionLng'] = $record->getPosicionLng();

                    $resultArray[] = $tmpArray;
                }

                return $resultArray;
            }

            return $results;
        }

        $data = $results->toArray();
        $data['posicionLat'] = $results->getPosicionLat();
        $data['posicionLng'] = $results->getPosicionLng();

        return $data;
    }
}
