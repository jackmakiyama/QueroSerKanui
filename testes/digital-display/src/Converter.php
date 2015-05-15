<?php

namespace Kanui\DigitalDisplay;

use \InvalidArgumentException as Argument;

class Converter
{
    /**
     * @var Split
     */
    private $splitDigitalNumbers;
    /**
     * @var Numbers
     */
    private $numbers;

    /**
     * @param string $splitDigitalNumbers
     */
    public function __construct(
        Split $splitDigitalNumbers,
        Numbers $numbers = null
    ) {
        $this->splitDigitalNumbers = $splitDigitalNumbers;
        $this->numbers = $numbers ?: new Numbers;
    }

    /**
     * @return int
     */
    public function convertToGregorian()
    {
        $numbers = $this->numbers;
        $digitalSequence = $this->splitDigitalNumbers
                                ->splitSequence();

        $gregorianSequence = null;
        foreach ($digitalSequence as $value) {
            try {
                $gregorianSequence .= $numbers->getGregorianNumber($value);
            } catch (Argument $e) {
                return '/!\\erro de formato/!\\';
            }
        }

        return $gregorianSequence;
    }
}
