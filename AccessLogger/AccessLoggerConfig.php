<?php
namespace App\Services\AccessLogger;

class AccessLoggerConfig implements IAccessLoggerConfig
{
    private $logFileName;

    /**
     * @return string
     */
    public function getLogFileName()
    {
        return $this->logFileName;
    }

    /**
     * @param string $logFileName
     */
    public function setLogFileName($logFileName)
    {
        $this->logFileName = $logFileName;
    }
}