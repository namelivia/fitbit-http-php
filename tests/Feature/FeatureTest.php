<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\Api\Api;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\OAuth\Factory\Factory;

class FeatureTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @expectedException kamermans\OAuth2\Exception\AccessTokenRequestException
     */
    public function testFeature()
    {
        $factory = new Factory();
        $api = New Api(
            'someClientId',
            'someClientSecret',
            'https://myapp.com/authorized',
            '/tmp/token',
            $factory
        );

        /*if (!$api->isAuthorized()) {
            echo 'Go to: ' . $api->getAuthUri() . "\n";
            echo "Enter verification code: \n";
            $code = trim(fgets(STDIN, 1024));
            $api->setAuthorizationCode($code);
        }*/

        if (!$api->isInitialized()) {
            $api->initialize();
        }

        $fitbit = new \Namelivia\Fitbit\Api\Fitbit($api);
        $fitbit->activities()->favorites()->get();
    }
}
