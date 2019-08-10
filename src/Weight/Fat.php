<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Weight;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Weight\Fat\Log;

class Fat
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns weight data for an specified date
     * in the format requested using units in the unit system that corresponds
     * to the Accept-Language header provided.
     *
     * @param Carbon $date
     * @param Period $period
     */
    public function getByDate(Carbon $date)
    {
        return $this->fitbit->get(implode('/', [
            'body',
            'log',
            'fat',
            'date',
            $date->format('Y-m-d')
          ]) . '.json');
    }
    
    /**
     * Returns weight data in the specified period from the specified date
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

    /**
     * Returns weight data from one providen date to another providen date
     * in the format requested using units in the unit system that corresponds
     * to the Accept-Language header provided.
     *
     * @param Carbon $baseDate
     * @param Carbon $endDate
     */
    public function getByDateRange(Carbon $baseDate, Carbon $endDate)
    {
        return $this->fitbit->get(implode('/', [
            'body',
            'log',
            'fat',
            'date',
            $baseDate->format('Y-m-d'),
            $endDate->format('Y-m-d'),
          ]) . '.json');
    }

    /**
     * Creates log entry for body fat and returns the response in the format requested.
     *
     * @param Log $log
     */
    public function add(Log $log)
    {
      return $this->fitbit->post(implode('/', [
            'body',
            'log',
            'fat',
          ]) . '.json?' . $log->asUrlParam());
    }

    /**
     * Removes log entry for body fat.
     *
     * @param string $logId
     */
    public function remove(string $logId)
    {
      return $this->fitbit->delete(implode('/', [
            'body',
            'log',
            'fat',
            $logId,
          ]) . '.json');
    }
}
