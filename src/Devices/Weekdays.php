<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Devices;

use Namelivia\Fitbit\BasicEnum;

class Weekdays extends BasicEnum
{
    const MONDAY = 'MONDAY';
    const TUESDAY = 'TUESDAY';
    const WEDNESDAY = 'WEDNESDAY';
    const THURSDAY = 'THURSDAY';
    const FRIDAY = 'FRIDAY';
    const SATURDAY = 'SATURDAY';
    const SUNDAY = 'SUNDAY';

    private $weekdays;

    public function __construct(array $weekdays)
    {
        foreach ($weekdays as $weekday) {
            parent::checkValidity($weekday);
        }
        $this->weekdays = $weekdays;
    }

    public function __toString()
    {
        return implode(',', $this->weekdays);
    }
}
