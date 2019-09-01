<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Foods\Goals;

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
}
