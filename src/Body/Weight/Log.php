<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Body\Weight;

use Carbon\Carbon;

class Log
{
    private $weight;
    private $date;
    private $time;

    public function __construct(int $weight, Carbon $dateTime)
    {
        $this->weight = $weight / 100;
        $this->date = $dateTime->format('Y-m-d');
        $this->time = $dateTime->format('H:i:s');
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'weight' => $this->weight,
            'date' => $this->date,
            'time' => $this->time,
        ]);
    }
}
