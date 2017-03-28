<?php
namespace Atezate\Frontend;
class Status
{
    protected $_code = 200;
    protected $_message;

    protected $_availableCodes = array();

    public function __construct()
    {
        $this->_init();
    }

    protected function _init ()
    {
        $this->_initCodes();
    }

    protected function _initCodes ()
    {
        $successCodes = array(
            '200' => 'OK',
            '202' => 'Accepted',
            '204' => 'No Content',
        );

        $clientErrorCodes = array(
            '400' => 'Bad Request',
            '401'  => 'Unauthorized',
            '424' => 'Failed Dependency',
            '428' => 'Precondition Required',
        );

        $serverErrorCodes = array(
            '500' => 'Internal Server Error',
            '501' => 'Not Implemented',
            '503' => 'Service Unavailable',
        );

        $this->_availableCodes = $successCodes + $clientErrorCodes + $serverErrorCodes;
        $this->setCode(200);
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function setCode($code, $customErrorMessage = null)
    {
        if (! array_key_exists($code,  $this->_availableCodes)) {
            throw new Exception ("Unkown error");
        }
        $this->_code = $code;

        if ($customErrorMessage) {
            $this->setMessage($this->_availableCodes[$code] . ': ' . $customErrorMessage);
        } else {
            $this->setMessage($this->_availableCodes[$code]);
        }

        return $this;
    }

    public function getMessage()
    {
        return $this->_message;
    }

    public function setMessage($message)
    {
        $this->_message = $message;
        return $this;
    }
}
