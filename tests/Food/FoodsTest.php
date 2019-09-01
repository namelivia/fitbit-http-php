<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Foods\FormType;
use Namelivia\Fitbit\Food\Foods\Food;
use Namelivia\Fitbit\Food\Foods\Foods;

class FoodsTest extends TestCase
{
    private $fitbit;
    private $foods;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->foods = new Foods($this->fitbit);
    }

    public function testGettingLocales()
    {
        $this->fitbit->shouldReceive('getNonUserEndpoint')
            ->once()
            ->with('foods/locales.json')
            ->andReturn('foodLocales');
        $this->assertEquals(
            'foodLocales',
            $this->foods->getLocales()
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
            $this->foods->getGoals()
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
            $this->foods->getLogs(
                Carbon::today()
            )
        );
    }

    public function testSearchingFoods()
    {
        $this->fitbit->shouldReceive('getNonUserEndpoint')
            ->once()
            ->with('foods/search.json?query=food+search+query')
            ->andReturn('searchResults');
        $this->assertEquals(
            'searchResults',
            $this->foods->search('food search query')
        );
    }

    public function testGettingTheFoodUnits()
    {
        $this->fitbit->shouldReceive('getNonUserEndpoint')
            ->once()
            ->with('foods/units.json')
            ->andReturn('foodUnits');
        $this->assertEquals(
            'foodUnits',
            $this->foods->getUnits()
        );
    }

    public function testGettingAFoodDetails()
    {
        $this->fitbit->shouldReceive('getNonUserEndpoint')
            ->once()
            ->with('foods/foodId.json')
            ->andReturn('foodDetails');
        $this->assertEquals(
            'foodDetails',
            $this->foods->get('foodId')
        );
    }

    public function testGettingRecentFoods()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/recent.json')
            ->andReturn('recentFoods');
        $this->assertEquals(
            'recentFoods',
            $this->foods->recent()
        );
    }

    public function testGettingFrequentFoods()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/frequent.json')
            ->andReturn('frequentFoods');
        $this->assertEquals(
            'frequentFoods',
            $this->foods->frequent()
        );
    }

    public function testCreatingAFood()
    {
        $this->fitbit->shouldReceive('postNonUserEndpoint')
            ->once()
            ->with('foods.json?name=test+food&defaultFoodMeasurementUnitId=unitId&defaultServingSize=servingSize&calories=400&description=test+food+description')
            ->andReturn('newFood');
        $this->assertEquals(
            'newFood',
            $this->foods->create(
                new Food(
                    'test food',
                    'unitId',
                    'servingSize',
                    400,
                    new FormType(FormType::DRY),
                    'test food description'
                )
            )
        );
    }

    public function testRemovingACustomFood()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('foods/1210.json')
            ->andReturn('deletedCustomFood');
        $this->assertEquals(
            'deletedCustomFood',
            $this->foods->remove('1210')
        );
    }
}
