<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\Devices;

class ApiDevicesTest extends TestCase
{
    private $fitbit;
    private $devices;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->devices = new Devices($this->fitbit);
    }

    public function testGettingADevicesInstance()
    {
        $this->assertTrue($this->devices->devices() instanceof \Namelivia\Fitbit\Devices\Devices);
    }
}
