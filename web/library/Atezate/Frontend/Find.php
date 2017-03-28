<?php
namespace Atezate\Frontend;
class Find extends Common
{
    const FALLBACK_ITEMS_PER_PAGE = 50;

    protected $_paginaActual = 1;

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

    /**
     * @return int
     */
    public function getPaginaActual()
    {
        return $this->_paginaActual;
    }

    public function find($field, $value, $pagina)
    {
        $this->setPaginaActual($pagina);
        $this->run($field, $value);
        return $this;
    }

    private function run($field, $value)
    {
        if ($this->_status->getCode() < 300) {

            $limit = $this->_getItemsPerPage();
            $offset = $this->_getQueryOffset();

            try {
                $resultados = $this->_mapper->findByField($field, $value);
                $resultados = $this->_objectToArray($resultados);

                $this->_numTotalResultados = count($resultados);
                $this->_resultados = array_slice($resultados, $offset, $limit);

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

    protected function _getItemsPerPage()
    {
        $customItemsPerPage = $this->_getFilterClassName().'::ITEMS_PER_PAGE';
        if (! @class_exists($this->_getFilterClassName()) || !defined($customItemsPerPage)) {

            return self::FALLBACK_ITEMS_PER_PAGE;
        }

        return constant($customItemsPerPage);
    }

    protected function _getQueryOffset()
    {
        $limit = $this->_getItemsPerPage();
        if ($limit < 2) {
            return null;
        }

        return ($this->_paginaActual -1) * $limit;
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

            'numTotalPaginas' => ceil($this->_numTotalResultados / $this->_getItemsPerPage()),
            'numTotalResultados' => $this->_numTotalResultados,

            'paginaActual' => $this->_paginaActual,
            'numResultados' => count($this->_resultados),
            'resultados' => $this->_resultados
        );
    }
}
