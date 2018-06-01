<?php
namespace App\Services\Parser;

class ParserTraffic
{
    private $subject;

    /**
     * ParserTraffic constructor.
     * @param $inputSubject
     */
    public function __construct($inputSubject)
    {
        $this->subject = $inputSubject;
    }

    public function parseTraffic()
    {
        $pattern = "/(?!HTTP[^\"]*\") (?!\d{3} )(\d+ )/";
        preg_match_all($pattern, $this->subject, $matches);
        $result = array_map('trim', $matches[0]);

        return $result;
    }
}