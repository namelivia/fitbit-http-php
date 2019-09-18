<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Water\Goals;
use Namelivia\Fitbit\Food\Water\WaterGoal;

class WaterGoalsTest extends TestCase
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
            ->with('foods/log/water/goal.json')
            ->andReturn('waterGoals');
        $this->assertEquals(
            'waterGoals',
            $this->goals->get()
        );
    }

    public function testSettingAWaterGoal()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('foods/log/water/goal.json?target=5.5')
            ->andReturn('updatedWaterGoal');
        $this->assertEquals(
            'updatedWaterGoal',
            $this->goals->update(new WaterGoal(55))
        );
    }
}
