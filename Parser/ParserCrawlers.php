<?php
namespace App\Services\Parser;

class ParserCrawlers
{
    const CRAWLERS = [
        "Googlebot",
        "Bingbot",
        "Slurp",
        "DuckDuckBot",
        "Baiduspider",
        "YandexBot",
        "Sogou",
        "Konqueror",
        "Exabot",
        "facebot",
        "ia_archiver",
    ];

    private $subject;

    /**
     * ParserCrawlers constructor.
     * @param string $inputSubject
     */
    public function __construct($inputSubject)
    {
        $this->subject = $inputSubject;
    }

    /**
     * @return array
     */
    public function parseCrawlers()
    {
        $pattern = "(" . implode("|", self::CRAWLERS) . ")";
        preg_match_all($pattern, $this->subject, $matches);
        $result = $matches[0];

        return $result;
    }
}