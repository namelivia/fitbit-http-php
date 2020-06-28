<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use kamermans\OAuth2\Persistence\FileTokenPersistence;
use Namelivia\Fitbit\OAuth\Factory\Factory;
use Namelivia\Fitbit\OAuth\Constants\Constants;
use Namelivia\Fitbit\OAuth\Config\Config;
use Namelivia\Fitbit\OAuth\Authorizator\Authorizator;

class Api
{
    private $client;
    private $config;
    private $tokenPersistence;
    private $factory;
    private $initialized;

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $redirectUrl,
        string $tokenPath,
        Factory $factory
    ) {
        $this->factory = $factory;
        $this->config = new Config($clientId, $clientSecret, $redirectUrl);
        $this->tokenPersistence = new FileTokenPersistence($tokenPath);
        $this->authorizator = new Authorizator($this->config, $this->tokenPersistence);
        $this->initialized = false;
    }

    public function isInitialized()
    {
        return $this->initialized;
    }

    public function initialize()
    {
        if (!$this->initialized) {
            $this->client = $this->factory->createClient(
                $this->tokenPersistence,
                $this->config->toArray()
            );
            $this->initialized = true;
        }
    }

    public function getClient()
    {
        return $this->client;
    }
}
