<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Goals;

class Period
{
    const DAILY = 'daily';
    const WEEKLY = 'weekly';

    private $period;

    public function __construct(string $period)
    {
        if ($period < self::DAILY || $period > self::WEEKLY) {
            //TODO: Throw an exception
        }
        $this->period = $period;
    }

    public function __toString()
    {
        return $this->period;
    }
}
