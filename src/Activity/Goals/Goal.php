<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Goals;

class Goal
{

	private $caloriesOut;
	private $activeMinutes;
	private $floors;
	private $distance;
	private $steps;

	public function __construct(
		int $activeMinutes = null,
		int $caloriesOut = null,
		int $distance = null,
		int $floors = null,
		int $steps = null
	) {
		$this->activeMinutes = $activeMinutes;
		$this->caloriesOut = $caloriesOut;
		$this->distance = is_null($distance) ? null : $distance / 100;
		$this->floors = $floors;
		$this->steps = $steps;
	}

	/**
	 * Returns the goal parameters as an http query to be inserted in an API call.
	 */
	public function asUrlParam()
	{
		return http_build_query([
			'activeMinutes' => $this->activeMinutes,
			'caloriesOut' => $this->caloriesOut,
			'distance' => $this->distance,
			'floors' => $this->floors,
			'steps' => $this->steps,
		]);
	}
}
