<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use kamermans\OAuth2\Persistence\FileTokenPersistence;
use Namelivia\Fitbit\OAuth\Factory\Factory;

class Api
{
    private $client;
    private $config;
    private $tokenPersistence;
    private $factory;
    private $initialized;
    private $tokenUrl = 'https://api.fitbit.com/oauth2/token';
    private $authorizeUrl = 'https://www.fitbit.com/oauth2/authorize';

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $redirectUrl,
        string $tokenPath,
        Factory $factory
    ) {
        $this->factory = $factory;
        $this->config = [
            'code' => null,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'redirect_uri' => $redirectUrl,
        ];
        $this->tokenPersistence = new FileTokenPersistence($tokenPath);
        $this->initialized = false;
    }

    public function getAuthUri()
    {
        return $this->authorizeUrl . '?' . http_build_query([
            'client_id' => $this->config['client_id'],
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
            'redirect_uri' => $this->config['redirect_uri'],
            'expires_in' => '604800',
        ]);
    }

    public function setAuthorizationCode(string $code)
    {
        $this->config['code'] = $code;

        return $this;
    }

    public function isAuthorized()
    {
        return $this->tokenPersistence->hasToken() || !is_null($this->config['code']);
    }

    public function isInitialized()
    {
        return $this->initialized;
    }

    public function initialize()
    {
        if (!$this->initialized) {
            $this->client = $this->factory->createClient(
                $this->tokenUrl,
                $this->tokenPersistence,
                $this->config
            );
            $this->initialized = true;
        }
    }

    public function getClient()
    {
        return $this->client;
    }
}
