<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Body\Weight\Weight;
use Namelivia\Fitbit\Body\Weight\Log;
use Namelivia\Fitbit\Body\Period;

class WeightTest extends TestCase
{
    private $fitbit;
    private $weight;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->weight = new Weight($this->fitbit);
    }

    public function testGettingByDate()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/weight/date/2019-03-21.json')
            ->andReturn('dateWeight');
        $this->assertEquals(
            'dateWeight',
            $this->weight->getByDate(
                Carbon::today()
            )
        );
    }

    public function testGettingByPeriod()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/weight/date/2019-03-21/1w.json')
            ->andReturn('periodWeight');
        $this->assertEquals(
            'periodWeight',
            $this->weight->getByPeriod(
                Carbon::today(),
                new Period(Period::ONE_WEEK)
            )
        );
    }

    public function testGettingByDateRange()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/weight/date/2019-03-21/2019-03-25.json')
            ->andReturn('rangeWeight');
        $this->assertEquals(
            'rangeWeight',
            $this->weight->getByDateRange(
                Carbon::today(),
                Carbon::today()->addDays(4)
            )
        );
    }

    public function testAddingALog()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('body/log/weight.json?weight=1.95&date=2019-03-21&time=10%3A25%3A40')
            ->andReturn('addedWeightLog');
        $this->assertEquals(
            'addedWeightLog',
            $this->weight->add(
                new Log(195, Carbon::now())
            )
        );
    }

    public function testDeletingALog()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('body/log/weight/WeightLogId.json')
            ->andReturn('removedWeightLog');
        $this->assertEquals(
            'removedWeightLog',
            $this->weight->remove('WeightLogId')
        );
    }
}
