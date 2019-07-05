<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Logs;

use Carbon\Carbon;

class ActivityLog extends Log
{

	public function __construct(
		Carbon $startDateTime,
		int $durationMillis,
		int $activityId,
		int $manualCalories = null,
		int $distance = null,
		int $distanceUnit = null
	) {
		parent::__construct(
			$startDateTime,
			$durationMillis,
			$activityId,
			null,
			$manualCalories,
			$distance,
			$distanceUnit,
		);
	}
}
