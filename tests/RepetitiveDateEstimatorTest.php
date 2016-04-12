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
     * @return array
     */
    public function datesForTestTwoWeeks()
    {
        return [
            [
                new DateTime('2016-01-01'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-02'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-03'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-04'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-05'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-10'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-14'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-15'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-20'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-21'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-22'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-23'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-24'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-25'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-26'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-27'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-28'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-29'),
                new DateTime('2016-02-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-30'),
                new DateTime('2016-02-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-31'),
                new DateTime('2016-02-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-02-05'),
                new DateTime('2016-02-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-02-10'),
                new DateTime('2016-02-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-02-15'),
                new DateTime('2016-02-29'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2015-12-29'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::twoWeeks(),
            ],
            [
                new DateTime('2016-01-01'),
                new DateTime('2016-01-08'),
                RepetitiveInterval::oneWeek(),
            ],
            [
                new DateTime('2016-01-01'),
                new DateTime('2016-01-06'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-01-08'),
                new DateTime('2016-01-15'),
                RepetitiveInterval::oneWeek(),
            ],
            [
                new DateTime('2016-01-06'),
                new DateTime('2016-01-11'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-01-15'),
                new DateTime('2016-01-22'),
                RepetitiveInterval::oneWeek(),
            ],
            [
                new DateTime('2016-01-11'),
                new DateTime('2016-01-16'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-01-22'),
                new DateTime('2016-01-29'),
                RepetitiveInterval::oneWeek(),
            ],
            [
                new DateTime('2016-01-16'),
                new DateTime('2016-01-21'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-01-29'),
                new DateTime('2016-02-08'),
                RepetitiveInterval::oneWeek(),
            ],
            [
                new DateTime('2016-01-21'),
                new DateTime('2016-01-26'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-01-26'),
                new DateTime('2016-01-31'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-02-26'),
                new DateTime('2016-03-06'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-04-26'),
                new DateTime('2016-05-06'),
                RepetitiveInterval::fromNumber(5),
            ],
            [
                new DateTime('2016-01-01'),
                new DateTime('2016-01-03'),
                RepetitiveInterval::fromNumber(2),
            ],
            [
                new DateTime('2016-01-31'),
                new DateTime('2016-02-03'),
                RepetitiveInterval::fromNumber(2),
            ],
            [
                new DateTime('2016-01-31'),
                new DateTime('2016-02-04'),
                RepetitiveInterval::fromNumber(3),
            ],
        ];
    }

}