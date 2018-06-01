<?php
namespace App\Services\Parser;

class ParserUniqueIp
{
    private $subject;

    /**
     * ParserUniqueIp constructor.
     * @param $inputSubject
     */
    public function __construct($inputSubject)
    {
        $this->subject = $inputSubject;
    }

    /**
     * @return array
     */
    public function parseUniqueIp()
    {
        preg_match_all("/\b(?:\d{1,3}\.){3}\d{1,3}\b/", $this->subject, $matches);
        $result = array_unique($matches[0]);

        return $result;
    }
}