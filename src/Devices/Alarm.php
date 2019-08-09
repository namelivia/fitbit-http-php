<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Devices;

use Carbon\Carbon;

class Alarm
{
    private $time;
    private $enabled;
    private $recurring;
    private $weekDays;

    public function __construct(
        Carbon $time,
        bool $enabled,
        bool $recurring,
        string $weekDays //TODO: Array of constants
    ) {
        $this->time = $time->format('H:m') . $time->getOffsetString();
        $this->enabled = $enabled;
        $this->recurring = $recurring;
        $this->weekDays = $weekDays;
    }

    /**
     * Returns the alarm parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'time' => $this->time,
            'enabled' => $this->enabled ? 'true' : 'false',
            'recurring' => $this->recurring ? 'true' : 'false',
            'weekDays' => $this->weekDays,
        ]);
    }
}
