<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use Namelivia\Fitbit\Api\Fitbit;
use Carbon\Carbon;
use Namelivia\Fitbit\Resource\AbstractResource;

class Logs
{
	private $client;

	public function __construct(Fitbit $fitbit)
	{
		$this->fitbit = $fitbit;
	}

	/**
	 * Creates log entry for an activity or user's private custom activity using
	 * units in the unit system which corresponds to the Accept-Language header provided (or using
	 * optional custom distanceUnit) and get a response in the format requested.
	 *
	 * @param Log $log
	 */
	public function add(
		Log $log
	) {
		return $this->fitbit->post(
			'-/activities.json?' . 
			$log->asUrlParam()
		);
	}

	/**
	 * Retrieves the details of a user's location and heart rate data during
	 * a logged exercise activity.
	 *
	 * @param int $logId
	 * @param int $userId
	 */
	public function getTCX(int $logId, int $userId = null)
	{
		return $this->fitbit->get(
			$this->getUserUrlParam($userId) .
			'/activities/' . $logId . '.tcx'
		);
	}

	/**
	 * Deletes a user's activity log entry with the given ID.
	 * A successful request will return a 204 status code with an empty response body.
	 *
	 * @param string $activityLogId
	 */
	public function remove(string $activityLogId)
	{
		return $this->fitbit->delete(
			'-/activities/' . $activityLogId . '.json'
		);
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
	public function listAfter(
		Carbon $afterDate,
		string $sort,
		int $limit,
		int $userId = null
	) {
		$formattedAfterDate = $afterDate->format('Y-m-d');
		return $this->fitbit->get(
			$this->getUserUrlParam($userId) .
			'/activities/list.json?' .
			'&afterDate=' . $formattedAfterDate .
			'&sort=' . $sort .
			'&limit=' . $limit .
			'&offset=0'
		);
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
	public function listBefore(
		Carbon $beforeDate,
		string $sort,
		int $limit,
		int $userId = null
	) {
		$formattedBeforeDate = $beforeDate->format('Y-m-d');
		return $this->fitbit->get(
			$this->getUserUrlParam($userId) .
			'/activities/list.json?' .
			'beforeDate=' . $formattedBeforeDate .
			'&sort=' . $sort .
			'&limit=' . $limit .
			'&offset=0'
		);
	}

	private function getUserUrlParam(int $userId = null)
	{
		return is_null($userId) ? '-' : (string) $userId;
	}
}
