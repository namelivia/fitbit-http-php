<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use GuzzleHttp\Client;
use Mockery;
use Namelivia\Fitbit\Api\Api;
use Namelivia\Fitbit\Api\Fitbit;

class FitbitTest extends TestCase
{
    private $client;
    private $fitbit;

    public function setUp()
    {
        parent::setUp();
        $api = Mockery::mock(Api::class);
        $this->client = Mockery::mock(Client::class);
        $api->shouldReceive('getClient')
          ->once()
          ->with()
          ->andReturn($this->client);
        $this->fitbit = new Fitbit($api);
    }

    public function testMakingAGetCall()
    {
        $this->client->shouldReceive('get')
            ->once()
            ->with('https://api.fitbit.com/1/user/-/sampleurl')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody->getContents')
            ->once()
            ->with()
            ->andReturn('responseContent');
        $this->assertEquals(
            'responseContent',
            $this->fitbit->get('sampleurl')
        );
    }

    public function testMakingAGetCallToANonUserEndpoint()
    {
        $this->client->shouldReceive('get')
            ->once()
            ->with('https://api.fitbit.com/1/sampleurl')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody->getContents')
            ->once()
            ->with()
            ->andReturn('responseContent');
        $this->assertEquals(
            'responseContent',
            $this->fitbit->getNonUserEndpoint('sampleurl')
        );
    }

    public function testMakingAPostCall()
    {
        $this->client->shouldReceive('post')
            ->once()
            ->with('https://api.fitbit.com/1/user/-/sampleurl')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody->getContents')
            ->once()
            ->with()
            ->andReturn('responseContent');
        $this->assertEquals(
            'responseContent',
            $this->fitbit->post('sampleurl')
        );
    }

    public function testMakingADeleteCall()
    {
        $this->client->shouldReceive('delete')
            ->once()
            ->with('https://api.fitbit.com/1/user/-/sampleurl')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody->getContents')
            ->once()
            ->with()
            ->andReturn('responseContent');
        $this->assertEquals(
            'responseContent',
            $this->fitbit->delete('sampleurl')
        );
    }

    public function testSettingTheUser()
    {
        $userId = 23;
        $this->client->shouldReceive('delete')
            ->once()
            ->with('https://api.fitbit.com/1/user/23/sampleurl')
            ->andReturn($this->client);
        $this->client->shouldReceive('delete')
            ->once()
            ->with('https://api.fitbit.com/1/user/-/sampleurl')
            ->andReturn($this->client);
        $this->client->shouldReceive('getBody->getContents')
            ->twice()
            ->with()
            ->andReturn('responseContent');

        $this->fitbit->userId($userId);
        $this->assertEquals(
            'responseContent',
            $this->fitbit->delete('sampleurl')
        );

        $this->fitbit->currentUser($userId);
        $this->assertEquals(
            'responseContent',
            $this->fitbit->delete('sampleurl')
        );
    }

    public function testGettingAnActivitiesInstance()
    {
        $this->assertTrue($this->fitbit->activities() instanceof \Namelivia\Fitbit\Api\Activities);
    }

    public function testGettingAUserInstance()
    {
        $this->assertTrue($this->fitbit->user() instanceof \Namelivia\Fitbit\Api\User);
    }
}
