<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Food;
use Namelivia\Fitbit\Api\Fitbit;

class ApiFoodTest extends TestCase
{
    private $fitbit;
    private $food;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->food = new Food($this->fitbit);
    }

    public function testGettingAFoodInstance()
    {
        $this->assertTrue($this->food->food() instanceof \Namelivia\Fitbit\Food\Food);
    }

    public function testGettingAWaterInstance()
    {
        $this->assertTrue($this->food->water() instanceof \Namelivia\Fitbit\Food\Water);
    }
}
