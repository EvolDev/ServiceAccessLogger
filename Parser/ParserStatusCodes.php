<?php
namespace App\Services\Parser;

class ParserStatusCodes
{
    const STATUS_CODES = [
        "200",
        "204",
        "301",
    ];

    private $subject;

    /**
     * ParserStatusCodes constructor.
     * @param $inputSubject
     */
    public function __construct($inputSubject)
    {
        $this->subject = $inputSubject;
    }

    /**
     * @return array
     */
    public function parseStatusCodes()
    {
        $pattern = '/(?!HTTP[^"]*") (' . implode("|", self::STATUS_CODES) . ')/';
        preg_match_all($pattern, $this->subject, $matches);
        $result = array_map('trim', $matches[0]);

        return $result;
    }
}