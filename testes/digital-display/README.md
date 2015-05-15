# Digital Display

## Modo de usar

```php
<?php

use Kanui\DigitalDisplay\Parser;
use Kanui\DigitalDisplay\Split;

$digitalNumber = <<<'DIGITAL'
    _  _     _  _  _  _  _ 
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

DIGITAL;

$splitSequence = new Split($digitalNumber);
$parser = new Parser($splitSequence);

echo $parser->getGregorianNumbers();
// return: 123456789
```

