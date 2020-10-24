<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\OAuth\Middleware;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use Namelivia\Fitbit\OAuth\Config\Config;
use Namelivia\Fitbit\OAuth\Constants\Constants;

class MiddlewareFactory
{
    private $config;
    private $tokenPersistence;
    private $stack;

    public function __construct(
        Config $config,
        TokenPersistenceInterface $tokenPersistence
    ) {
        $this->tokenPersistence = $tokenPersistence;
        $this->config = $config;
        $this->stack = HandlerStack::create();
    }

    private function getOAuthMiddleware()
    {
        $middleware = new Middleware(
            new Client(['base_uri' => Constants::TOKEN_URL]),
            $this->config->toArray()
        );
        $middleware->setTokenPersistence($this->tokenPersistence);

        return $middleware;
    }

    //Will create the oauth middleware and add it to the stack
    public function createOAuthMiddleware()
    {
        $middleware = $this->getOAuthMiddleware();
        $this->stack->push($middleware, 'oauth');
    }

    //Will create the oauth middleware and readd it to the stack
    public function recreateOAuthMiddleware(
    ) {
        $this->stack->remove('oauth');
        $middleware = $this->getOAuthMiddleware();
        $this->stack->push($middleware, 'oauth');
    }

    public function getStack()
    {
        return $this->stack;
    }
}
