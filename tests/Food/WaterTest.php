<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Water\Water;

class WaterTest extends TestCase
{
    private $fitbit;
    private $water;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->water = new Water($this->fitbit);
    }

    public function testGettingLogs()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/water/date/2019-03-21.json')
            ->andReturn('waterLogs');
        $this->assertEquals(
            'waterLogs',
            $this->water->getLogs(
                Carbon::today()
            )
        );
    }
}
