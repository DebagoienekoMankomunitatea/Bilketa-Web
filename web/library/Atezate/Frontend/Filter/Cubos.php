<?php
namespace Atezate\Frontend\Filter;
class Cubos extends FilterAbstract
{
    public function toArray($results)
    {
        if (! is_array($results)) {
            return $results->toArray();
        }

        foreach ($results as $key => $val) {

            $tmpData = $val->toArray() + array('intuitivo' => null);

            $contribuyente = $val->getContribuyente();
            $results[$key] = $tmpData;

            if (empty($contribuyente)) {
                continue;
            }
            $results[$key]['intuitivo'] = $contribuyente->getIntuitivo();
        }
        return $results;
    }
}
