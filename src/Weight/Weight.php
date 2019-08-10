<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Weight;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Weight
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }
		
    /**
     * Returns time weight data in the specified period from the specified date
     * in the format requested using units in the unit system that corresponds
     * to the Accept-Language header provided.
     *
     * @param Carbon $date
     * @param Period $period
     */
    public function getByPeriod(Carbon $date, Period $period)
    {
        return $this->fitbit->get(implode('/', [
            'body',
            'log',
            'fat',
            'date',
            $date->format('Y-m-d'),
            $period,
          ]) . '.json');
    }
}
