<?php

namespace Kanui\DigitalDisplay;

class Converter
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
     * @return int
     */
    public function converter()
    {
        return 123456789;
    }
}
