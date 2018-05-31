<?php

namespace App\Services\AccessLogger;

use App\Services\Parser\Parser;

class AccessLogger
{
    /**
     * @var AccessLoggerConfig
     */
    private $config;

    /**
     * @var array $log
     */
    private $logList;

    /**
     * @var string
     */
    private $logFile;

    /**
     * AccessLogger constructor.
     * @param IAccessLoggerConfig $config
     * @throws \Error
     */
    public function __construct(IAccessLoggerConfig $config)
    {
        if (!file_exists($config->getLogPath()))
            throw new \Error("File access.log does not exist");

        $this->config = $config;
        $filename = $this->config->getLogPath();
        $this->logFile = file_get_contents($filename, FILE_USE_INCLUDE_PATH);
        $this->explodeLog();
    }

    private function explodeLog()
    {
        $this->logList = explode("\n", $this->logFile);
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return count($this->logList);
    }

    /**
     * @return int
     */
    public function getUniqueIpAddressCount()
    {
        return count(Parser::parseUniqueIp($this->logFile));
    }

    /**
     * @return array
     */
    public function getCrawlersCountValues()
    {
        $crawlersParsed = Parser::parseCrawlers($this->logFile);

        return array_count_values($crawlersParsed);
    }

    /**
     * @return array
     */
    public function getStatusCodeCountValues()
    {
        $statusCodesParsed = Parser::parseStatusCodes($this->logFile);

        return array_count_values($statusCodesParsed);
    }

    /**
     * @param bool $jsonEnable
     * @return array|string
     */
    public function getOutput(bool $jsonEnable = true)
    {
        $output = [
            "views" => $this->getViews(),
            "urls" => $this->getUniqueIpAddressCount(),
            "crawlers" => $this->getCrawlersCountValues(),
            "StatusCodes" => $this->getStatusCodeCountValues(),
        ];

        if ($jsonEnable)
            $output = json_encode($output);

        return $output;
    }
}