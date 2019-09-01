<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

abstract class FoodGoal
{
    private $calories;
    private $intensity;
    private $personalized;

    public function __construct(
        int $calories = null,
        Intensity $intensity = null,
        bool $personalized
    ) {
        $this->calories = $calories;
        $this->intensity = $intensity;
        $this->personalized = $personalized;
    }

    /**
     * Returns the food goal parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'calories' => $this->calories,
            'intensity' => is_null($this->intensity) ? null : (string) $this->intensity,
            'personalized' => $this->personalized ? 'true' : 'false',
        ]);
    }
}
