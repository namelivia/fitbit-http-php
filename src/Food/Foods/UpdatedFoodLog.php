<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

abstract class UpdatedFoodLog
{
    private $mealType;
    private $unitId;
    private $amount;
    private $calories;

    public function __construct(
        MealType $mealType,
        string $unitId = null,
        int $amount = null,
        int $calories = null
    ) {
        $this->mealType = $mealType;
        $this->unitId = $unitId;
        $this->amount = is_null($amount) ? null : $amount / 100;
        $this->calories = $calories;
    }

    /**
     * Returns the food goal parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'mealTypeId' => (string) $this->mealType,
            'unitId' => $this->unitId,
            'amount' => $this->amount,
            'calories' => $this->calories,
            'nutritionalValues' => is_null($this->nutritionalValues) ? null : $this->nutritionalValues->toArray(),
        ]);
    }
}
