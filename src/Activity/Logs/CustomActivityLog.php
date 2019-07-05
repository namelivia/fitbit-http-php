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
		int $manualCalories,
		int $distance = null,
		string $distanceUnit = null
	) {
		parent::__construct(
			$startDateTime,
			$durationMillis,
			null,
			$activityName,
			$manualCalories,
			$distance,
			$distanceUnit,
			null
		);
	}
}
