<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use GuzzleHttp\Client;
use Carbon\Carbon;
use Namelivia\Fitbit\Resource\AbstractResource;

class Activity
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Retrieves a summary and list of a user's
	 * activities and activity log entries for a given day in the format requested
	 * using units in the unit system which corresponds to the Accept-Language header provided.
	 *
	 * @param Carbon $date
	 * @param int $userId
	 */
	public function getDailyActivitySummary(Carbon $date, int $userId = null)
	{
		$formattedDate = $date->format('Y-m-d');
		return $this->client->get(
			'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities/date/' .
			$formattedDate . '.json'
		)->getBody()->getContents();
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
	public function getActivityTimeSeriesByPeriod(AbstractResource $resource, Carbon $date, Period $period, int $userId = null)
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
	public function getActivityTimeSeriesByDateRange(
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
	public function getActivityIntradayTimeSeriesByDateAndDetailLevel(
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

	//TODO: Create distance and distance unit classes?
	/**
	 * Creates log entry for an activity or user's private custom activity using
	 * units in the unit system which corresponds to the Accept-Language header provided (or using
	 * optional custom distanceUnit) and get a response in the format requested.
	 *
	 * @param Carbon $startTime
	 * @param int $durationMillis
	 * @param Carbon $date
	 * @param int $activityId
	 * @param string $activityName
	 * @param int $manualCalories
	 * @param int $distance
	 * @param string $distanceUnit
	 */
	public function logActivity(
		Carbon $startTime,
		int $durationMillis,
		Carbon $date,
		int $activityId,
		string $activityName,
		int $manualCalories,
		int $distance,
		string $distanceUnit = null
	) {
		return $this->client->post(
			'https://api.fitbit.com/1/user/-/activities.json',
			[ 'json' => []]//TODO: fill the body
		)->getBody()->getContents();
	}

	/**
	 * Deletes a user's activity log entry with the given ID.
	 * A successful request will return a 204 status code with an empty response body.
	 *
	 * @param int $activityLogId
	 */
	public function deleteActivityLog(int $activityLogId)
	{
		return $this->client->delete(
			'https://api.fitbit.com/1/user/-/activities/' . $activityLogId . '.json'
		)->getBody()->getContents();
	}

	//TODO: A class for sort methods?
	/**
	 * Retrieves a list of a user's activity log
	 * entries before after a given day with offset and limit using units in the unit system
	 * which corresponds to the Accept-Language header provided.
	 *
	 * @param Carbon $afterDate
	 * @param string $sort
	 * @param int $limit
	 * @param int $userId
	 */
	public function getActivityLogsListAfter(
		Carbon $afterDate,
		string $sort,
		int $limit,
		int $userId = null
	) {
		$formattedAfterDate = $afterDate->format('Y-m-d');
		return $this->client->get(
		  'https://api.fitbit.com/1/user/' . 
			$this->getUserUrlParam($userId) .
			'/activities/list.json?' .
			'&afterDate=' . $formattedAfterDate .
			'&sort=' . $sort .
			'&limit=' . $limit .
			'&offset=0'
		)->getBody()->getContents();
	}

	/**
	 * Retrieves a list of a user's activity log
	 * entries before a given day with offset and limit using units in the unit system
	 * which corresponds to the Accept-Language header provided.
	 *
	 * @param Carbon $beforeDate
	 * @param string $sort
	 * @param int $limit
	 * @param int $userId
	 */
	public function getActivityLogsListBefore(
		Carbon $beforeDate,
		string $sort,
		int $limit,
		int $userId = null
	) {
		$formattedBeforeDate = $beforeDate->format('Y-m-d');
		return $this->client->get(
		  'https://api.fitbit.com/1/user/' . 
			$this->getUserUrlParam($userId) .
			'/activities/list.json?' .
			'beforeDate=' . $formattedBeforeDate .
			'&sort=' . $sort .
			'&limit=' . $limit .
			'&offset=0'
		)->getBody()->getContents();
	}

	/**
	 * Retrieves the details of a user's location and heart rate data during
	 * a logged exercise activity.
	 *
	 * @param int $logId
	 * @param int $userId
	 */
	public function getActivityTCX(int $logId, int $userId = null)
	{
		return $this->client->get(
		  'https://api.fitbit.com/1/user/' . 
			$this->getUserUrlParam($userId) .
			'/activities/' . $logId . '.tcx'
		)->getBody()->getContents();
	}

	/**
	 * Get a tree of all valid Fitbit public activities from the activities catalog as well as private custom
	 * activities the user created in the format requested. If the activity has levels, also
	 * get a list of activity level details.
	 *
	 */
	public function browseActivityTypes()
	{
		return $this->client->get('https://api.fitbit.com/1/activities.json')->getBody()->getContents();
	}

	/**
	 * Returns the details of a specific activity in the Fitbit activities database in the format requested.
	 * If activity has levels, also returns a list of activity level details.
	 *
	 * @param int $activityId
	 */
	public function getActivityTypes(int $activityId)
	{
		return $this->client->get('https://api.fitbit.com/1/activities/' . $activityId . '.json')->getBody()->getContents();
	}

	/**
	 * Retrieves a list of a user's frequent activities in the
	 * format requested using units in the unit system which corresponds to the Accept-Language header provided.
	 * A frequent activity record contains the distance and duration values recorded
	 * the last time the activity was logged.
	 * The record retrieved can be used to log the activity via the Log Activity endpoint with the same or
	 * adjusted values for distance and duration.
	 */
	public function getFrequentActivities()
	{
		return $this->client->get('https://api.fitbit.com/1/user/-/activities/frequent.json')->getBody()->getContents();
	}

	/**
	 * Retrieves a list of a user's recent activities types
	 * logged with some details of the last activity log of that type using units in the unit system which
	 * corresponds to the Accept-Language header provided. The record retrieved can be used to log the
	 * activity via the Log Activity endpoint with the same or adjusted values for distance and duration.
	 */
	public function getRecentActivityTypes()
	{
		return $this->client->get('https://api.fitbit.com/1/user/-/activities/recent.json')->getBody()->getContents();
	}

	/**
	 * Retrieves the user's activity statistics in the format requested
	 * using units in the unit system which corresponds to the Accept-Language header provided. Activity
	 * statistics includes Lifetime and Best achievement values from the My Achievements tile on the website
	 * dashboard. Response contains both statistics from the tracker device and total numbers including
	 * tracker data and manual activity log entries as seen on the Fitbit website dashboard.
	 *
	 * @param int $userId
	 */
	public function getLifetimeStats(int $userId = null)
	{
		$url = 'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities.json';
		return $this->client->get($url)->getBody()->getContents();
	}

	private function getUserUrlParam(int $userId = null)
	{
		return is_null($userId) ? '-' : (string) $userId;
	}
}
