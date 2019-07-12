<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use Carbon\Carbon;
use Namelivia\Fitbit\Activity\Resource\AbstractResource;
use Namelivia\Fitbit\Api\Fitbit;

class Intraday
{
    private $client;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns the Intraday Time Series for a given resource in the format requested.
     * The endpoint mimics the Get Activity Time Series endpoint. If your application has the appropriate access,
     * your calls to a time series endpoint for a specific day (by using start and end dates on the same day or a
     * period of 1d), the response will include extended intraday values with a 1-minute detail level for that day.
     * Unlike other time series calls that allow fetching data of other users,
     * intraday data is available only for and to the authorized user.
     *
     * @param Carbon $date
     * @param string $resourcePath
     * @param DetailLevel $detailLevel
     */
    public function getForOneDay(
        Carbon $date,
        AbstractResource $resource,
        DetailLevel $detailLevel = null
    ) {
        $formattedDate = $date->format('Y-m-d');

        return $this->fitbit->get(
            $resource->asUrlParam() .
            '/date/' .
            $formattedDate .
            '/1d/' .
            $detailLevel->asUrlParam() .
            '.json'
        );
    }

    /**
     * Returns the Intraday Time Series for a given resource in the format requested.
     * The endpoint mimics the Get Activity Time Series endpoint. If your application has the appropriate access,
     * your calls to a time series endpoint for a specific day (by using start and end dates on the same day or a
     * period of 1d), the response will include extended intraday values with a 1-minute detail level for that day.
     * Unlike other time series calls that allow fetching data of other users,
     * intraday data is available only for and to the authorized user.
     *
     * @param Carbon $date
     * @param Carbon $startTime
     * @param Carbon $endTime
     * @param string $resourcePath
     * @param DetailLevel $detailLevel
     */
    public function getForOneDayAndTimeRange(
        Carbon $date,
        Carbon $startTime,
        Carbon $endTime,
        AbstractResource $resource,
        DetailLevel $detailLevel = null
    ) {
        $formattedDate = $date->format('Y-m-d');
        $formattedStartTime = $startTime->format('H:i:s');
        $formattedEndTime = $endTime->format('H:i:s');

        return $this->fitbit->get(
            $resource->asUrlParam() .
            '/date/' .
            $formattedDate .
            '/1d/' .
            $detailLevel->asUrlParam() .
            '.json'
        );
    }

    /**
     * Returns the Intraday Time Series for a given resource in the format requested.
     * The endpoint mimics the Get Activity Time Series endpoint. If your application has the appropriate access,
     * your calls to a time series endpoint for a specific day (by using start and end dates on the same day or a
     * period of 1d), the response will include extended intraday values with a 1-minute detail level for that day.
     * Unlike other time series calls that allow fetching data of other users,
     * intraday data is available only for and to the authorized user.
     *
     * @param Carbon $starDate
     * @param Carbon $endDate
     * @param string $resourcePath
     * @param DetailLevel $detailLevel
     */
    public function getForADateRange(
        Carbon $startDate,
        Carbon $endDate,
        AbstractResource $resource,
        DetailLevel $detailLevel = null
    ) {
        $formattedStartDate = $startDate->format('Y-m-d');
        $formattedEndDate = $endDate->format('Y-m-d');

        return $this->fitbit->get(
            $resource->asUrlParam() .
            '/date/' .
            $formattedStartDate .
            $formattedEndDate .
            $detailLevel->asUrlParam() .
            '.json'
        );
    }

    /**
     * Returns the Intraday Time Series for a given resource in the format requested.
     * The endpoint mimics the Get Activity Time Series endpoint. If your application has the appropriate access,
     * your calls to a time series endpoint for a specific day (by using start and end dates on the same day or a
     * period of 1d), the response will include extended intraday values with a 1-minute detail level for that day.
     * Unlike other time series calls that allow fetching data of other users,
     * intraday data is available only for and to the authorized user.
     *
     * @param Carbon $starDateTime
     * @param Carbon $endDateTime
     * @param string $resourcePath
     * @param DetailLevel $detailLevel
     */
    public function getForADateTimeRange(
        Carbon $startDateTime,
        Carbon $endDateTime,
        AbstractResource $resource,
        DetailLevel $detailLevel = null
    ) {
        $formattedStartDate = $startDateTime->format('Y-m-d');
        $formattedStartTime = $startDateTime->format('H:i:s');
        $formattedEndDate = $endDateTime->format('Y-m-d');
        $formattedEndTime = $endDateTime->format('H:i:s');

        return $this->fitbit->get(
            $resource->asUrlParam() .
            '/date/' .
            $formattedStartDate .
            $formattedEndDate .
            '/time/' .
            $formattedStartTime .
            $formattedEndTime .
            $detailLevel->asUrlParam() .
            '.json'
        );
    }
}
