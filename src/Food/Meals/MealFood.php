<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Meals;

class MealFood
{
    private $foodId;
    private $unitId;
    private $amount;

    public function __construct(
        string $foodId,
        string $unitId,
        int $amount
    ) {
        $this->foodId = $foodId;
        $this->unitId = $unitId;
        $this->amount = $amount / 100;
    }

    /**
     * Returns the meal food parameters as an array.
     */
    public function toArray()
    {
        return [
            'foodId' => $this->foodId,
            'amount' => $this->amount,
            'unitId' => $this->unitId,
        ];
    }
}
