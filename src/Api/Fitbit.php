<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use GuzzleHttp\Client;

class Fitbit
{
	private $client;
	private $baseUrl = 'https://api.fitbit.com/1/user/';

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function get($url)
	{
		try {
			return $this->client->get($this->baseUrl . $url)->getBody()->getContents();
		} catch (\Throwable $t) {
			var_dump($t);
		}
	}

	public function post($url)
	{
		return $this->client->post($this->baseUrl . $url)->getBody()->getContents();
	}

	public function delete($url)
	{
		return $this->client->delete($this->baseUrl . $url)->getBody()->getContents();
	}
}
