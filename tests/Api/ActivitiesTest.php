<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Activities;
use Namelivia\Fitbit\Api\Fitbit;

class ActivitiesTest extends TestCase
{
    private $fitbit;
    private $activities;

    public function setUp():void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->activities = new Activities($this->fitbit);
    }

    public function testGettingAnActivityInstance()
    {
        $this->assertTrue($this->activities->activity() instanceof \Namelivia\Fitbit\Activity\Activity);
    }

    public function testGettingATimeSeriesInstance()
    {
        $this->assertTrue($this->activities->timeSeries() instanceof \Namelivia\Fitbit\Activity\TimeSeries);
    }

    public function testGettingAnIntradayInstance()
    {
        $this->assertTrue($this->activities->intraday() instanceof \Namelivia\Fitbit\Activity\Intraday);
    }

    public function testGettingATypesInstance()
    {
        $this->assertTrue($this->activities->activityTypes() instanceof \Namelivia\Fitbit\Activity\Types);
    }

    public function testGettingALogsInstance()
    {
        $this->assertTrue($this->activities->activityLogs() instanceof \Namelivia\Fitbit\Activity\Logs\Logs);
    }

    public function testGettingAFavoritesInstance()
    {
        $this->assertTrue($this->activities->favorites() instanceof \Namelivia\Fitbit\Activity\Favorites);
    }

    public function testGettingAGoalsInstance()
    {
        $this->assertTrue($this->activities->goals() instanceof \Namelivia\Fitbit\Activity\Goals\Goals);
    }
}
