<?php

namespace App\Services\Parser;

class Parser
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

    const STATUS_CODES = [
        "200",
        "204",
        "301",
    ];

    /**
     * @param $subject
     * @return array
     */
    public static function parseUniqueIp($subject)
    {
        preg_match_all("/\b(?:\d{1,3}\.){3}\d{1,3}\b/", $subject, $matches);
        $result = array_unique($matches[0]);

        return $result;
    }

    /**
     * @param $subject
     * @return array
     */
    public static function parseCrawlers($subject)
    {
        $pattern = "(" . implode("|", self::CRAWLERS) . ")";
        preg_match_all($pattern, $subject, $matches);
        $result = $matches[0];

        return $result;
    }

    /**
     * @param $subject
     * @return array
     */
    public static function parseStatusCodes($subject)
    {
        $pattern = '/(?!HTTP[^"]*") (' . implode("|", self::STATUS_CODES) . ')/';
        preg_match_all($pattern, $subject, $matches);
        $result = array_map('trim', $matches[0]);

        return $result;
    }
}