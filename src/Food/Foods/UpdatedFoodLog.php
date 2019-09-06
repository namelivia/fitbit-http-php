<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;

class UpdatedFoodLog
{
    private $mealTypeId;
    private $unitId;
    private $amount;
    private $calories;

    public function __construct(
        MealType $mealTypeId,
        string $unitId,
        int $amount,
        int $calories = null
    ) {
        $this->mealTypeId = $mealTypeId;
        $this->unitId = $unitId;
        $this->amount = $amount / 100;
        $this->calories = $calories;
    }

    /**
     * Returns the food goal parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'mealTypeId' => $this->mealTypeId,
            'unitId' => $this->unitId,
            'amount' => $this->amount,
            'calories' => $this->calories,
        ]);
    }
}
