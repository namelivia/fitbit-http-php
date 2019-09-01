<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;

class PrivateFoodLog extends FoodLog
{
    public function __construct(
        string $foodName,
        MealType $mealTypeId,
        string $unitId,
        int $amount,
        Carbon $date,
        string $brandName = null,
        int $calories = null
    ) {
        parent::__construct(
            null,
            $foodName,
            $mealTypeId,
            $unitId,
            $amount,
            $date,
            null,
            $brandName,
            $calories
        );
    }
}
