<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\ServiceProvider;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use Mockery;

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
		$tokenPersistence = Mockery::mock(TokenPersistenceInterface::class);
		//TODO: Review this code on kamermans repo to see what is this doing and what params does it have
		$tokenPersistence->shouldReceive('restoreToken')
			->once()
			->andReturn(null);
		$tokenPersistence->shouldReceive('deleteToken')
			->once()
			->andReturn(null);
		$clientId = 'clientId';
		$clientSecret = 'clientSecret';
		$redirectUrl = 'redirectUrl';
		$fitbit = (new ServiceProvider())->build($tokenPersistence, $clientId, $clientSecret, $redirectUrl);
		$fitbit->activities()->favorites()->get();
    }
}
