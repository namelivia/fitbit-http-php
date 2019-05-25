<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use GuzzleHttp\Client;

class Favorite
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * Returns a list of a user's favorite activities.
	 */
	public function get(int $userId = null)
	{
		$url = 'https://api.fitbit.com/1/user/' .
			$this->getUserUrlParam($userId) .
			'/activities/favorite.json';
		return $this->client->get($url)->getBody()->getContents();
	}

	/**
	 * Adds the activity with the given ID to user's list of favorite activities.
	 *
	 * @param int $activityId
	 */
	public function add(int $activityId)
	{
		return $this->client->post(
			'https://api.fitbit.com/1/user/-/activities/favorite/' . $activityId . '.json',
		)->getBody()->getContents();
	}

	/**
	 * Removes the activity with the given ID from a user's list of favorite activities.
	 *
	 * @param int $activityId
	 */
	public function remove(int $activityId)
	{
		return $this->client->delete(
			'https://api.fitbit.com/1/user/-/activities/favorite/' . $activityId . '.json',
		)->getBody()->getContents();
	}
}
