<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Body\Goals\Goals;
use Namelivia\Fitbit\Body\Goals\GoalType;

class BodyGoalsTest extends TestCase
{
    private $fitbit;
    private $goals;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->goals = new Goals($this->fitbit);
    }

    public function testGettingAGoal()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/fat/goal.json')
            ->andReturn('fatGoal');
        $this->assertEquals(
            'fatGoal',
            $this->goals->get(new GoalType(GoalType::FAT))
        );
    }
}
