<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\SleepLogs\Goals;

class SleepGoalsTest extends TestCase
{
    private $fitbit;
    private $goals;

    public function setUp(): void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->goals = new Goals($this->fitbit);
    }

    public function testGettingSleepGoals()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('sleep/goal.json')
            ->andReturn('sleepGoals');
        $this->assertEquals(
            'sleepGoals',
            $this->goals->get()
        );
    }

    public function testUpdatingSleepGoals()
    {
        $minutes = 500;
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('sleep/goal.json?minDuration=500')
            ->andReturn('updatedSleepGoals');
        $this->assertEquals(
            'updatedSleepGoals',
            $this->goals->update($minutes)
        );
    }
}
