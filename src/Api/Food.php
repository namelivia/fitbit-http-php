<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Food\Food as FoodOperations;

class Food
{
    private $food;

    public function __construct(Fitbit $fitbit)
    {
        $this->food = new FoodOperations($fitbit);
    }

    public function food()
    {
        return $this->food;
    }
}
