<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\ServiceProvider;

class FeatureTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @expectedException kamermans\OAuth2\Exception\AccessTokenRequestException
     */
    public function testUnauthorizedApi()
    {
		$clientId = 'clientId';
		$clientSecret = 'clientSecret';
		$redirectUrl = 'redirectUrl';
		$tokenPath = '/tmp/token';
		$fitbit = (new ServiceProvider())->build($tokenPath, $clientId, $clientSecret, $redirectUrl);
		$fitbit->activities()->favorites()->get();
    }
}
