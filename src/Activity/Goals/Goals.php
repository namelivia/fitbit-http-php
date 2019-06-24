<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Goals;

use GuzzleHttp\Client;

class Goals
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Retrieves a user's current daily or weekly activity goals using
	 * measurement units as defined in the unit system, which corresponds to the Accept-Language header provided.
	 *
	 * @param Period $period
	 * @param int $userId
	 */
	public function get(Period $period, int $userId = null)
	{
		$url = 'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities/goals/' . $period->asUrlParam() . '.json';
		return $this->client->get($url)->getBody()->getContents();
	}

	/**
	 * The Update Activity Goals endpoint creates or updates a user's daily activity goals and returns a
	 * response using units in the unit system which corresponds to the Accept-Language header provided.
	 *
	 * @param Period $period
	 * @param Goal $goal
	 * @param int $userId
	 */
	public function update(
		Period $period,
		Goal $goal,
		int $userId = null
	) {

		$url = 'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities/goals/' . $period->asUrlParam() . '.json?' . 
			$goal->asUrlParam();
		return $this->client->post(
			$url
		)->getBody()->getContents();
	}

	private function getUserUrlParam(int $userId = null)
	{
		return is_null($userId) ? '-' : (string) $userId;
	}
}
