<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use GuzzleHttp\Client;
use Namelivia\Fitbit\Api\Api;

class ApiTest extends TestCase
{
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Api(
          'clientId',
          'clientSecret',
          'redirectUrl',
          'tokenPath'
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
        $this->assertNull($this->api->getClient());
        $this->api->initialize();
        $this->assertTrue($this->api->isInitialized());
        $this->assertTrue(is_a($this->api->getClient(), Client::class));
    }

    public function testAuthorizingTheApiBySettingACode()
    {
        $this->assertFalse($this->api->isAuthorized());
        $this->api->setAuthorizationCode('authCode');
        $this->assertTrue($this->api->isAuthorized());
    }
}
