<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Goals;

use Namelivia\Fitbit\BasicEnum;

class Period extends BasicEnum
{
    const DAILY = 'daily';
    const WEEKLY = 'weekly';

    private $period;

    public function __construct(string $period)
    {
        parent::checkValidity($period);
        $this->period = $period;
    }

    public function __toString()
    {
        return $this->period;
    }
}
