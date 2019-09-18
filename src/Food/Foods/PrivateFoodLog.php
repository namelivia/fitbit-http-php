<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;

class PrivateFoodLog extends FoodLog
{
    protected $nutritionalValues;

    public function __construct(
        string $foodName,
        MealType $mealType,
        string $unitId,
        int $amount,
        Carbon $date,
        string $brandName = null,
        int $calories = null
    ) {
        parent::__construct(
            null,
            $foodName,
            $mealType,
            $unitId,
            $amount,
            $date,
            null,
            $brandName,
            $calories
        );
    }

    /**
     * Sets the nutritional values information for the
     * food.
     *
     * @param NutritionalValues
     */
    public function setNutritionalValues(NutritionalValues $nutritionalValues)
    {
        $this->nutritionalValues = $nutritionalValues;

        return $this;
    }
}
