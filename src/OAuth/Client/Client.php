<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\OAuth\Client;

use GuzzleHttp\Client as OAuthClient;
use GuzzleHttp\HandlerStack;

class Client extends OAuthClient
{
    public function __construct(
        HandlerStack $stack
    ) {
        return parent::__construct([
            'handler' => $stack,
            'auth' => 'oauth',
        ]);
    }

}
