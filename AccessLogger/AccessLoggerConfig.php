<?php

namespace App\Services\AccessLogger;

class AccessLoggerConfig implements IAccessLoggerConfig
{
    private $logPath;

    /**
     * AccessLoggerConfig constructor.
     */
    public function __construct()
    {
        $this->logPath = "C:\\laragon\\bin\\nginx\\nginx-1.12.0\\logs\\access.log";
    }

    /**
     * @return string
     */
    public function getLogPath(): string
    {
        return $this->logPath;
    }
}