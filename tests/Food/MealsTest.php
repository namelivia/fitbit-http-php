<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Meals\Meal;
use Namelivia\Fitbit\Food\Meals\MealFood;
use Namelivia\Fitbit\Food\Meals\Meals;

class MealsTest extends TestCase
{
    private $fitbit;
    private $meals;

    public function setUp(): void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->meals = new Meals($this->fitbit);
    }

    public function testAddingAMeal()
    {
        $newMeal = (new Meal('mealName', 'mealDescription'))
                    ->addFood(new MealFood('foodId1', 'unitId1', 223))
                    ->addFood(new MealFood('foodId2', 'unitId2', 446));

        $this->fitbit->shouldReceive('postBody')
            ->once()
                        ->with('meals.json', [
                            'name' => 'mealName',
                            'description' => 'mealDescription',
                            'mealFoods' => [
                                [
                                    'foodId' => 'foodId1',
                                    'amount' => 2.23,
                                    'unitId' => 'unitId1',
                                ],
                                [
                                    'foodId' => 'foodId2',
                                    'amount' => 4.46,
                                    'unitId' => 'unitId2',
                                ],
                            ],
                        ])
            ->andReturn('newMeal');
        $this->assertEquals(
            'newMeal',
            $this->meals->create($newMeal)
        );
    }

    public function testEditingAMeal()
    {
        $mealId = 'someMealId';
        $editedMeal = (new Meal('mealName', 'mealDescription'))
                            ->addFood(new MealFood('foodId1', 'unitId1', 223))
                            ->addFood(new MealFood('foodId2', 'unitId2', 446));
        $this->fitbit->shouldReceive('postBody')
            ->once()
                        ->with('meals/someMealId.json', [
                            'name' => 'mealName',
                            'description' => 'mealDescription',
                            'mealFoods' => [
                                [
                                    'foodId' => 'foodId1',
                                    'amount' => 2.23,
                                    'unitId' => 'unitId1',
                                ],
                                [
                                    'foodId' => 'foodId2',
                                    'amount' => 4.46,
                                    'unitId' => 'unitId2',
                                ],
                            ],
                        ])
            ->andReturn('updatedMeal');
        $this->assertEquals(
            'updatedMeal',
            $this->meals->edit($mealId, $editedMeal)
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
