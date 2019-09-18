<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Foods\Logs;
use Namelivia\Fitbit\Food\Foods\MealType;
use Namelivia\Fitbit\Food\Foods\PrivateFoodLog;
use Namelivia\Fitbit\Food\Foods\PublicFoodLog;
use Namelivia\Fitbit\Food\Foods\NutritionalValues;
use Namelivia\Fitbit\Food\Foods\UpdatedPublicFoodLog;
use Namelivia\Fitbit\Food\Foods\UpdatedPrivateFoodLog;

class FoodLogsTest extends TestCase
{
    private $fitbit;
    private $logs;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->logs = new Logs($this->fitbit);
    }

    public function testGettingLogs()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/date/2019-03-21.json')
            ->andReturn('foodLogs');
        $this->assertEquals(
            'foodLogs',
            $this->logs->get(
                Carbon::today()
            )
        );
    }

    public function testAddingAPrivateFoodLogWithNutritionalValues()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with(
                'foods/log.json?foodName=private+test+food&mealTypeId=1&unitId=unitId' .
                '&amount=0.02&date=2019-03-21&favorite=false&brandName=Brand+name&calories=3000&protein=10'
            )
            ->andReturn('createdFoodLog');
        $this->assertEquals(
            'createdFoodLog',
            $this->logs->add(
                (new PrivateFoodLog(
                    'private test food',
                    new MealType(MealType::BREAKFAST),
                    'unitId',
                    2,
                    Carbon::now(),
                    'Brand name',
                    3000
                ))->setNutritionalValues((new NutritionalValues())->setProtein(10))
            )
        );
    }

    public function testAddingAPublicFoodLog()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with(
                'foods/log.json?foodId=foodId&mealTypeId=3&unitId=unitId&amount=0.02' .
                '&date=2019-03-21&favorite=true&calories=2000'
            )
            ->andReturn('createdFoodLog');
        $this->assertEquals(
            'createdFoodLog',
            $this->logs->add(
                new PublicFoodLog(
                    'foodId',
                    new MealType(MealType::LUNCH),
                    'unitId',
                    2,
                    Carbon::now(),
                    true,
                    2000
                )
            )
        );
    }

    public function testUpdatingAPublicFoodLog()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with(
                'foods/log/logId.json?mealTypeId=3&unitId=unitId&amount=0.02'
            )
            ->andReturn('updatedFoodLog');
        $this->assertEquals(
            'updatedFoodLog',
            $this->logs->update(
                'logId',
                new UpdatedPublicFoodLog(
                    new MealType(MealType::LUNCH),
                    'unitId',
                    2
                )
            )
        );
    }

    public function testUpdatingAPrivateFoodLog()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with(
                'foods/log/logId.json?mealTypeId=3&calories=1000&iron=10'
            )
            ->andReturn('updatedFoodLog');
        $this->assertEquals(
            'updatedFoodLog',
            $this->logs->update(
                'logId',
                (new UpdatedPrivateFoodLog(
                    new MealType(MealType::LUNCH),
                    1000
                ))->setNutritionalValues((new NutritionalValues())->setIron(10))
            )
        );
    }

    public function testDeletingAFoodLog()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('foods/log/logId.json')
            ->andReturn('');
        $this->assertEquals(
            '',
            $this->logs->remove('logId')
        );
    }
}
