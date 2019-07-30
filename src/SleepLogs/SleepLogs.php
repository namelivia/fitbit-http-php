<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\SleepLogs;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class SleepLogs
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * getByDate returns a summary and list of a user's sleep log entries (including naps)
     * as well as detailed sleep entry data for a given day.
     * This endpoint supports two kinds of sleep data:
     * stages : Levels data is returned with 30-second granularity.
     * 'Sleep Stages' levels include deep, light, rem, and wake.
     * classic : Levels data returned with 60-second granularity.
     * 'Sleep Pattern' levels include asleep, restless, and awake.
     * The response could be a mix of classic and stages sleep logs.
     *
     * @param Carbon $date
     */
    public function getByDate(Carbon $date)
    {
        return $this->fitbit->getv12Endpoint(implode('/', ['sleep', 'date', $date->format('Y-m-d')]) . '.json');
    }

    /**
     * getByDateRange returns a summary and list of a user's sleep log entries (including naps)
     * as well as detailed sleep entry data between the startDate and endDate.
     * This endpoint supports two kinds of sleep data:
     * stages : Levels data is returned with 30-second granularity.
     * 'Sleep Stages' levels include deep, light, rem, and wake.
     * classic : Levels data returned with 60-second granularity.
     * 'Sleep Pattern' levels include asleep, restless, and awake.
     * The response could be a mix of classic and stages sleep logs.
     *
     * @param Carbon $date
     */
    public function getByDateRange(Carbon $startDate, Carbon $endDate)
    {
      return $this->fitbit->getv12Endpoint(
        implode('/', ['sleep', 'date', $startDate->format('Y-m-d'), $endDate->format('Y-m-d')]) . '.json'
      );
    }

    /**
     * Retrieves a list of a user's sleeps logs (including naps).
     * entries after a given day with offset and limit using units in the unit system
     * which corresponds to the Accept-Language header provided.
     *
     * @param Carbon $date
     * @param string $sort
     * @param int $limit
     */
    public function listAfter(
      Carbon $date,
      string $sort,
      int $limit
    ) {
        return $this->fitbit->getv12Endpoint(
            'sleep/list.json?' .
            http_build_query([
              'afterDate' => $date->format('Y-m-d'),
              'sort' => $sort,
              'limit' => $limit,
              'offset' => 0,
            ])
        );
    }

    /**
     * Retrieves a list of a user's sleeps logs (including naps).
     * entries before a given day with offset and limit using units in the unit system
     * which corresponds to the Accept-Language header provided.
     *
     * @param Carbon $date
     * @param string $sort
     * @param int $limit
     */
    public function listBefore(
      Carbon $date,
      string $sort,
      int $limit
    ) {
        return $this->fitbit->getv12Endpoint(
            'sleep/list.json?' .
            http_build_query([
              'beforeDate' => $date->format('Y-m-d'),
              'sort' => $sort,
              'limit' => $limit,
              'offset' => 0,
            ])
        );
    }
}
