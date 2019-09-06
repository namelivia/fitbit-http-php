<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

class CaloriesGoal extends FoodGoal
{
    public function __construct(
        int $calories,
        bool $personalized
    ) {
        parent::__construct($calories, null, $personalized);
    }
}
