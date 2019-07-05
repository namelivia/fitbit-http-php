<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Logs;

use Carbon\Carbon;

class CustomActivityLog extends Log
{

	public function __construct(
		Carbon $startDateTime,
		int $durationMillis,
		string $activityName,
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
