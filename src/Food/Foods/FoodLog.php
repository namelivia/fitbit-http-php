<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;

abstract class FoodLog
{
    private $foodId;
    private $foodName;
    private $mealTypeId;
    private $unitId;
    private $amount;
    private $date;
    private $favorite;
    private $brandName;
    private $calories;

    public function __construct(
        string $foodId = null,
        string $foodName = null,
        MealType $mealTypeId,
        string $unitId,
        int $amount,
        Carbon $date,
        bool $favorite = null,
        string $brandName = null,
        int $calories = null
    ) {
        $this->foodId = $foodId;
        $this->foodName = $foodName;
        $this->mealTypeId = $mealTypeId;
        $this->unitId = $unitId;
        $this->amount = $amount / 100;
        $this->date = $date->format('Y-m-d');
        $this->favorite = $favorite;
        $this->brandName = $brandName;
        $this->calories = $calories;
    }

    /**
     * Returns the food goal parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'foodId' => $this->foodId,
            'foodName' => $this->foodName,
            'mealTypeId' => (string) $this->mealTypeId,
            'unitId' => $this->unitId,
            'amount' => $this->amount,
            'date' => $this->date,
            'favorite' => $this->favorite ? 'true' : 'false', //TOOD: This should be null sometimes
            'brandName' => $this->brandName,
            'calories' => $this->calories,
        ]);
    }
}
