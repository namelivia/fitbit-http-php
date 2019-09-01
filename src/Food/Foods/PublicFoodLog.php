<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;

class PublicFoodLog extends FoodLog
{
    public function __construct(
        string $foodId,
        MealType $mealTypeId,
        string $unitId,
        int $amount,
        Carbon $date,
        bool $favorite = null,
        int $calories = null
    ) {
        parent::__construct(
            $foodId,
            null,
            $mealTypeId,
            $unitId,
            $amount,
            $date,
            $favorite,
            null,
            $calories
        );
    }
}
