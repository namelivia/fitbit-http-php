<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\Food;

class ApiFoodTest extends TestCase
{
    private $fitbit;
    private $food;

    public function setUp():void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->food = new Food($this->fitbit);
    }

    public function testGettingAFoodsInstance()
    {
        $this->assertTrue($this->food->foods() instanceof \Namelivia\Fitbit\Food\Foods\Foods);
    }

    public function testGettingAWaterLogsInstance()
    {
        $this->assertTrue($this->food->waterLogs() instanceof \Namelivia\Fitbit\Food\Water\Logs);
    }

    public function testGettingATimeSeriesInstance()
    {
        $this->assertTrue($this->food->timeSeries() instanceof \Namelivia\Fitbit\Food\TimeSeries);
    }

    public function testGettingAMealInstance()
    {
        $this->assertTrue($this->food->meals() instanceof \Namelivia\Fitbit\Food\Meals\Meals);
    }

    public function testGettingAGoalsInstance()
    {
        $this->assertTrue($this->food->goals() instanceof \Namelivia\Fitbit\Food\Foods\Goals);
    }

    public function testGettingALogsInstance()
    {
        $this->assertTrue($this->food->logs() instanceof \Namelivia\Fitbit\Food\Foods\Logs);
    }

    public function testGettingAWaterGoalsInstance()
    {
        $this->assertTrue($this->food->waterGoals() instanceof \Namelivia\Fitbit\Food\Water\Goals);
    }

    public function testGettingAFavoritesInstance()
    {
        $this->assertTrue($this->food->favorites() instanceof \Namelivia\Fitbit\Food\Favorite\Favorites);
    }
}
