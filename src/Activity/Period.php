<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

class Period
{

    const ONE_DAY = 0;
    const SEVEN_DAYS = 1;
    const THIRTY_DAYS = 2;
    const ONE_WEEK = 3;
    const ONE_MONTH = 4;
    const THREE_MONTHS = 5;
    const SIX_MONTHS = 6;
    const ONE_YEAR = 7;

    private $period;

    public function __construct(int $period)
    {
        if ($period < self::ONE_DAY || $period > self::ONE_MONTH) {
            //TODO: Throw an exception
        }
        $this->period = $period;
    }

    public function asUrlParam()
    {
        switch ($this->period) {
            case self::ONE_DAY:
                return '1d';
            case self::SEVEN_DAYS:
                return '7d';
            case self::THIRTY_DAYS:
                return '30d';
            case self::ONE_WEEK:
                return '1w';
            case self::ONE_MONTH:
                return '1m';
            case self::THREE_MONTHS:
                return '3m';
            case self::SIX_MONTHS:
                return '6m';
            case self::ONE_YEAR:
                return '1y';
            default:
                //TODO: Thrown an exception
                return null;
        }
    }
}
