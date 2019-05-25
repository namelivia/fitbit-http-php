<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use GuzzleHttp\Client;

class Goals
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	//TODO: Create period class
	/**
	 * Retrieves a user's current daily or weekly activity goals using
	 * measurement units as defined in the unit system, which corresponds to the Accept-Language header provided.
	 *
	 * @param string $period
	 * @param int $userId
	 */
	public function get(string $period, int $userId = null)
	{
		$url = 'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities/goals/' . $period . '.json';
		return $this->client->get($url)->getBody()->getContents();
	}

	//TODO: Create period class
	/**
	 * The Update Activity Goals endpoint creates or updates a user's daily activity goals and returns a
	 * response using units in the unit system which corresponds to the Accept-Language header provided.
	 *
	 * @param string $period
	 * @param int $userId
	 * @param int $caloriesOut
	 * @param int $activeMinutes
	 * @param int $floors
	 * @param int $distance
	 * @param int $steps
	 */
	public function update(
		string $period,
		int $userId = null,
		int $caloriesOut = null,
		int $activeMinutes = null,
		int $floors = null,
		int $distance = null,
		int $steps = null
	) {
		$url = 'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities/goals/' . $period . '.json';
		return $this->client->post(
			$url,
			[ 'json' => []]//TODO: fill the body
		)->getBody()->getContents();
	}

	private function getUserUrlParam(int $userId = null)
	{
		return is_null($userId) ? '-' : (string) $userId;
	}
}
