<?php

namespace Kanui\DigitalDisplay;

use Kanui\DigitalDisplay\Assets\Numbers as AssetsNumbers;

/**
 * @small
 */
class NumbersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $slicedDigitalOutput;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $assetsNumbers = new AssetsNumbers;
        $this->slicedDigitalOutput = $assetsNumbers->getSlicedDigitalSequence();
    }

    /**
     * @test
     */
    public function instantiateWithoutArgumentsShouldWork()
    {
        $numbers = new Numbers;

        $this->assertInstanceOf(Numbers::class, $numbers);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Numbers::getGregorianNumber
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid digital number
     */
    public function expectedAThrowExceptionWhenPassedAInvalidDigitalNumbers()
    {
        $numbers = new Numbers;
        $numbers->getGregorianNumber('---');
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Numbers::getGregorianNumber
     */
    public function expectedAGregorianNumbersWhenPassedADigitalNumbers()
    {
        $numbers = new Numbers;
        $return = $numbers->getGregorianNumber($this->slicedDigitalOutput[1]);
        $expected = 1;

        $this->assertEquals($expected, $return);
    }

    /**
     * @test
     *
     * @covers Kanui\DigitalDisplay\Numbers::getGregorianNumber
     */
    public function expectedAGregorianNumbersWhenPassedADigitalNumbersUsingStaticCall()
    {
        $return = Numbers::getGregorianNumber($this->slicedDigitalOutput[1]);
        $expected = 1;

        $this->assertEquals($expected, $return);
    }
}
