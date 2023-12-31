<?php

include_once('functions.php');

class Log
{
    private $ip;
    private $error;
    private $errorCode;
    private $file;
    private $line;
    private $trace = [];

    const LOG_TEXT = 'test';

    function __construct(Throwable $e)
    {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->error = $e->getMessage();
        $this->errorCode = $e->getCode();
        $this->file = $e->getFile();
        $this->line = $e->getLine();
        $this->trace = $e->getTraceAsString();

        $this->save();
    }

    private function save()
    {
        date_default_timezone_set('UTC+5');

        $logFile = fopen('app.log', 'a');

        $logDate = date('d.m.Y H:i:s');


        $logText = $logDate . "\n"
            . 'IP: ' . $this->ip . "\n"
            . 'File: ' . $this->file  . "\n"
            . 'Line: ' . $this->line . "\n"
            . 'Error Code: ' . $this->errorCode . "\n"
            . 'Error: ' . $this->error . "\n"
            . 'Trace: ' . $this->trace . "\n";

        if (flock($logFile, LOCK_EX)) {
            fputs($logFile, $logText);
            flock($logFile, LOCK_UN);
        }

        fclose($logFile);
    }
}
