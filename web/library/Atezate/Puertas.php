<?php
namespace Atezate;
use Atezate\Mapper\Sql as Mapper;
use Atezate\Model as Model;

class Puertas
{
    protected $_ip;
    protected $_port = '3001';
    protected $_retries = 0;

    protected $_code;

    /**
     * @var DateTimeZone
     */
    protected $_openTime;

    /**
     * @var DateTimeZone
     */
    protected $_closeTime;

    protected $_logger;

    public function __construct()
    {
        $writer = new \Zend_Log_Writer_Syslog(array(
            'application' => 'atezate',
            'facility' => LOG_LOCAL6,
        ));

        $this->_logger = new \Zend_Log($writer);
    }

    /**
     * @return boolean
     */
    public function abrir()
    {
        if (!$this->_ip) {
            Throw new \Exception("Ip de la puerta vacía");
        }
        if (!$this->_openTime) {
            Throw new \Exception("Hora de comienzo de validez de código de apertura vacía");
        }
        if (!$this->_closeTime) {
            Throw new \Exception("Hora de final de validez de código de apertura vacía");
        }
        if (!$this->_code) {
            Throw new \Exception("Código de apertura vacío");
        }

        $chunk = 'C';
        $chunk .= $this->_code;
        $chunk .= $this->_openTime->format("Hidmy");
        $chunk .= $this->_closeTime->format("Hidmy");
        $chunk .= 'F';

        $success = false;
        $intentos = 0;

        while (!$success && $intentos <= $this->_retries) {

            $intentos++;
            $src = "tcp://" . $this->_ip . ":" . $this->_port;
            $this->_log("Connecting to " . $src);
            $fp = @stream_socket_client($src, $errno, $errstr, 50);

            if (!$fp) {
                $this->_log("$errstr ($errno): $src");
                continue;
            }

              stream_set_timeout($fp, 5);
              $this->_log("conectado.");
              fwrite($fp, $chunk);
              $this->_log("escritura realizada: " . $chunk);
              $return = fread($fp,1024);
              fclose($fp);
              $this->_log("respuesta: " .($return== 'O'? 'CORRECTA!' : 'INCORRECTA') . " --> " . $return);

              if ($return == 'O') {
                  $success = true;
              }

            continue;
        }

        return $success;
    }

    protected function _log($message)
    {
        $this->_logger->debug($message);
    }

    /////////////////////////////////////////////////////////////////////////////
    //
    /////////////////////////////////////////////////////////////////////////////

    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function setIp($ip)
    {
        $this->_ip = $ip;
        return $this;
    }

    public function getIp()
    {
        return $this->_ip;
    }

    public function setCloseTime(\DateTime $datetime)
    {
        $this->_closeTime = $datetime;
        return $this;
    }

    public function getCloseTime()
    {
        return $this->_closeTime;
    }

    public function setOpenTime(\DateTime $datetime)
    {
        $this->_openTime = $datetime;
        return $this;
    }

    public function getOpenTime()
    {
        return $this->_openTime;
    }

    public function setPort($port)
    {
        $this->_port = $port;
        return $this;
    }

    public function getPort()
    {
        return $this->_port;
    }

    public function setRetries($retries)
    {
        $this->_retries = $retries;
        return $this;
    }

    public function getRetries()
    {
        return $this->_retries;
    }


}
