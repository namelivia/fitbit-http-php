<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Resource;

use Namelivia\Fitbit\BasicEnum;

class AbstractResource extends BasicEnum
{
    const CALORIES = 'calories';
    const CALORIES_BMR = 'caloriesBRM';
    const STEPS = 'steps';
    const DISTANCE = 'distance';
    const FLOORS = 'floors';
    const ELEVATION = 'elevation';
    const MINUTES_SEDENTARY = 'minutesSedentary';
    const MINUTES_LIGHTLY_ACTIVE = 'minutesLightlyActive';
    const MINUTES_FAIRLY_ACTIVE = 'minutesFairlyActive';
    const MINUTES_VERY_ACTIVE = 'minutesVeryActive';
    const ACTIVITY_CALORIES = 'activityCalories';

    private $resource;

    public function __construct(string $resource)
    {
        parent::checkValidity($resource);
        $this->resource = $resource;
    }

    public function __toString()
    {
        return $this->getPath() . $this->resource;
    }
}
