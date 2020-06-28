<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use GuzzleHttp\Client;
use Namelivia\Fitbit\Api\Api;
use Namelivia\Fitbit\OAuth\Factory\Factory;
use Mockery;

class ApiTest extends TestCase
{
    private $api;
    private $factory;

    public function setUp()
    {
        parent::setUp();
        $this->factory = Mockery::mock(Factory::class);
        $this->api = new Api(
          'clientId',
          'clientSecret',
          'redirectUrl',
          'tokenPath',
          $this->factory
        );
    }

    public function testAnApiStartsUninitialized()
    {
        $this->assertFalse($this->api->isInitialized());
    }

    public function testAnApiStartsUnauthorized()
    {
        $this->assertFalse($this->api->isAuthorized());
    }

    public function testGettingAnAuthorizationUrl()
    {
        $this->assertEquals(
          'https://www.fitbit.com/oauth2/authorize?' .
          'client_id=clientId' .
          '&scope=activity+nutrition+heartrate+location+nutrition+' .
          'profile+settings+sleep+social+weight' .
          '&response_type=code&redirect_uri=redirectUrl&expires_in=604800',
          $this->api->getAuthUri()
        );
    }

    public function testInitializingTheApi()
    {
        $clientMock = Mockery::mock(Client::class);
        //TODO: Check mock params
        $this->factory->shouldReceive('createClient')
            ->once()
            //->with()
            ->andReturn($clientMock);
        $this->assertNull($this->api->getClient());
        $this->api->initialize();
        $this->assertTrue($this->api->isInitialized());
        $this->assertEquals($this->api->getClient(), $clientMock);
    }

    public function testAuthorizingTheApiBySettingACode()
    {
        $this->assertFalse($this->api->isAuthorized());
        $this->api->setAuthorizationCode('authCode');
        $this->assertTrue($this->api->isAuthorized());
    }
}
