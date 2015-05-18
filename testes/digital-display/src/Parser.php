<?php

namespace Kanui\DigitalDisplay;

use \InvalidArgumentException;

class Parser
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
    public function getGregorianNumbers()
    {
        $numbers = $this->numbers;
        $digitalSequence = $this->splitDigitalNumbers
                                ->splitSequence();

        try {
            $gregorianSequence = null;
            foreach ($digitalSequence as $value) {
                $gregorianSequence .= $numbers->getGregorianNumber($value);
            }
        } catch (InvalidArgumentException $e) {
            return '/!\\erro de formato/!\\';
        }

        return $gregorianSequence;
    }
}
