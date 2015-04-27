<?php

namespace Kanui\DigitalDisplay;

class ConverterTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->digitalInput = <<<'DIGITAL'
    _  _     _  _  _  _  _
  | _| _||_||_ |_   ||_||_|
  ||_  _|  | _||_|  ||_| _|

DIGITAL;
        $this->gregorianOutput = 123456789;
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Converter::__construct
     *
     * @expectedException PHPUnit_Framework_Error
     */
    public function instantiateWithoutArgumentsShouldThrownAPhpError()
    {
        return new Converter;
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Converter::__construct
     */
    public function instantiateWithArgumentsShouldWork()
    {
        $parser = new Converter($this->digitalInput);

        $this->assertAttributeEquals($this->digitalInput, 'digitalNumber', $parser);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Converter::converter
     */
    public function shouldConvertDigitalNumberToGregorianNumber()
    {
        $parser = new Converter($this->digitalInput);

        $this->assertEquals($this->gregorianOutput, $parser->converter());
    }
}
