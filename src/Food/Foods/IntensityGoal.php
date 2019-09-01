<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

class IntensityGoal extends FoodGoal
{
    public function __construct(
        Intensity $intensity,
        bool $personalized
    ) {
		parent::__construct(null, $intensity, $personalized);
    }
}
