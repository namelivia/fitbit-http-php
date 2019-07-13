<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Activity\DetailLevel;
use Namelivia\Fitbit\Activity\Resource\Resource;
use Namelivia\Fitbit\Activity\Intraday;
use Namelivia\Fitbit\Api\Fitbit;

class IntradayTest extends TestCase
{
    private $fitbit;
    private $intraday;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->intraday = new Intraday($this->fitbit);
    }

    public function testGettingForOneDay()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('activities/calories/date/2019-03-21/1d/1min.json')
            ->andReturn('intradayForOneDay');
        $this->assertEquals(
            'intradayForOneDay',
            $this->intraday->getForOneDay(
                Carbon::today(),
                new Resource(Resource::CALORIES),
                new DetailLevel(DetailLevel::ONE_MINUTE)
            )
        );
    }

    public function testGettingForOneDayAndTimeRange()
    {
      $this->fitbit->shouldReceive('get')
          ->once()
          ->with('activities/calories/date/2019-03-21/1d.json')
          ->andReturn('intradayForOneDayAndTimeRange');
      $this->assertEquals(
          'intradayForOneDayAndTimeRange',
          $this->intraday->getForOneDayAndTimeRange(
              Carbon::today(),
              Carbon::today()->addHours(3),
              Carbon::today()->addHours(4),
              new Resource(Resource::CALORIES)
          )
      );
    }

    public function testGettingForADateRange()
    {
      $this->fitbit->shouldReceive('get')
          ->once()
          ->with('activities/calories/date/2019-03-20/2019-03-22/1min.json')
          ->andReturn('intradayForADateRange');
      $this->assertEquals(
          'intradayForADateRange',
          $this->intraday->getForADateRange(
              Carbon::yesterday(),
              Carbon::tomorrow(),
              new Resource(Resource::CALORIES),
              new DetailLevel(DetailLevel::ONE_MINUTE)
          )
      );
    }

    public function testGettingForADateTimeRange()
    {
      $this->markTestIncomplete('TODO');
    }

}