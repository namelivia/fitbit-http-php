<?php

declare(strict_types=1);

namespace Namelivia\Fitbit;

use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use Namelivia\Fitbit\OAuth\Authorizator\Authorizator;
use Namelivia\Fitbit\OAuth\Client\Client;
use Namelivia\Fitbit\OAuth\Config\Config;
use Namelivia\Fitbit\OAuth\Middleware\MiddlewareFactory;

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
        $middlewareFactory = new MiddlewareFactory($config, $tokenPersistence);
        $middlewareFactory->createOAuthMiddleware();
        $client = new Client($middlewareFactory, $authorizator);

        return new \Namelivia\Fitbit\Api\Fitbit($client);
    }
}
