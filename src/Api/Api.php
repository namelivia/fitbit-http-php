<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use kamermans\OAuth2\Persistence\FileTokenPersistence;
use Namelivia\Fitbit\OAuth\Factory\Factory;
use Namelivia\Fitbit\OAuth\Constants\Constants;
use Namelivia\Fitbit\OAuth\Config\Config;

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
        $this->initialized = false;
    }

    public function getAuthUri()
    {
        return Constants::AUTHORIZE_URL . '?' . http_build_query([
            'client_id' => $this->config->getClientId(),
            'scope' => implode(' ', [
                'activity',
                'nutrition',
                'heartrate',
                'location',
                'nutrition',
                'profile',
                'settings',
                'sleep',
                'social',
                'weight',
            ]),
            'response_type' => 'code',
            'redirect_uri' => $this->config->getRedirectUrl(),
            'expires_in' => '604800',
        ]);
    }

    public function setAuthorizationCode(string $code)
    {
        $this->config->setCode($code);

        return $this;
    }

    public function isAuthorized()
    {
        return $this->tokenPersistence->hasToken() || $this->config->hasCode();
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
