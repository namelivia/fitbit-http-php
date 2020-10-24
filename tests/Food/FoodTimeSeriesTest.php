<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Period;
use Namelivia\Fitbit\Food\Resource;
use Namelivia\Fitbit\Food\TimeSeries;

class FoodTimeSeriesTest extends TestCase
{
    private $fitbit;
    private $timeSeries;

    public function setUp(): void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->timeSeries = new TimeSeries($this->fitbit);
    }

    public function testGettingByPeriod()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/caloriesIn/date/2019-03-21/1y.json')
            ->andReturn('periodTimeSeries');
        $this->assertEquals(
            'periodTimeSeries',
            $this->timeSeries->getByPeriod(
                new Resource(Resource::CALORIES_IN),
                Carbon::today(),
                new Period(Period::ONE_YEAR)
            )
        );
    }

    public function testGettingByDateRange()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/water/date/2019-03-21/2019-03-22.json')
            ->andReturn('DateRangeTimeSeries');
        $this->assertEquals(
            'DateRangeTimeSeries',
            $this->timeSeries->getByDateRange(
                new Resource(Resource::WATER),
                Carbon::today(),
                Carbon::tomorrow()
            )
        );
    }
}
