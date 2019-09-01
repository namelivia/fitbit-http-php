<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Food\Foods\Foods as FoosdOperations;
use Namelivia\Fitbit\Food\Meals\Meals as MealsOperations;
use Namelivia\Fitbit\Food\TimeSeries as TimeSeriesOperations;
use Namelivia\Fitbit\Food\Water as WaterOperations;

class Food
{
    private $foods;
    private $water;
    private $timeSeries;
    private $meal;

    public function __construct(Fitbit $fitbit)
    {
        $this->foods = new FoosdOperations($fitbit);
        $this->water = new WaterOperations($fitbit);
        $this->meals = new MealsOperations($fitbit);
        $this->timeSeries = new TimeSeriesOperations($fitbit);
    }

    public function foods()
    {
        return $this->foods;
    }

    public function water()
    {
        return $this->water;
    }

    public function timeSeries()
    {
        return $this->timeSeries;
    }

    public function meals()
    {
        return $this->meals;
    }
}
