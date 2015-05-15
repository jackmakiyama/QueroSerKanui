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
     * @var Numbers
     */
    protected $numbers;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $assetsNumbers = new Numbers;
        $split = new Split($assetsNumbers->getDigitalSequence());
        $this->digitalInput = $split;
        $this->incorrectDigitalInput = new Split($assetsNumbers->getDigitalIncorrectSequence());
        $this->gregorianOutput = $assetsNumbers->getGregorianSequence();
        $this->numbers = new Numbers;
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

        $this->assertAttributeEquals($this->digitalInput, 'splitDigitalNumbers', $converter);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Converter::convertToGregorian
     */
    public function shouldConvertDigitalNumberToGregorianNumber()
    {
        $converter = new Converter($this->digitalInput);

        $this->assertEquals($this->gregorianOutput, $converter->convertToGregorian());
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Converter::convertToGregorian
     */
    public function shouldReturnAStringWithAErrorMessageWhenTryConvertAIncorrectDigitalNumber()
    {
        $converter = new Converter($this->incorrectDigitalInput);

        $this->assertEquals('/!\\erro de formato/!\\', $converter->convertToGregorian());
    }
}
