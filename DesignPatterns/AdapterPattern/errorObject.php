<?php
/**
 * Created by LYY
 * Date: 2018/1/17
 * Time: 16:29
 */
header("Content-type: text/html; charset=utf-8");

/**
 * Class errorObject
 *  the base class to error
 */
class errorObject{
    private $_error;

    public function __construct($error){
        $this->_error = $error;
    }

    public function getError(){
        return $this->_error;
    }
}

/**
 * Class logToCSVAdapter
 *  the class to adapter new need
 */
class logToCSVAdapter extends errorObject{
    private $_errorNumber;
    private $_errorText;

    public function __construct($error){
        parent::__construct($error);
        $parts = explode(':', $this->getError());

        $this->_errorNumber = $parts[0];
        $this->_errorText = $parts[1];
    }

    public function getErrorNumber(){
        return $this->_errorNumber;
    }

    public function getErrorText(){
        return $this->_errorText;
    }
}

/**
 * Class logToConsole
 *  common log to print on console
 */
class logToConsole{
    private  $_errorObject;

    public function __construct($errorObject){
        $this->_errorObject = $errorObject;
    }

    public function write(){
        fwrite(STDERR, $this->_errorObject->getError());
    }
}

/**
 * Class logToCSV
 *  this class need method getErrorNumber and getErrorText used to new need
 */
class logToCSV{
    const CSV_LOCATION = 'log.csv';

    private $_errorObject;

    public function __construct($errorObject){
        $this->_errorObject = $errorObject;
    }

    public function write(){
        $line = $this->_errorObject->getErrorNumber();
        $line = $line . ',';
        $line = $line . $this->_errorObject->getErrorText();
        $line = $line . "\n";

        file_put_contents(__DIR__  . "\\" . self::CSV_LOCATION, $line, FILE_APPEND);
    }
}

$error = new errorObject("404:NotFound");

$log = new logToConsole($error);
$log->write();

fwrite(STDERR, "\n");

$error = new logToCSVAdapter("404: another NotFound");

$log = new logToCSV($error);
$log->write();
