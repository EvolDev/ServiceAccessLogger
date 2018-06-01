<?php
namespace App\Services\AccessLogger;

interface IAccessLoggerConfig
{
    public function setLogFileName($logFileName);

    public function getLogFileName();
}