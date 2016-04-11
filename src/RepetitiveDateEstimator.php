<?php

namespace Tworzenieweb\CyclicDates;

use DateTime;

/**
 * Class CyclicDates
 * @package Tworzenieweb\CyclicDates
 */
class RepetitiveDateEstimator
{
    /**
     * @var DateTime
     */
    private $referenceDate;

    /**
     * @var IntervalsCollection|DateTime[]
     */
    private $interval;

    /**
     * RepetitiveDateInterval constructor.
     *
     * @param DateTime $referenceDate
     * @param $interval
     */
    private function __construct(DateTime $referenceDate, $interval)
    {
        $this->referenceDate = $referenceDate;
        $this->interval = $interval;
    }

    /**
     * @param DateTime $referenceDate
     * @param int $interval
     *
     * @return RepetitiveDateEstimator
     */
    public static function build(DateTime $referenceDate, $interval)
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
        $referenceWithoutTime->setTime(0,0,0);

        $dayOfMonth = (int) $referenceWithoutTime->format('j');
        $daysToAdd = $this->interval - ($dayOfMonth - $this->interval * floor(($dayOfMonth-1) / $this->interval));
        $daysInCurrentMonth = (int) $referenceWithoutTime->format('t');

        if ($dayOfMonth + $daysToAdd > $daysInCurrentMonth) {
            $daysToAdd += ($daysInCurrentMonth - $dayOfMonth - ($daysToAdd - $this->interval)) ;
        }
        $daysToAdd++;

        $nextDate = clone $referenceWithoutTime;
        $nextDate->modify(sprintf('+ %d days', $daysToAdd));

        return $nextDate;
    }

    /**
     * @return DateTime
     */
    public function getPreviousDate()
    {
        $referenceWithoutTime = clone $this->referenceDate;
        $referenceWithoutTime->setTime(0,0,0);

        $dayOfMonth = (int) $referenceWithoutTime->format('j');
        $daysToSubstract = $this->interval + ($dayOfMonth - $this->interval * floor(($dayOfMonth-1) / $this->interval));
        $daysInCurrentMonth = (int) $referenceWithoutTime->format('t');


        $daysToSubstract--;

        $newDate = clone $referenceWithoutTime;
        $newDate->modify(sprintf('- %d days', $daysToSubstract));

        return $newDate;
    }
}