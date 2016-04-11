<?php

namespace Tworzenieweb\CyclicDates;

use DateTime;
use PHPUnit_Framework_TestCase;

/**
 * Class CyclicDatesTest
 * @package Tworzenieweb\CyclicDates
 */
class RepetitiveDateEstimatorTest extends PHPUnit_Framework_TestCase
{


    /**
     * @dataProvider datesForTestTwoWeeks
     */
    public function testGetNextDate($date, $expectedNew, $interval)
    {
        $cyclicDates = RepetitiveDateEstimator::build($date, $interval);
        $this->assertEquals($expectedNew, $cyclicDates->getNextDate());

    }

    /**
     * @dataProvider datesForTestTwoWeeksPreviousDate
     */
    public function testGetPreviousDate($date, $expectedNew, $interval)
    {
        $cyclicDates = RepetitiveDateEstimator::build($date, $interval);
        $this->assertEquals($expectedNew, $cyclicDates->getPreviousDate());

    }

    /**
     * @return array
     */
    public function datesForTestTwoWeeks()
    {
        return [
            [
                new DateTime('2016-01-01'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-02'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-03'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-04'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-05'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-10'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-14'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-15'),
                new DateTime('2016-01-29'),
                14,
            ],
            [
                new DateTime('2016-01-20'),
                new DateTime('2016-01-29'),
                14,
            ],
            [
                new DateTime('2016-01-29'),
                new DateTime('2016-02-15'),
                14,
            ],
            [
                new DateTime('2016-01-30'),
                new DateTime('2016-02-15'),
                14,
            ],
            [
                new DateTime('2016-01-31'),
                new DateTime('2016-02-15'),
                14,
            ],
            [
                new DateTime('2016-02-05'),
                new DateTime('2016-02-15'),
                14,
            ],
            [
                new DateTime('2016-02-10'),
                new DateTime('2016-02-15'),
                14,
            ],
            [
                new DateTime('2016-02-15'),
                new DateTime('2016-02-29'),
                14,
            ],
            [
                new DateTime('2015-12-29'),
                new DateTime('2016-01-15'),
                14,
            ],
        ];
    }

    /**
     * @return array
     */
    public function datesForTestTwoWeeksPreviousDate()
    {
        return [
            [
                new DateTime('2016-01-29'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-01-30'),
                new DateTime('2016-01-15'),
                14,
            ],
            [
                new DateTime('2016-02-16'),
                new DateTime('2016-02-15'),
                14,
            ],
            [
                new DateTime('2016-02-15'),
                new DateTime('2016-01-29'),
                14,
            ],
        ];
    }

}