<?php

namespace Kanui\DigitalDisplay;

use Kanui\DigitalDisplay\Assets\Numbers;

/**
 * @large
 */
class ConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $digitalInput;
    /**
     * @var int
     */
    protected $gregorianOutput;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $assetsNumbers = new Numbers;
        $this->digitalInput = $assetsNumbers->getDigitalSequence();
        $this->gregorianOutput = $assetsNumbers->getGregorianSequence();
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
        $converter = new Converter($this->digitalInput);

        $this->assertAttributeEquals($this->digitalInput, 'digitalNumber', $converter);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Converter::converter
     */
    public function shouldConvertDigitalNumberToGregorianNumber()
    {
        $converter = new Converter($this->digitalInput);

        $this->assertEquals($this->gregorianOutput, $converter->converter());
    }
}
