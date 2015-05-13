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
     * @var string
     */
    private $slicedDigitalSequence = [
        <<<'ONE'
   
  |
  |

ONE
        ,
        <<<'TWO'
 _ 
 _|
|_ 

TWO
        ,
        <<<'THREE'
 _ 
 _|
 _|

THREE
        ,
        <<<'FOUR'
   
|_|
  |

FOUR
        ,
        <<<'FIVE'
 _ 
|_ 
 _|

FIVE
        ,
        <<<'SIX'
 _ 
|_ 
|_|

SIX
        ,
        <<<'SEVEN'
 _ 
  |
  |

SEVEN
        ,
        <<<'EIGHT'
 _ 
|_|
|_|

EIGHT
        ,
        <<<'NINE'
 _ 
|_|
 _|

NINE
    ];
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
     * @return array
     */
    public function getSlicedDigitalSequence()
    {
        return $this->slicedDigitalSequence;
    }

    /**
     * @return int
     */
    public function getGregorianSequence()
    {
        return $this->gregorianSequence;
    }
}
