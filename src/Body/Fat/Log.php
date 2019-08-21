<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Body\Fat;

use Carbon\Carbon;

class Log
{
    private $fat;
    private $date;
    private $time;

    public function __construct(int $fat, Carbon $dateTime)
    {
        $this->fat = $fat / 100;
        $this->date = $dateTime->format('Y-m-d');
        $this->time = $dateTime->format('H:i:s');
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'fat' => $this->fat,
            'date' => $this->date,
            'time' => $this->time,
        ]);
    }
}
