<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Food\Food as FoodOperations;
use Namelivia\Fitbit\Food\Water as WaterOperations;

class Food
{
    private $food;
    private $water;

    public function __construct(Fitbit $fitbit)
    {
        $this->food = new FoodOperations($fitbit);
        $this->water = new WaterOperations($fitbit);
    }

    public function food()
    {
        return $this->food;
    }

    public function water()
    {
        return $this->water;
    }
}
