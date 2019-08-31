<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Food;

class FoodTest extends TestCase
{
    private $fitbit;
    private $food;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->food = new Food($this->fitbit);
    }

    public function testGettingLocales()
    {
        $this->fitbit->shouldReceive('getNonUserEndpoint')
            ->once()
            ->with('foods/locales.json')
            ->andReturn('foodLocales');
        $this->assertEquals(
            'foodLocales',
            $this->food->getLocales()
        );
    }

    public function testGettingGoals()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/goal.json')
            ->andReturn('foodGoals');
        $this->assertEquals(
            'foodGoals',
            $this->food->getGoals()
        );
    }

    public function testGettingLogs()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/date/2019-03-21.json')
            ->andReturn('foodLogs');
        $this->assertEquals(
            'foodLogs',
            $this->food->getLogs(
                Carbon::today()
            )
        );
    }
}
