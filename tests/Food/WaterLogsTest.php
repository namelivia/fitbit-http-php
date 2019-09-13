<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Water\Logs;
use Namelivia\Fitbit\Food\Water\Log;
use Namelivia\Fitbit\Food\Water\Unit;

class WaterLogsTest extends TestCase
{
    private $fitbit;
    private $water;

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
            ->with('foods/log/water/date/2019-03-21.json')
            ->andReturn('waterLogs');
        $this->assertEquals(
            'waterLogs',
            $this->logs->get(
                Carbon::today()
            )
        );
    }

    public function testAddingALogEntry()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('foods/log/water.json?date=2019-03-21&unit=ml&amount=1.2')
            ->andReturn('addedLog');
        $this->assertEquals(
            'addedLog',
						$this->logs->add(
							new Log(Carbon::now(), 12, new Unit(Unit::MILIMETER))
						)
        );
    }

    public function testDeletingALogEntry()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('foods/log/water/logId.json')
            ->andReturn('');
        $this->assertEquals(
            '',
            $this->logs->remove('logId')
        );
    }
}
