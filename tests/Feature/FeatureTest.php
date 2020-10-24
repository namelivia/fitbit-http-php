<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use kamermans\OAuth2\Token\TokenInterface;
use Mockery;
use Namelivia\Fitbit\ServiceProvider;

class FeatureTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testNoTokenOrCode()
    {
        //As there is no token and no code,
        //an exception will be thrown asking to set the code first.
        $tokenPersistence = Mockery::mock(TokenPersistenceInterface::class);
        //No auth token persisted yet
        $tokenPersistence->shouldReceive('hasToken')
            ->once()
            ->with()
            ->andReturn(false);
        $clientId = 'clientId';
        $clientSecret = 'clientSecret';
        $redirectUrl = 'redirectUrl';
        $fitbit = (new ServiceProvider())->build($tokenPersistence, $clientId, $clientSecret, $redirectUrl);
        $this->expectException(\Namelivia\Fitbit\OAuth\MissingCodeException::class);
        $fitbit->activities()->favorites()->get();
    }

    //TODO: This test is actually making an HTTP request. And fails as the access token is just a mock.
    public function testTokenIsPersisted()
    {
        $tokenPersistence = Mockery::mock(TokenPersistenceInterface::class);
        //The auth token is already persisted
        $tokenPersistence->shouldReceive('hasToken')
            ->once()
            ->with()
            ->andReturn(true);
        //TODO: Review this code on kamermans repo to see what is this doing and what params does it have
        //TODO: Also I'm not sure why is it making so many calls
        $tokenMock = Mockery::mock(TokenInterface::class);
        $tokenPersistence->shouldReceive('restoreToken')
            ->times(2)
            ->andReturn($tokenMock);
        $tokenMock->shouldReceive('isExpired')
            ->times(3)
            ->with()
            ->andReturn(false);
        $tokenMock->shouldReceive('getAccessToken')
            ->times(3)
            ->with()
            ->andReturn('SomeAccessToken');
        $tokenPersistence->shouldReceive('deleteToken')
            ->once()
            ->with();
        $clientId = 'clientId';
        $clientSecret = 'clientSecret';
        $redirectUrl = 'redirectUrl';
        $fitbit = (new ServiceProvider())->build($tokenPersistence, $clientId, $clientSecret, $redirectUrl);
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);
        $fitbit->activities()->favorites()->get();
    }

    //TODO: This test is actually making an HTTP request
    //TODO: So as the code is not set yet and the stack re-created, this is failing.
    public function testCodeIsSet()
    {
        $tokenPersistence = Mockery::mock(TokenPersistenceInterface::class);
        //No auth token persisted yet
        $tokenPersistence->shouldReceive('hasToken')
            ->once()
            ->with()
            ->andReturn(false);
        //TODO: Review this code on kamermans repo to see what is this doing and what params does it have
        //TODO: I'm not actually sure what's going on under the hood
        $tokenPersistence->shouldReceive('restoreToken')
            ->once()
            ->andReturn(null);
        $tokenPersistence->shouldReceive('deleteToken')
            ->once();
        $clientId = 'clientId';
        $clientSecret = 'clientSecret';
        $redirectUrl = 'redirectUrl';
        $fitbit = (new ServiceProvider())->build($tokenPersistence, $clientId, $clientSecret, $redirectUrl);
        //Authorization code is set
        $fitbit->setAuthorizationCode('AuthorizationCode');
        $this->expectException(\kamermans\OAuth2\Exception\AccessTokenRequestException::class);
        $fitbit->activities()->favorites()->get();
    }
}
