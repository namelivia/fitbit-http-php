<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\HeartRAte\HeartRate;
use Namelivia\Fitbit\HeartRate\Period;

class HeartRateTest extends TestCase
{
    private $fitbit;
    private $heartRate;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->heartRate = new HeartRate($this->fitbit);
    }

    public function testGettingByPeriod()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('activities/heart/date/2019-03-21/1m.json')
            ->andReturn('periodHeartRate');
        $this->assertEquals(
            'periodHeartRate',
            $this->heartRate->getByPeriod(
                Carbon::today(),
                new Period(Period::ONE_MONTH)
            )
        );
    }

    public function testGettingByDateRange()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('activities/heart/date/2019-03-21/2019-03-22.json')
            ->andReturn('DateRangeHeartRate');
        $this->assertEquals(
            'DateRangeHeartRate',
            $this->heartRate->getByDateRange(
                Carbon::today(),
                Carbon::tomorrow()
            )
        );
    }
}
