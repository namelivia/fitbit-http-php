<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\OAuth\Factory;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\Persistence\FileTokenPersistence;
use Namelivia\Fitbit\OAuth\Client\Client as OAuthClient;
use Namelivia\Fitbit\OAuth\Middleware\Middleware;

class Factory
{
    public function createClient($tokenUrl, FileTokenPersistence $tokenPersistence, $config)
    {
        $oauth = new Middleware(
            new Client(['base_uri' => $tokenUrl]),
            $config
        );
        $oauth->setTokenPersistence($tokenPersistence);
        $stack = HandlerStack::create();
        $stack->push($oauth);
        return new OAuthClient($stack);
    }

}
