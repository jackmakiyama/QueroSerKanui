<?php

namespace Kanui\DigitalDisplay;

use Kanui\DigitalDisplay\Assets\Numbers;

/**
 * @large
 */
class ParserTest extends \PHPUnit_Framework_TestCase
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
     * @covers Kanui\DigitalDisplay\Parser::__construct
     *
     * @expectedException PHPUnit_Framework_Error
     */
    public function instantiateWithoutArgumentsShouldThrownAPhpError()
    {
        return new Parser;
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Parser::__construct
     */
    public function instantiateWithArgumentsShouldWork()
    {
        $parser = new Parser($this->digitalInput);

        $this->assertAttributeEquals($this->digitalInput, 'splitDigitalNumbers', $parser);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Parser::getGregorianNumbers
     */
    public function shouldConvertDigitalNumberToGregorianNumber()
    {
        $parser = new Parser($this->digitalInput);

        $this->assertEquals($this->gregorianOutput, $parser->getGregorianNumbers());
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Parser::getGregorianNumbers
     */
    public function shouldReturnAStringWithAErrorMessageWhenTryConvertAIncorrectDigitalNumber()
    {
        $parser = new Parser($this->incorrectDigitalInput);

        $this->assertEquals('/!\\erro de formato/!\\', $parser->getGregorianNumbers());
    }
}
