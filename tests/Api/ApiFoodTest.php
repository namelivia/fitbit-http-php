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

		//TODO: Section tests will be here
    /*public function testGettingAFatInstance()
    {
        $this->assertTrue($this->food->fat() instanceof \Namelivia\Fitbit\Food\Fat\Fat);
		}*/
}
