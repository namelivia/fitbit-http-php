<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Food\Food as FoodOperations;
use Namelivia\Fitbit\Food\TimeSeries as TimeSeriesOperations;
use Namelivia\Fitbit\Food\Water as WaterOperations;

class Food
{
    private $food;
    private $water;
    private $timeSeries;

    public function __construct(Fitbit $fitbit)
    {
        $this->food = new FoodOperations($fitbit);
        $this->water = new WaterOperations($fitbit);
        $this->timeSeries = new TimeSeriesOperations($fitbit);
    }

    public function food()
    {
        return $this->food;
    }

    public function water()
    {
        return $this->water;
    }

    public function timeSeries()
    {
        return $this->timeSeries;
    }
}
