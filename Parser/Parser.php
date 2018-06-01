<?php
namespace App\Services\Parser;

class Parser
{
    /**
     * @var ParserCrawlers
     */
    private $parserCrawlers;

    /**
     * @var ParserStatusCodes
     */
    private $parserStatusCodes;

    /**
     * @var ParserUniqueIp
     */
    private $parserUniqueIp;

    /**
     * @var ParserTraffic
     */
    private $parserTraffic;

    /**
     * Parser constructor.
     * @param string $subject
     */
    public function __construct($subject)
    {
        $this->parserCrawlers = new ParserCrawlers($subject);
        $this->parserStatusCodes = new ParserStatusCodes($subject);
        $this->parserUniqueIp = new ParserUniqueIp($subject);
        $this->parserTraffic = new ParserTraffic($subject);
    }

    /**
     * @return ParserCrawlers
     */
    public function getParserCrawlers()
    {
        return $this->parserCrawlers;
    }

    /**
     * @return ParserStatusCodes
     */
    public function getParserStatusCodes()
    {
        return $this->parserStatusCodes;
    }

    /**
     * @return ParserUniqueIp
     */
    public function getParserUniqueIp()
    {
        return $this->parserUniqueIp;
    }

    /**
     * @return ParserTraffic
     */
    public function getParserTraffic()
    {
        return $this->parserTraffic;
    }
}