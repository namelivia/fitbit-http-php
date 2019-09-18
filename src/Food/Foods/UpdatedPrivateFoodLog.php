<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

class UpdatedPrivateFoodLog extends UpdatedFoodLog
{
    protected $nutritionalValues;

    public function __construct(
        MealType $mealType,
        int $calories
    ) {
        parent::__construct(
            $mealType,
            null,
            null,
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
