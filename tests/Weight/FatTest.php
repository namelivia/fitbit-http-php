<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Weight\Fat;
use Namelivia\Fitbit\Weight\Period;

class FatTest extends TestCase
{
    private $fitbit;
    private $weight;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->weight = new Fat($this->fitbit);
    }

    public function testGettingByDate()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/fat/date/2019-03-21.json')
            ->andReturn('dateFat');
        $this->assertEquals(
            'dateFat',
            $this->weight->getByDate(
                Carbon::today()
            )
        );
    }

    public function testGettingByPeriod()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/fat/date/2019-03-21/1w.json')
            ->andReturn('periodFat');
        $this->assertEquals(
            'periodFat',
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
            ->with('body/log/fat/date/2019-03-21/2019-03-25.json')
            ->andReturn('rangeFat');
        $this->assertEquals(
            'rangeFat',
            $this->weight->getByDateRange(
                Carbon::today(),
                Carbon::today()->addDays(4)
            )
        );
    }
}
