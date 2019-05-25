<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Resource;

class AbstractResource
{

	const CALORIES = 0;
	const CALORIES_BMR = 1;
	const STEPS = 2;
	const DISTANCE = 3;
	const FLOORS = 4;
	const ELEVATION = 5;
	const MINUTES_SEDENTARY = 6;
	const MINUTES_LIGHTLY_ACTIVE = 7;
	const MINUTES_FAIRLY_ACTIVE = 8;
	const MINUTES_VERY_ACTIVE = 9;
	const ACTIVITY_CALORIES = 10;

	private $resource;

	public function __construct(int $resource)
	{
		if ($resource < self::CALORIES || $resource > self::ACTIVITY_CALORIES) {
			//TOD: Throw an exception
		}
		$this->resource = $resource;
	}

	public function asUrlParam()
	{
		switch ($this->resource) {
			case self::CALORIES:
				return $this->getPath() . 'calories';
			case self::CALORIES_BMR:
				return $this->getPath() . 'caloriesBRM';
			case self::STEPS:
				return $this->getPath() . 'steps';
			case self::DISTANCE:
				return $this->getPath() . 'distance';
			case self::FLOORS:
				return $this->getPath() . 'floors';
			case self::ELEVATION:
				return $this->getPath() . 'elevation';
			case self::MINUTES_SEDENTARY: 
				return $this->getPath() . 'minutesSedentary';
			case self::MINUTES_LIGHTLY_ACTIVE:
				return $this->getPath() . 'minutesLightlyActive';
			case self::MINUTES_FAIRLY_ACTIVE:
				return $this->getPath() . 'minutesFairlyActive';
			case self::MINUTES_VERY_ACTIVE:
				return $this->getPath() . 'minutesVeryActive';
			case self::ACTIVITY_CALORIES:
				return $this->getPath() . 'activityCalories';
			default:
				//TODO: Thrown an exception
				return null;
		}
	}
}
