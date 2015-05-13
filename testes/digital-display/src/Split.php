<?php

namespace Kanui\DigitalDisplay;

class Split
{
    /**
     * @var string
     */
    private $digitalNumber;

    /**
     * @param string $digitalNumber
     */
    public function __construct($digitalNumber)
    {
        $this->digitalNumber = $digitalNumber;
    }

    /**
     * @return array
     */
    public function splitSequence()
    {
        $digitalNumber = $this->convertSpaceToDot();
        $digits = $this->getSeparatedLineDigits($digitalNumber);
        $separatedDigits = $this->getSeparatedDigits($digits);
        $separatedDigits = $this->addLastLine($separatedDigits);
        $stringDigits = $this->getStringDigits($separatedDigits);
        $digits = $this->convertDotToSpace($stringDigits);

        return $digits;
    }

    /**
     * @return array
     */
    private function convertSpaceToDot()
    {
        return str_replace(' ', '.', $this->digitalNumber);
    }

    /**
     * @param string $digitalNumber
     *
     * @return array
     */
    private function getSeparatedLineDigits($digitalNumber)
    {
        $lines = explode(PHP_EOL, $digitalNumber);

        return $this->separateLinesByDigit($lines);
    }

    /**
     * @param array $lines
     *
     * @return array
     */
    private function separateLinesByDigit($lines)
    {
        array_walk($lines, function(&$value) {
            $marker = 'A';
            $value = explode($marker, wordwrap($value, 3, $marker, true));
        });

        return $lines;
    }

    /**
     * @param array $lines
     *
     * @return array
     */
    private function getSeparatedDigits($lines)
    {
        $digits = [];
        array_walk_recursive($lines, function($value, $key) use (&$digits) {
            if (! isset($digits[$key])) {
                $digits[$key] = [];
            }

            array_push($digits[$key], $value);
        });

        return $digits;
    }

    /**
     * @param array $digit
     *
     * @return array
     */
    private function addLastLine($digit)
    {
        array_walk($digit, function(&$value) {
            if (count($value) == 3) {
                $value[2] .= PHP_EOL;
            }
        });

        return $digit;
    }

    /**
     * @param array $digits
     *
     * @return array
     */
    public function getStringDigits($digits)
    {
        array_walk($digits, function(&$value) {
            $value = implode(PHP_EOL, $value);
        });

        return $digits;
    }

    /**
     * @param array $digits
     *
     * @return array
     */
    public function convertDotToSpace($digits)
    {
        array_walk($digits, function(&$value) {
            $value = str_replace('.', ' ', $value);
        });

        return $digits;
    }
}
