<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Foods\CaloriesGoal;
use Namelivia\Fitbit\Food\Foods\Goals;
use Namelivia\Fitbit\Food\Foods\Intensity;
use Namelivia\Fitbit\Food\Foods\IntensityGoal;

class FoodGoalsTest extends TestCase
{
    private $fitbit;
    private $goals;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->goals = new Goals($this->fitbit);
    }

    public function testGettingGoals()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/goal.json')
            ->andReturn('foodGoals');
        $this->assertEquals(
            'foodGoals',
            $this->goals->get()
        );
    }

    public function testSettingAnIntensityGoal()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('foods/log/goal.json?intensity=KINDAHARD&personalized=true')
            ->andReturn('updatedFoodGoals');
        $this->assertEquals(
            'updatedFoodGoals',
            $this->goals->update(new IntensityGoal(new Intensity(Intensity::KINDAHARD), true))
        );
    }

    public function testSettingACaloriesGoal()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('foods/log/goal.json?calories=5000&personalized=false')
            ->andReturn('updatedFoodGoals');
        $this->assertEquals(
            'updatedFoodGoals',
            $this->goals->update(new CaloriesGoal(5000, false))
        );
    }
}
