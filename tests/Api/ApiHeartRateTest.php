<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\HeartRate;

class ApiHeartRateTest extends TestCase
{
    private $fitbit;
    private $heartRate;

    public function setUp(): void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->heartRate = new HeartRate($this->fitbit);
    }

    public function testGettingAHeartRateInstance()
    {
        $this->assertTrue($this->heartRate->heartRate() instanceof \Namelivia\Fitbit\HeartRate\HeartRate);
    }
}
