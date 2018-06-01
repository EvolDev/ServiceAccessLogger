<?php
namespace App\Services\AccessLogger;

use App\Services\Parser\Parser;

class AccessLogger
{
    /**
     * @var IAccessLoggerConfig
     */
    private $config;

    /**
     * @var Parser
     */
    private $parser;

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
        if (!file_exists($config->getLogFileName()))
            throw new \Error("File access.log does not exist");

        $this->config = $config;
        $filename = $this->config->getLogFileName();
        $this->logFile = file_get_contents($filename, FILE_USE_INCLUDE_PATH);
        $this->parser = new Parser($this->logFile);
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return substr_count($this->logFile, "\n");
    }

    /**
     * @return int
     */
    public function getUniqueIpAddressCount()
    {
        return count($this->parser->getParserUniqueIp()->parseUniqueIp());
    }

    /**
     * @return array
     */
    public function getCrawlersCountValues()
    {
        return array_count_values($this->parser->getParserCrawlers()->parseCrawlers());
    }

    /**
     * @return array
     */
    public function getStatusCodeCountValues()
    {
        return array_count_values($this->parser->getParserStatusCodes()->parseStatusCodes());
    }

    public function getTrafficCount()
    {
        return count($this->parser->getParserTraffic()->parseTraffic());
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
            "traffic" => $this->getTrafficCount(),
            "crawlers" => $this->getCrawlersCountValues(),
            "StatusCodes" => $this->getStatusCodeCountValues(),
        ];

        if ($jsonEnable)
            $output = json_encode($output);

        return $output;
    }
}