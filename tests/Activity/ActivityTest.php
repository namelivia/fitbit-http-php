<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Activity\Activity;
use Namelivia\Fitbit\Api\Fitbit;

class ActivityTest extends TestCase
{
    private $fitbit;
    private $activity;

    public function setUp(): void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->activity = new Activity($this->fitbit);
    }

    public function testGettingADailySummary()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('activities/date/2019-03-21.json')
            ->andReturn('dailySummary');
        $this->assertEquals(
            'dailySummary',
            $this->activity->getDailySummary(Carbon::today())
        );
    }

    public function testGettingTheLifetimeStats()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('activities.json')
            ->andReturn('lifetimeStats');
        $this->assertEquals(
            'lifetimeStats',
            $this->activity->getLifetimeStats()
        );
    }
}
