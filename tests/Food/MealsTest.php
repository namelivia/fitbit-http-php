<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Meals\Meal;
use Namelivia\Fitbit\Food\Meals\Meals;

class MealsTest extends TestCase
{
    private $fitbit;
    private $meals;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->meals = new Meals($this->fitbit);
    }

    public function testAddingAMeal()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('meals.json?name=mealName&description=mealDescription&foodId=foodID&unitId=unitID&amount=1.8')
            ->andReturn('newMeal');
        $this->assertEquals(
            'newMeal',
            $this->meals->create(
                new Meal('mealName', 'mealDescription', 'foodID', 'unitID', 180)
            )
        );
    }

    public function testEditingAMeal()
    {
        $mealId = 'someMealId';
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('meals/someMealId.json?name=editedMealName&description=editedMealDescription&foodId=foodID&unitId=unitID&amount=23.8')
            ->andReturn('newMeal');
        $this->assertEquals(
            'newMeal',
            $this->meals->edit(
                $mealId,
                new Meal('editedMealName', 'editedMealDescription', 'foodID', 'unitID', 2380)
            )
        );
    }

    public function testDeletingAMeal()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('meals/MealId.json')
            ->andReturn('removedMeal');
        $this->assertEquals(
            'removedMeal',
            $this->meals->remove('MealId')
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
            $this->meals->get('MealId')
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
            $this->meals->all()
        );
    }
}
