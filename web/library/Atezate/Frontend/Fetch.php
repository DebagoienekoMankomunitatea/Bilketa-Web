<?php
namespace Atezate\Frontend;
class Fetch extends Common
{
    const FALLBACK_ITEMS_PER_PAGE = 50;

    protected $_paginaActual = 1;

    public function fetch($pagina, $where = null, $order = null)
    {
        $this->setPaginaActual($pagina);
        $this->run($where, $order);
        return $this;
    }

    public function setResults(array $results)
    {
        $this->_numTotalResultados = count($results);
        $this->_resultados = $results;
    }

    /**
     * @param int $pagina
     */
    private function setPaginaActual($pagina)
    {
        if (
            ($pagina !== abs($pagina))
            || ($pagina < 1)
        ) {

            $this->setError(400, $pagina . ' no es un número de página aceptable');
        }

        $this->_paginaActual = $pagina;
        return $this;
    }

    public function run($where, $order)
    {
        if ($this->_status->getCode() < 300) {

            $this->_numTotalResultados = $this->_mapper->countByQuery($where);

            $limit = $this->_getItemsPerPage();
            $offset = $this->_getQueryOffset();

            try {

                $this->_resultados = $this->_mapper->fetchList($where, $order, $limit, $offset);
            } catch (\Exception $exception) {
                $this->setError(500, $exception->getMessage());
            }
        }

        return $this;
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
            'resultados' => $this->_objectToArray($this->_resultados)
        );
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
}
