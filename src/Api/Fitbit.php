<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use GuzzleHttp\Client;

class Fitbit
{
	private $nonUserUrl = 'https://api.fitbit.com/1/';
	private $baseUrl = 'https://api.fitbit.com/1/user/';
	private $userId = '-';
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function get($url)
	{
		return $this->client->get(
			$this->baseUrl  . $this->userId . '/' . $url
		)->getBody()->getContents();
	}

	//TODO: Ugh! I hate doing this
	public function getNonUserEndpoint($url)
	{
		return $this->client->get(
			$this->nonUserUrl . $url
		)->getBody()->getContents();
	}

	public function post($url)
	{
		return $this->client->post(
			$this->baseUrl . $this->userId . '/' . $url
		)->getBody()->getContents();
	}

	public function delete($url)
	{
		return $this->client->delete(
			$this->baseUrl . $this->userId . '/' . $url
		)->getBody()->getContents();
	}

	public function userId(int $userId)
	{
		$this->userId = $userId;
	}

	public function currentUser()
	{
		$this->userId = '-';
	}
}
