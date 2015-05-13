<?php

namespace Kanui\DigitalDisplay\Assets;

class Numbers
{
    /**
     * @var string
     */
    private $digitalSequence = <<<'DIGITAL'
    _  _     _  _  _  _  _
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

DIGITAL;
    /**
     * @var int
     */
    private $gregorianSequence = 123456789;

    /**
     * @return string
     */
    public function getDigitalSequence()
    {
        return $this->digitalSequence;
    }

    /**
     * @return int
     */
    public function getGregorianSequence()
    {
        return $this->gregorianSequence;
    }
}
