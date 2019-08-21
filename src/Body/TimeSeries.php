<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Body;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class TimeSeries
{
    private $client;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns time series data in the specified period from the specified date
     * for a given resource in the format requested using units in the unit system that corresponds
     * to the Accept-Language header provided.
     *
     * @param resource $resource
     * @param Carbon $date
     * @param Period $period
     */
    public function getByPeriod(Resource $resource, Carbon $date, Period $period)
    {
        return $this->fitbit->get(implode('/', [
            'body',
            $resource,
            'date',
            $date->format('Y-m-d'),
            $period,
          ]) . '.json');
    }

    /**
     * Returns time series data in the specified range
     * for a given resource in the format requested using units in the unit system that corresponds
     * to the Accept-Language header provided.
     *
     * @param resource $resource
     * @param Carbon $baseDate
     * @param Carbon $endDate
     */
    public function getByDateRange(
        Resource $resource,
        Carbon $baseDate,
        Carbon $endDate
    ) {
        return $this->fitbit->get(implode('/', [
            'body',
            $resource,
            'date',
            $baseDate->format('Y-m-d'),
            $endDate->format('Y-m-d'),
          ]) . '.json');
    }
}
