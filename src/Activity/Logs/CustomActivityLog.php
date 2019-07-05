<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Logs;

use Carbon\Carbon;

class CustomActivityLog extends Log
{

	public function __construct(
		string $activityName,
		Carbon $startDateTime,
		int $durationMillis,
		int $manualCalories = null,
		int $distance = null,
		int $distanceUnit = null
	) {
		parent::__construct(
			$startDateTime,
			$durationMillis,
			null,
			$activityName,
			$manualCalories,
			$distance,
			$distanceUnit,
		);
	}
}
