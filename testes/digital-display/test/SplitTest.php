<?php

namespace Kanui\DigitalDisplay;

use Kanui\DigitalDisplay\Assets\Numbers;

/**
 * @small
 */
class SplitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $digitalInput;
    /**
     * @var array
     */
    protected $slicedDigitalOutput;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $assetsNumbers = new Numbers;
        $this->digitalInput = $assetsNumbers->getDigitalSequence();
        $this->slicedDigitalOutput = $assetsNumbers->getSlicedDigitalSequence();
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Split::__construct
     *
     * @expectedException PHPUnit_Framework_Error
     */
    public function instantiateWithoutArgumentsShouldThrownAPhpError()
    {
        return new Split;
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Split::__construct
     */
    public function instantiateWithArgumentsShouldWork()
    {
        $split = new Split($this->digitalInput);

        $this->assertAttributeEquals($this->digitalInput, 'digitalNumber', $split);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Split::convertSpaceToDot
     * @covers Kanui\DigitalDisplay\Split::getSeparatedLineDigits
     * @covers Kanui\DigitalDisplay\Split::separateLinesByDigit
     * @covers Kanui\DigitalDisplay\Split::getSeparatedDigits
     * @covers Kanui\DigitalDisplay\Split::addLastLine
     * @covers Kanui\DigitalDisplay\Split::getStringDigits
     * @covers Kanui\DigitalDisplay\Split::convertDotToSpace
     * @covers Kanui\DigitalDisplay\Split::splitSequence
     */
    public function shouldSplitADigitalNumberSequence()
    {
        $split = new Split($this->digitalInput);
        $slicedSequence = $split->splitSequence();

        $this->assertEquals(
            array_values($this->slicedDigitalOutput),
            $slicedSequence
        );
    }
}
