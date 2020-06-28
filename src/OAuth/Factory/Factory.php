<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\OAuth\Factory;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use Namelivia\Fitbit\OAuth\Client\Client as OAuthClient;
use Namelivia\Fitbit\OAuth\Middleware\Middleware;
use Namelivia\Fitbit\OAuth\Constants\Constants;

class Factory
{
    public function createClient(TokenPersistenceInterface $tokenPersistence, array $config)
    {
        $oauth = new Middleware(
            new Client(['base_uri' => Constants::TOKEN_URL]),
            $config
        );
        $oauth->setTokenPersistence($tokenPersistence);
        $stack = HandlerStack::create();
        $stack->push($oauth);
        return new OAuthClient($stack);
    }

}
