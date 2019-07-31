<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\SleepLogs;

use Carbon\Carbon;

class Log
{
    private $startTime;
    private $durationMillis;
    private $date;

    public function __construct(
        Carbon $startDateTime,
        int $durationMillis
    ) {
        $this->startTime = $startDateTime->format('H:i');
        $this->durationMillis = $durationMillis;
        $this->date = $startDateTime->format('Y-m-d');
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'startTime' => $this->startTime,
            'duration' => $this->durationMillis,
            'date' => $this->date,
        ]);
    }
}
