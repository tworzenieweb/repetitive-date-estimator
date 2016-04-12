<?php

namespace Tworzenieweb\CyclicDates;

use InvalidArgumentException;

/**
 * @author  Luke Adamczewski
 * @package Tworzenieweb\CyclicDates
 */
class RepetitiveInterval
{
    const ONE_WEEK = 7;
    const TWO_WEEKS = 14;

    /**
     * @var int
     */
    private $interval;



    /**
     * @param $interval
     */
    private function __construct($interval)
    {
        if (!is_numeric($interval)) {
            throw new InvalidArgumentException(sprintf('Provided interval %s is not numeric', $interval));
        }

        if (!$interval) {
            throw new InvalidArgumentException(
                sprintf('Interval needs to be greater than 1 to make sense. "%s" provided', $interval)
            );
        }

        $this->interval = (int)$interval;
    }



    /**
     * @return int
     */
    public function interval()
    {
        return $this->interval;
    }



    /**
     * @return RepetitiveInterval
     */
    public static function oneWeek()
    {
        return new self(self::ONE_WEEK);
    }



    /**
     * @return RepetitiveInterval
     */
    public static function twoWeeks()
    {
        return new self(self::TWO_WEEKS);
    }



    /**
     * @param int $number
     *
     * @return RepetitiveInterval
     */
    public static function fromNumber($number)
    {
        return new self($number);
    }
}