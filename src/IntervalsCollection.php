<?php

namespace Tworzenieweb\CyclicDates;

use DateTime;
use IteratorAggregate;
use Traversable;

/**
 * Class IntervalsCollection
 * @package Tworzenieweb\CyclicDates
 */
class IntervalsCollection implements IteratorAggregate
{
    /**
     * @var DateTime[]
     */
    private $intervals;

    /**
     * IntervalsCollection constructor.
     */
    public function __construct()
    {
        $this->intervals = [];
    }

    /**
     * @param DateTime $interval
     */
    public function add(DateTime $interval)
    {
        $interval->setTime(0, 0, 0);
        array_push($this->intervals, $interval);
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->intervals);
    }
}