<?php

declare(strict_types=1);

namespace Namelivia\Fitbit;

use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\OAuth\Factory\Factory;
use Namelivia\Fitbit\OAuth\Config\Config;
use Namelivia\Fitbit\OAuth\Authorizator\Authorizator;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;

class ServiceProvider
{
    public function build(
        TokenPersistenceInterface $tokenPersistence,
        string $clientId,
        string $clientSecret,
        string $redirectUrl
    ) {
		$config = new Config($clientId, $clientSecret, $redirectUrl);
		$authorizator = new Authorizator($config, $tokenPersistence);
		$client = (new Factory())->createClient(
			$tokenPersistence,
			$config->toArray()
		);
		return new \Namelivia\Fitbit\Api\Fitbit($client);
    }
}
