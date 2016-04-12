<?php

namespace Tworzenieweb\CyclicDates;

use DateTime;

/**
 * Use this class for estimating events occuring on every month. For example having an estimation
 * of event occuring for every month in 2 weeks interval is as simple as
 * RepetitiveDateEstimator::build(new DateTime(), RepeatitiveInterval::twoWeeks())
 * This will show 2 dates for each month one scheduled for 15th and second for 29th
 *
 * @package Tworzenieweb\CyclicDates
 */
class RepetitiveDateEstimator
{
    /**
     * @var DateTime
     */
    private $referenceDate;

    /**
     * @var RepetitiveInterval
     */
    private $interval;



    /**
     * @param DateTime           $referenceDate
     * @param RepetitiveInterval $interval
     */
    private function __construct(DateTime $referenceDate, RepetitiveInterval $interval)
    {
        $this->referenceDate = $referenceDate;
        $this->interval = $interval;
    }



    /**
     * @param DateTime           $referenceDate
     * @param RepetitiveInterval $interval
     *
     * @return RepetitiveDateEstimator
     */
    public static function build(DateTime $referenceDate, RepetitiveInterval $interval)
    {
        $repetitiveDateEstimator = new self($referenceDate, $interval);

        return $repetitiveDateEstimator;
    }



    /**
     * @return DateTime
     */
    public function getNextDate()
    {
        $referenceWithoutTime = clone $this->referenceDate;

        $dayOfMonth = (int)$referenceWithoutTime->format('j');
        $repetitiveInterval = $this->interval->interval();
        $moduloInterval = $dayOfMonth % $repetitiveInterval;

        if ($moduloInterval === 0) {
            $daysToAdd = 1;
        } else {
            $daysToAdd = $repetitiveInterval - ($moduloInterval);
            $daysInCurrentMonth = (int)$referenceWithoutTime->format('t');

            if ($dayOfMonth + $daysToAdd >= $daysInCurrentMonth) {
                $daysToAdd += ($daysInCurrentMonth - $dayOfMonth - ($daysToAdd - $repetitiveInterval));
            }
            $daysToAdd++;
        }

        $nextDate = clone $referenceWithoutTime;
        $nextDate->modify(sprintf('+ %d days', $daysToAdd));

        return $nextDate;
    }
}