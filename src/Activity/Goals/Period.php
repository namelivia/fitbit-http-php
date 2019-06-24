<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Goals;

class Period
{

	const DAILY = 0;
	const WEEKLY = 1;

	private $period;

	public function __construct(int $period)
	{
		if ($period < self::DAILY || $period > self::WEEKLY) {
			//TODO: Throw an exception
		}
		$this->period = $period;
	}

	public function asUrlParam()
	{
		switch ($this->period) {
			case self::DAILY:
				return 'daily';
			case self::WEEKLY:
				return 'weekly';
			default:
				//TODO: Thrown an exception
				return null;
		}
	}
}
