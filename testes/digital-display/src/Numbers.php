<?php

namespace Kanui\DigitalDisplay;

use \InvalidArgumentException as Argument;

class Numbers
{
    /**
     * @var array
     */
    private static $numbers = [
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
        ,
        0 => <<<'ZERO'
 _ 
| |
|_|

ZERO
    ];

    /**
     * @param string $digitalNumber
     *
     * @return int
     */
    public static function getGregorianNumber($digitalNumber)
    {
        $gregorians = array_flip(self::$numbers);

        if (! isset($gregorians[$digitalNumber])) {
            throw new Argument('Invalid digital number');
        }

        return $gregorians[$digitalNumber];
    }
}
