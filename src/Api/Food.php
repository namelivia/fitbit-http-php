<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Food\Favorite\Favorites as FavoritesOperations;
use Namelivia\Fitbit\Food\Foods\Foods as FoodsOperations;
use Namelivia\Fitbit\Food\Foods\Goals as GoalsOperations;
use Namelivia\Fitbit\Food\Foods\Logs as LogsOperations;
use Namelivia\Fitbit\Food\Meals\Meals as MealsOperations;
use Namelivia\Fitbit\Food\TimeSeries as TimeSeriesOperations;
use Namelivia\Fitbit\Food\Water\Goals as WaterGoalsOperations;
use Namelivia\Fitbit\Food\Water\Logs as WaterLogsOperations;

class Food
{
    private $foods;
    private $logs;
    private $goals;
    private $waterGoals;
    private $waterLogs;
    private $timeSeries;
    private $meal;
    private $favorites;

    public function __construct(Fitbit $fitbit)
    {
        $this->foods = new FoodsOperations($fitbit);
        $this->logs = new LogsOperations($fitbit);
        $this->goals = new GoalsOperations($fitbit);
        $this->waterLogs = new WaterLogsOperations($fitbit);
        $this->waterGoals = new WaterGoalsOperations($fitbit);
        $this->meals = new MealsOperations($fitbit);
        $this->timeSeries = new TimeSeriesOperations($fitbit);
        $this->favorites = new FavoritesOperations($fitbit);
    }

    public function foods()
    {
        return $this->foods;
    }

    public function goals()
    {
        return $this->goals;
    }

    public function waterGoals()
    {
        return $this->waterGoals;
    }

    public function waterLogs()
    {
        return $this->waterLogs;
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

    public function favorites()
    {
        return $this->favorites;
    }
}
