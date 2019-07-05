<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Activity\Goals\Goals;
use Namelivia\Fitbit\Activity\Goals\Goal;
use Namelivia\Fitbit\Activity\Goals\Period;
use Namelivia\Fitbit\Api\Fitbit;

class GoalsTest extends TestCase
{
	private $fitbit;
	private $goals;

	public function setUp()
	{
		parent::setUp();
		$this->fitbit = Mockery::mock(Fitbit::class);
		$this->goals = new Goals($this->fitbit);
	}

	public function testGettingTheGoalsForOneWeek()
	{
		$this->fitbit->shouldReceive('get')
			->once()
			->with('activities/goals/weekly.json')
			->andReturn('oneWeekGoals');
		$this->assertEquals(
			'oneWeekGoals',
			$this->goals->get(
				new Period(Period::WEEKLY)
			)
		);
	}

	public function testGettingTheGoalsForOneDay()
	{
		$this->fitbit->shouldReceive('get')
			->once()
			->with('activities/goals/daily.json')
			->andReturn('oneDayGoals');
		$this->assertEquals(
			'oneDayGoals',
			$this->goals->get(
				new Period(Period::DAILY)
			)
		);
	}

	public function testUpdatingAllGoalParameterForOneWeek()
	{
		$this->fitbit->shouldReceive('post')
			->once()
			->with(
				'activities/goals/weekly.json?activeMinutes=10&' .
				'caloriesOut=200&distance=3.2&floors=3&steps=12'
			)
			->andReturn('oneWeekGoals');
		$this->assertEquals(
			'oneWeekGoals',
			$this->goals->update(
				new Period(Period::WEEKLY),
				new Goal(10, 200, 320, 3, 12)
			)
		);
	}

	public function testUpdatingOneGoalParameterForOneDay()
	{
		$this->fitbit->shouldReceive('post')
			->once()
			->with('activities/goals/daily.json?caloriesOut=200')
			->andReturn('oneDayGoals');
		$this->assertEquals(
			'oneDayGoals',
			$this->goals->update(
				new Period(Period::DAILY),
				new Goal(null, 200, null, null, null)
			)
		);
	}
}
