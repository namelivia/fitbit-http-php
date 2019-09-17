<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Meals;

class Meal
{
    private $name;
    private $description;

    public function __construct(
        string $name,
        string $description
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->mealFoods = new MealFoods();
    }

    /**
     * Adds a MealFood to the foods collection.
     */
    public function addFood(MealFood $mealFood)
    {
		    $this->mealFoods->addFood($mealFood);
        return $this;
    }

    /**
     * Returns the meal structure as an array.
     */
    public function toArray()
    {
        return [
					'name' => $this->name,
					'description' => $this->description,
					'mealFoods' => $this->mealFoods->toArray()
        ];
    }
}
