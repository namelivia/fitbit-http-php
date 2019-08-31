<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Meal;

class MealTest extends TestCase
{
    private $fitbit;
    private $meal;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->meal = new Meal($this->fitbit);
    }

    public function testAddingAMeal()
    {
			//TODO: To be implemented
    }

    public function testEditingAMeal()
    {
			//TODO: To be implemented
    }

    public function testDeletingAMeal()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('meals/MealId.json')
            ->andReturn('removedMeal');
        $this->assertEquals(
            'removedMeal',
            $this->meal->remove('MealId')
        );
    }

    public function testGettingAMeal()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('meals/MealId.json')
            ->andReturn('mealDetails');
        $this->assertEquals(
            'mealDetails',
            $this->meal->get('MealId')
        );
    }

    public function testGettingAllMeals()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('meals.json')
            ->andReturn('allMeals');
        $this->assertEquals(
            'allMeals',
            $this->meal->all()
        );
    }
}
