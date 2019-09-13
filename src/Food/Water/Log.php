<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Water;

use Carbon\Carbon;

class Log
{
    private $amount;
    private $date;
    private $unit;

    public function __construct(
        Carbon $date,
        int $amount,
        Unit $unit = null
    ) {
        $this->date = $date->format('Y-m-d');
        $this->amount = $amount / 10;
        $this->unit = $unit;
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'date' => $this->date,
            'unit' => is_null($this->unit) ? null : (string) $this->unit,
            'amount' => $this->amount,
        ]);
    }
}
