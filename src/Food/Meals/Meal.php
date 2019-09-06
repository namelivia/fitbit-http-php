<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Meals;

class Meal
{
    private $name;
    private $description;
    private $foodId;
    private $unitId;
    private $amount;

    public function __construct(
        string $name,
        string $description,
        string $foodId,
        string $unitId,
        int $amount
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->foodId = $foodId;
        $this->unitId = $unitId;
        $this->amount = $amount / 100;
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'name' => $this->name,
            'description' => $this->description,
            'foodId' => $this->foodId,
            'unitId' => $this->unitId,
            'amount' => $this->amount,
        ]);
    }
}
