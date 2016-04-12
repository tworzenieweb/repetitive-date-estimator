<?php

namespace Tworzenieweb\CyclicDates;

/**
 * @author  Luke Adamczewski
 * @package Tworzenieweb\CyclicDates
 */
class RepetitiveIntervalTest extends \PHPUnit_Framework_TestCase
{

    public function testOneWeekInterval()
    {
        $interval = RepetitiveInterval::oneWeek();
        $this->assertEquals(RepetitiveInterval::fromNumber(7), $interval);
    }



    public function testTwoWeeksInterval()
    {
        $interval = RepetitiveInterval::twoWeeks();
        $this->assertEquals(RepetitiveInterval::fromNumber(14), $interval);
    }



    public function testFromNumberInterval()
    {
        $interval = RepetitiveInterval::fromNumber(15);
        $this->assertEquals(15, $interval->interval());
    }

}
