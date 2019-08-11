<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Body\Goals;

use Carbon\Carbon;

class WeightGoal
{
    private $startDate;
    private $startWeight;
    private $weight;

    public function __construct(
        Carbon $startDate,
        int $startWeight,
        int $weight
    ) {
        $this->startDate = $startDate->format('Y-m-d');
        $this->startWeight = $startWeight / 100;
        $this->weight = is_null($weight) ? null : $weight / 100;
    }

    /**
     * Returns the weight goal parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'startDate' => $this->startDate,
            'startWeight' => $this->startWeight,
            'weight' => $this->weight,
        ]);
    }
}
