<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use GuzzleHttp\Client;
use Carbon\Carbon;
use Namelivia\Fitbit\Activity\Resource\AbstractResource;

class TimeSeries
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Returns time series data in the specified period from the specified date
	 * for a given resource in the format requested using units in the unit system that corresponds
	 * to the Accept-Language header provided.
	 *
	 * @param AbstractResource $resource
	 * @param Carbon $date
	 * @param Period $period
	 * @param int $userId
	 */
	public function getByPeriod(AbstractResource $resource, Carbon $date, Period $period, int $userId = null)
	{
		$formattedDate = $date->format('Y-m-d');
		return $this->client->get(
			'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/' .
			$resource->asUrlParam() .
			'/date/' .
			$formattedDate .
			'/' .
			$period->asUrlParam() .
			'.json'
		)->getBody()->getContents();
	}

	/**
	 * Returns time series data in the specified range
	 * for a given resource in the format requested using units in the unit system that corresponds
	 * to the Accept-Language header provided.
	 *
	 * @param AbstractResource $resource
	 * @param Carbon $baseDate
	 * @param Carbon $endDate
	 * @param int $userId
	 */
	public function getByDateRange(
		AbstractResource $resource,
		Carbon $baseDate,
		Carbon $endDate,
		int $userId = null
	) {
		$formattedBaseDate = $baseDate->format('Y-m-d');
		$formattedEndDate = $endDate->format('Y-m-d');
		return $this->client->get(
			'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/' .
			$resource->asUrlParam() .
			'/date/' .
			$formattedBaseDate .
			'/' .
			$formattedEndDate .
			'.json'
		)->getBody()->getContents();
	}

	//TODO: This endpoint has a disclaimer that I should carefully read:
	// https://dev.fitbit.com/build/reference/web-api/activity/#get-activity-intraday-time-series
	//TODO: There are four posible endpoints for this one
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
	public function getIntradayByDateAndDetailLevel(
		Carbon $date,
		AbstractResource $resource,
		DetailLevel $detailLevel = null
	) {
		$formattedDate = $date->format('Y-m-d');
		return $this->client->get(
			'https://api.fitbit.com/1/user/-/' .
			$resource->asUrlParam() .
			'/date/' .
			$formattedDate .
			'/1d/' .
			$detailLevel->asUrlParam() .
			'.json'
		)->getBody()->getContents();
	}

	private function getUserUrlParam(int $userId = null)
	{
		return is_null($userId) ? '-' : (string) $userId;
	}
}
