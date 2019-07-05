<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Logs;

use Carbon\Carbon;

abstract class Log
{

	private $startTime;
	private $durationMillis;
	private $date;
	private $activityId;
	private $activityName;
	private $manualCalories;
	private $distance;
	private $distanceUnit;

	public function __construct(
		Carbon $startDateTime,
		int $durationMillis,
		int $activityId = null,
		string $activityName = null,
		int $manualCalories = null,
		int $distance = null,
		int $distanceUnit = null
	) {
		$this->startTime = $startDateTime->format('H:i:s');
		$this->durationMillis = $durationMillis;
		$this->date = $startDateTime->format('Y-m-d');
		$this->activityId = $activityId;
		$this->activityName = $activityName;
		$this->manualCalories = $manualCalories;
		$this->distance = is_null($distance) ? null : $distance / 100;
		$this->distanceUnit = $distanceUnit;
	}

	/**
	 * Returns the log parameters as an http query to be inserted in an API call.
	 */
	public function asUrlParam()
	{
		return http_build_query([
			'startTime' => $this->startTime,
			'durationMillis' => $this->durationMillis,
			'date' => $this->date,
			'activityId' => $this->activityId,
			'activityName' => $this->activityName,
			'manualCalories' => $this->manualCalories,
			'distance' => $this->distance,
			'distanceUnit' => $this->distanceUnit,
		]);
	}
}
