<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\HeartRate;

use Namelivia\Fitbit\BasicEnum;

class Period extends BasicEnum
{
    public const ONE_DAY = '1d';
    public const SEVEN_DAYS = '7d';
    public const THIRTY_DAYS = '30d';
    public const ONE_WEEK = '1w';
    public const ONE_MONTH = '1m';

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
