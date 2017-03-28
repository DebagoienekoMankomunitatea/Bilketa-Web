<?php
namespace Atezate\Frontend\Request;
class Fetch extends Common
{
    const ITEMS_PER_PAGE = 50;

    protected $_paginaActual = 1;


    public function fetch($pagina)
    {
        $this->setPaginaActual($pagina);
        $this->run();
        return $this;
    }

    /**
     * @param int $pagina
     */
    private function setPaginaActual($pagina)
    {
        if ($pagina !== abs($pagina)) {

            $this->setError(400, $pagina . ' no es un número de página aceptable');
        }

        $this->_paginaActual = $pagina;
        return $this;
    }

    public function run()
    {
        if ($this->_status->getCode() < 300) {

            $this->_numTotalResultados = $this->_mapper->countAllRows();

            $limit = self::ITEMS_PER_PAGE;
            $offset = ($this->_paginaActual -1) * self::ITEMS_PER_PAGE;

            try {
                $resultados = $this->_mapper->fetchList(null, null, $limit, $offset);
                $this->_resultados = $this->_objectToArray($resultados);
            } catch (\Exception $exception) {
                $this->setError(500, $exception->getMessage());
            }
        }

        return $this;
    }


    private function _objectToArray($results)
    {
        foreach ($results as $key => $val) {
            $results[$key] = $val->toArray();
        }

        return $results;
    }

    public function toArray()
    {
        if ($this->_status->getCode() >= 300) {

            return array(
                'status' => $this->_status->getCode(),
                'message' => $this->_status->getMessage()
            );
        }

        return array(
            'status' => $this->_status->getCode(),
            'message' => $this->_status->getMessage(),

            'numTotalPaginas' => ceil($this->_numTotalResultados / self::ITEMS_PER_PAGE),
            'numTotalResultados' => $this->_numTotalResultados,

            'paginaActual' => $this->_paginaActual,
            'numResultados' => count($this->_resultados),
            'resultados' => $this->_resultados
        );
    }
}
