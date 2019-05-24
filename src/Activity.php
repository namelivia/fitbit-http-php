<?php

declare(strict_types=1);

namespace Namelivia\Fitbit;

use GuzzleHttp\Client;
use Carbon\Carbon;

class Activity
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * The Get Daily Activity Summary endpoint retrieves a summary and list of a user's
	 * activities and activity log entries for a given day in the format requested
	 * using units in the unit system which corresponds to the Accept-Language header provided.
	 *
	 * @param Carbon $date
	 * @param int $userId
	 */
	public function getDailyActivitySummary(Carbon $date, int $userId = null)
	{
		$userString = is_null($userId) ? '-' : (string) $userId;
		$formattedDate = $date->format('Y-m-d');
		return $this->client->get(
			'https://api.fitbit.com/1/user/' .
			$userString .
			'/activities/date/' .
			$formattedDate . '.json'
		)->getBody()->getContents();
	}

	//TODO: Create the period class
	//TODO: Review the phpdoc description
	/**
	 * The Get Activity Time Series endpoint returns time series data in the specified range
	 * for a given resource in the format requested using units in the unit system that corresponds
	 * to the Accept-Language header provided.
	 *
	 * @param int $userId
	 * @param string $resourcePath
	 * @param Carbon $date
	 * @param Period $period
	 */
	public function getActivityTimeSeriesByPeriod(int $userId, string $resourcePath, Carbon $date, Period $period)
	{
		//GET /1/user/[user-id]/[resource-path]/date/[date]/[period].json
	}

	//TODO: Review the phpdoc description
	/**
	 * The Get Activity Time Series endpoint returns time series data in the specified range
	 * for a given resource in the format requested using units in the unit system that corresponds
	 * to the Accept-Language header provided.
	 *
	 * @param int $userId
	 * @param string $resourcePath
	 * @param Carbon $baseDate
	 * @param Carbon $endDate
	 */
	public function getActivityTimeSeriesByDateRange(
		int $userId,
		string $resourcePath,
		Carbon $baseDate,
		Carbon $endDate
	) {
		//GET /1/user/[user-id]/[resource-path]/date/[base-date]/[end-date].json
	}

	//TODO: Create the detail level class
	//TODO: This endpoint has a disclaimer that I should carefully read:
	// https://dev.fitbit.com/build/reference/web-api/activity/#get-activity-intraday-time-series
	/**
	 * This endpoint returns the Intraday Time Series for a given resource in the format requested.
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
		string $resourcePath,
		DetailLevel $detailLevel = null
	) {
		//GET https://api.fitbit.com/1/user/-/[resource-path]/date/[date]/[date]/[detail-level].json
	}

	//TODO: Create the detail level class
	//TODO: This endpoint has a disclaimer that I should carefully read:
	// https://dev.fitbit.com/build/reference/web-api/activity/#get-activity-intraday-time-series
	/**
	 * This endpoint returns the Intraday Time Series for a given resource in the format requested.
	 * The endpoint mimics the Get Activity Time Series endpoint. If your application has the appropriate access,
	 * your calls to a time series endpoint for a specific day (by using start and end dates on the same day or a
	 * period of 1d), the response will include extended intraday values with a 1-minute detail level for that day.
	 * Unlike other time series calls that allow fetching data of other users,
	 * intraday data is available only for and to the authorized user.
	 *
	 * @param Carbon $date
	 * @param Carbon $startDate
	 * @param Carbon $endDate
	 * @param DetailLevel $detailLevel
	 */
	public function getActivityIntradayTimeSeriesByDateRangeAndDetailLevel(
		Carbon $date,
		Carbon $startDate = null,
		Carbon $endDate = null,
		DetailLevel $detailLevel = null
	) {
		//GET https://api.fitbit.com/1/user/-/[resource-path]/date/[date]/[date]/[detail-level].json
	}

	//TODO: Create distance and distance unit classes
	/**
	 * The Log Activity endpoint creates log entry for an activity or user's private custom activity using
	 * units in the unit system which corresponds to the Accept-Language header provided (or using
	 * optional custom distanceUnit) and get a response in the format requested.
	 *
	 * @param int $activityId
	 * @param string $activityName
	 * @param int $manualCalories
	 * @param Carbon $startTime
	 * @param int $durationMillis
	 * @param Carbon $date
	 * @param Distance $distance
	 * @param DistanceUnit $distanceUnit
	 */
	public function logActivity(
		int $activityId,
		string $activityName,
		int $manualCalories,
		Carbon $startTime,
		int $durationMillis,
		Carbon $date,
		Distance $distance,
		DistanceUnit $distanceUnit = null
	) {
		//POST https://api.fitbit.com/1/user/-/activities.json
	}

	/**
	 * The Delete Activity Log endpoint deletes a user's activity log entry with the given ID.
	 * A successful request will return a 204 status code with an empty response body.
	 *
	 * @param int $activityLogId
	 */
	public function deleteActivityLog(int $activityLogId)
	{
		//DELETE /1/user/-/activities/[activity-log-id].json
	}

	/**
	 * The Get Activity Logs List endpoint retrieves a list of a user's activity log
	 * entries before or after a given day with offset and limit using units in the unit system
	 * which corresponds to the Accept-Language header provided.
	 *
	 * @param int $userId
	 * @param Carbon $beforeDate
	 * @param Carbon $afterDate
	 * @param string $sort
	 * @param int $limit
	 * @param int $offset
	 */
	public function getActivityLogsList(
		int $userId,
		Carbon $beforeDate,
		Carbon $afterDate,
		string $sort,
		int $limit,
		int $offset
	) {
		//GET https://api.fitbit.com/1/user/-/activities/list.json
	}

	/**
	 * The Get Activity TCX endpoint retrieves the details of a user's location and heart rate data during
	 * a logged exercise activity.
	 *
	 * @param int $userId
	 * @param int $logId
	 */
	public function getActivityTCX(int $userId, int $logId)
	{
		//GET https://api.fitbit.com/1/user/[user-id]/activities/[log-id].tcx
	}

	/**
	 * Get a tree of all valid Fitbit public activities from the activities catalog as well as private custom
	 * activities the user created in the format requested. If the activity has levels, also
	 * get a list of activity level details.
	 *
	 */
	public function browseActivityTypes()
	{
		//GET https://api.fitbit.com/1/activities.json
	}

	/**
	 * Returns the details of a specific activity in the Fitbit activities database in the format requested.
	 * If activity has levels, also returns a list of activity level details.
	 *
	 * @param int $activityId
	 */
	public function getActivityTypes(int $activityId)
	{
		//GET https://api.fitbit.com/1/activities/[activity-id].json
	}

	/**
	 * The Get Frequent Activities endpoint retrieves a list of a user's frequent activities in the
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
	 * The Get Recent Activity Types endpoint retrieves a list of a user's recent activities types
	 * logged with some details of the last activity log of that type using units in the unit system which
	 * corresponds to the Accept-Language header provided. The record retrieved can be used to log the
	 * activity via the Log Activity endpoint with the same or adjusted values for distance and duration.
	 */
	public function getRecentActivityTypes()
	{
		return $this->client->get('https://api.fitbit.com/1/user/-/activities/recent.json')->getBody()->getContents();
	}

	/**
	 * The Get Favorite Activities endpoint returns a list of a user's favorite activities.
	 */
	public function getFavoriteActivities(int $userId = null)
	{
		$userString = is_null($userId) ? '-' : (string) $userId;
		$url = 'https://api.fitbit.com/1/user/' . $userString  . '/activities/favorite.json';
		return $this->client->get($url)->getBody()->getContents();
	}

	/**
	 * The Add Favorite Activity endpoint adds the activity with the given ID to user's list of favorite activities.
	 *
	 * @param int $activityId
	 */
	public function addFavoriteActivity(int $activityId)
	{
		//POST https://api.fitbit.com/1/user/-/activities/favorite/[activity-id].json
	}

	/**
	 * The Delete Favorite Activity removes the activity with the given ID from a user's list of favorite activities.
	 *
	 * @param int $activityId
	 */
	public function deleteFavoriteActivity(int $activityId)
	{
		//DELETE https://api.fitbit.com/1/user/-/activities/favorite/[activity-id].json
	}

	//ACTIVITY GOALS
	/**
	 * The Get Activity Goals retrieves a user's current daily or weekly activity goals using
	 * measurement units as defined in the unit system, which corresponds to the Accept-Language header provided.
	 *
	 * @param int $userId
	 * @param Period $period
	 */
	public function getActivityGoals(int $userId, Period $period)
	{
		//GET https://api.fitbit.com/1/user/[user-id]/activities/goals/[period].json
	}

	/**
	 * The Update Activity Goals endpoint creates or updates a user's daily activity goals and returns a
	 * response using units in the unit system which corresponds to the Accept-Language header provided.
	 *
	 * @param int $userId
	 * @param Period $period
	 * @param int $caloriesOut
	 * @param int $activeMinutes
	 * @param int $floors
	 * @param int $distance
	 * @param int $steps
	 */
	public function updateActivityGoals(
		int $userId,
		Period $period,
		int $caloriesOut = null,
		int $activeMinutes = null,
		int $floors = null,
		int $distance = null,
		int $steps = null
	) {
		//POST https://api.fitbit.com/1/user/[user-id]/activities/goals/[period].json
	}

	/**
	 * The Get Lifetime Stats endpoint retrieves the user's activity statistics in the format requested
	 * using units in the unit system which corresponds to the Accept-Language header provided. Activity
	 * statistics includes Lifetime and Best achievement values from the My Achievements tile on the website
	 * dashboard. Response contains both statistics from the tracker device and total numbers including
	 * tracker data and manual activity log entries as seen on the Fitbit website dashboard.
	 *
	 * @param int $userId
	 */
	public function getLifetimeStats(int $userId)
	{
		//GET https://api.fitbit.com/1/user/[user-id]/activities.json
	}
}
