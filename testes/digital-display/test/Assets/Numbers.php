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
    private $digitalIncorrectSequence = <<<'DIGITAL'
    _  _     _  _  _  _  _ 
  | _| _||_||_ |_   ||_|| |
  ||_  _|  | _||_|  ||_| _|

DIGITAL;
    /**
     * @var array
     */
    private $slicedDigitalSequence = [
        1 => <<<'ONE'
   
  |
  |

ONE
        ,
        2 => <<<'TWO'
 _ 
 _|
|_ 

TWO
        ,
        3 => <<<'THREE'
 _ 
 _|
 _|

THREE
        ,
        4 => <<<'FOUR'
   
|_|
  |

FOUR
        ,
        5 => <<<'FIVE'
 _ 
|_ 
 _|

FIVE
        ,
        6 => <<<'SIX'
 _ 
|_ 
|_|

SIX
        ,
        7 => <<<'SEVEN'
 _ 
  |
  |

SEVEN
        ,
        8 => <<<'EIGHT'
 _ 
|_|
|_|

EIGHT
        ,
        9 => <<<'NINE'
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
     * @return string
     */
    public function getDigitalIncorrectSequence()
    {
        return $this->digitalIncorrectSequence;
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
