<?php
/**
* Calculator - sample class to expose via JSON-RPC
*/
namespace Atezate;
use Atezate\Mapper\Sql as Mapper;
use Atezate\Model as Model;

class Test
{
    /**
     * Return sum of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function add($x, $y)
    {
        return $x + $y;
    }

    /**
     * Return difference of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function subtract($x, $y)
    {
        return $x - $y;
    }

    /**
     * Return product of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function multiply($x, $y)
    {
        return $x * $y;
    }

    /**
     * Return the division of two variables
     *
     * @param  int $x
     * @param  int $y
     * @return float
     */
    public function divide($x, $y)
    {
        return $x / $y;
    }

    /**
     * This hangs for a given number of seconds and is for testing async
     * calls to make sure it doesn't lock up the browser.
     *
     * @param int $sleepTime
     * @return boolean
     */
    public function hang($sleepTime)
    {
        sleep($sleepTime);
        return true;
    }

    /**
     * This explodes the server (throws exception)
     */
    public function explode() {
        throw new \Exception('BOOM');
    }

    /* Takes an associative array (javascript object).  Returns true
     * if its able to unpack.
     *
     * @param array
     * @return boolean
     */
    public function arrayTest(array $arr) {
        if(($arr["hi"] == 1) && ($arr["there"] == 2)) {
            return true;
        }

        return false;
    }
}

