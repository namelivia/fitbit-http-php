<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Body;
use Namelivia\Fitbit\Api\Fitbit;

class ApiBodyTest extends TestCase
{
    private $fitbit;
    private $body;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->body = new Body($this->fitbit);
    }

    public function testGettingAFatInstance()
    {
        $this->assertTrue($this->body->fat() instanceof \Namelivia\Fitbit\Body\Fat\Fat);
    }

    public function testGettingAWeightInstance()
    {
        $this->assertTrue($this->body->weight() instanceof \Namelivia\Fitbit\Body\Weight\Weight);
    }

    public function testGettingAGoalsInstance()
    {
        $this->assertTrue($this->body->goals() instanceof \Namelivia\Fitbit\Body\Goals\Goals);
    }

    public function testGettingATimeSeriesInstance()
    {
        $this->assertTrue($this->body->timeSeries() instanceof \Namelivia\Fitbit\Body\TimeSeries);
    }
}
