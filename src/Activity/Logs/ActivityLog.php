<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Logs;

use Carbon\Carbon;

class ActivityLog extends Log
{

	public function __construct(
		int $activityId,
		Carbon $startDateTime,
		int $durationMillis,
		int $manualCalories = null,
		int $distance = null,
		string $distanceUnit = null,
		int $steps = null
	) {
		parent::__construct(
			$startDateTime,
			$durationMillis,
			$activityId,
			null,
			$manualCalories,
			$distance,
			$distanceUnit,
			$steps
		);
	}
}
