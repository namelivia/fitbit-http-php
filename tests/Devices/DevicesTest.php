<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Devices\Devices;

class DevicesTest extends TestCase
{
    private $fitbit;
    private $devices;

    public function setUp(): void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->devices = new Devices($this->fitbit);
    }

    public function testGettingTheDevicesList()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('devices.json')
            ->andReturn('devicesList');
        $this->assertEquals(
            'devicesList',
            $this->devices->get()
        );
    }
}
