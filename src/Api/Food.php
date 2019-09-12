<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Food\Foods\Foods as FoodsOperations;
use Namelivia\Fitbit\Food\Foods\Goals as GoalsOperations;
use Namelivia\Fitbit\Food\Foods\Logs as LogsOperations;
use Namelivia\Fitbit\Food\Meals\Meals as MealsOperations;
use Namelivia\Fitbit\Food\TimeSeries as TimeSeriesOperations;
use Namelivia\Fitbit\Food\Water\Water as WaterOperations;

class Food
{
    private $foods;
    private $logs;
    private $goals;
    private $water;
    private $timeSeries;
    private $meal;

    public function __construct(Fitbit $fitbit)
    {
        $this->foods = new FoodsOperations($fitbit);
        $this->logs = new LogsOperations($fitbit);
        $this->goals = new GoalsOperations($fitbit);
        $this->water = new WaterOperations($fitbit);
        $this->meals = new MealsOperations($fitbit);
        $this->timeSeries = new TimeSeriesOperations($fitbit);
    }

    public function foods()
    {
        return $this->foods;
    }

    public function goals()
    {
        return $this->goals;
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

    public function logs()
    {
        return $this->logs;
    }
}
