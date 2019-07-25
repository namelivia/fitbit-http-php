<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class StartDay extends BasicEnum
{
    public const MONDAY = 'Monday';
    public const SUNDAY = 'Sunday';

    private $day;

    public function __construct(string $day)
    {
        parent::checkValidity($day);
        $this->day = $day;
    }

    public function __toString()
    {
        return $this->day;
    }
}
