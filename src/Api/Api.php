<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use kamermans\OAuth2\GrantType\AuthorizationCode;
use kamermans\OAuth2\GrantType\RefreshToken;
use kamermans\OAuth2\Persistence\FileTokenPersistence;
use kamermans\OAuth2\OAuth2Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;

class Api
{
    private $clientId;
    private $clientSecret;
    private $redirectUrl;

    public function __construct(string $clientId, string $clientSecret, string $redirectUrl)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
    }

    private function getAuthCode()
    {
        $authUrl = 'https://www.fitbit.com/oauth2/authorize?' . http_build_query([
            'client_id' => $this->clientId,
            'scope' => implode(' ',[
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
            'redirect_uri' => $this->redirectUrl,
            'expires_in' => '604800',
        ]);
        $authClient = new Client([]);
        $response = $authClient->get($authUrl);
        //TODO: This won't be done like this in the future
        print('Go to: ' . $authUrl . "\n");
        print("Enter verification code: \n");
        return trim(fgets(STDIN, 1024));
    }

    public function getClient() {
        $tokenStorage = new FileTokenPersistence('/tmp/token');
        $authCode = $tokenStorage->hasToken() ? null : $this->getAuthCode();
        $reauthClient = new Client([
            'base_uri' => 'https://api.fitbit.com/oauth2/token',
        ]);

        $reauthConfig = [
            'code' => $authCode,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUrl,
        ];
        $grantType = new AuthorizationCode($reauthClient, $reauthConfig);
        $refreshGrantType = new RefreshToken($reauthClient, $reauthConfig);
        $oauth = new OAuth2Middleware($grantType, $refreshGrantType);
        $oauth->setTokenPersistence($tokenStorage);
        $stack = HandlerStack::create();
        $stack->push($oauth);

        // This is the normal Guzzle client that you use in your application
        return new Client([
            'handler' => $stack,
            'auth'    => 'oauth',
        ]);
    }
}
