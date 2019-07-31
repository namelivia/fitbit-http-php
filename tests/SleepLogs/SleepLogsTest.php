<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\SleepLogs\Log;
use Namelivia\Fitbit\SleepLogs\SleepLogs;

class SleepLogsTest extends TestCase
{
    private $fitbit;
    private $sleepLogs;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->sleepLogs = new SleepLogs($this->fitbit);
    }

    public function testAddingALog()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('sleep.json?startTime=10%3A25%3A40&durationMillis=320&date=2019-03-21')
            ->andReturn('loggedSleep');
        $this->assertEquals(
            'loggedSleep',
            $this->sleepLogs->add(
                new Log(Carbon::now(), 320)
            )
        );
    }

    public function testRemovingASleepLog()
    {
        $sleepLogId = '1';
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('sleep/1.json')
            ->andReturn('');
        $this->assertEquals(
            '',
            $this->sleepLogs->remove($sleepLogId)
        );
    }

    public function testGettingLogsByDate()
    {
        $this->fitbit->shouldReceive('getv12Endpoint')
            ->once()
            ->with('sleep/date/2019-03-21.json')
            ->andReturn('sleepLogs');
        $this->assertEquals(
            'sleepLogs',
            $this->sleepLogs->getByDate(Carbon::today())
        );
    }

    public function testGettingLogsByDateRange()
    {
        $this->fitbit->shouldReceive('getv12Endpoint')
            ->once()
            ->with('sleep/date/2019-03-14/2019-03-21.json')
            ->andReturn('sleepLogsByRange');
        $this->assertEquals(
            'sleepLogsByRange',
            $this->sleepLogs->getByDateRange(Carbon::today()->subWeeks(1), Carbon::today())
        );
    }

    public function testListingAfterADate()
    {
        $this->fitbit->shouldReceive('getv12Endpoint')
            ->once()
            ->with('sleep/list.json?afterDate=2019-03-21&sort=desc&limit=200&offset=0')
            ->andReturn('sleepLogsList');
        $this->assertEquals(
            'sleepLogsList',
            $this->sleepLogs->listAfter(Carbon::now(), 'desc', 200)
        );
    }

    public function testListingLogsBeforeADate()
    {
        $this->fitbit->shouldReceive('getv12Endpoint')
            ->once()
            ->with('sleep/list.json?beforeDate=2019-03-21&sort=asc&limit=200&offset=0')
            ->andReturn('sleepLogsList');
        $this->assertEquals(
            'sleepLogsList',
            $this->sleepLogs->listBefore(Carbon::now(), 'asc', 200)
        );
    }
}
