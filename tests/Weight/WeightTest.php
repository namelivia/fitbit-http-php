<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Weight\Weight;
use Namelivia\Fitbit\Weight\Period;

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

    public function testGettingByPeriod()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('body/log/fat/date/2019-03-21/1w.json')
            ->andReturn('periodWeight');
        $this->assertEquals(
            'periodWeight',
            $this->weight->getByPeriod(
                Carbon::today(),
                new Period(Period::ONE_WEEK)
            )
        );
    }
}
