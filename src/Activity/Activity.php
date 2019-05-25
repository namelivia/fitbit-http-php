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
	public function getDailySummary(Carbon $date, int $userId = null)
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
