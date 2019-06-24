<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

class GoalPeriod
{

	const DAILY = 0;
	const WEEKLY = 1;

	private $goalPeriod;

	public function __construct(int $goalPeriod)
	{
		if ($goalPeriod < self::DAILY || $goalPeriod > self::WEEKLY) {
			//TODO: Throw an exception
		}
		$this->goalPeriod = $goalPeriod;
	}

	public function asUrlParam()
	{
		switch ($this->goalPeriod) {
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
