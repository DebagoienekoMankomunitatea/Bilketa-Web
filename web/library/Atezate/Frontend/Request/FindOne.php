<?php
namespace Atezate\Frontend\Request;
class FindOne extends Common
{
    protected $_numTotalResultados;
    protected $_resultados;

    public function find($field, $value)
    {
        if ($this->_status->getCode() < 300) {

            try {
                $this->_resultados = $this->_mapper->findOneByField($field, $value);
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
            'resultados' => $this->_resultados->toArray()
        );
    }
}
