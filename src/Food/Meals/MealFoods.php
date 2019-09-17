<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Meals;

class MealFoods
{
    private $items;

    public function __construct() {
        $this->items = [];
    }

    /**
     * Adds a MealFood to the foods collection.
     */
    public function addFood(MealFood $mealFood)
    {
		    array_push($this->items, $mealFood);
        return $this;
    }

    /**
     * Returns the all mealFood items as array.
     */
    public function toArray()
    {
			return array_map(function ($item) {
				return $item->toArray();
			}, $this->items);
    }
}
