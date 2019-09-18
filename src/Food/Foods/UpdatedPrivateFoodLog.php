<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

class UpdatedPrivateFoodLog extends UpdatedFoodLog
{
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
}
