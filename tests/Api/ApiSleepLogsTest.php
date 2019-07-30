<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\SleepLogs;

class ApiSleepLogsTest extends TestCase
{
    private $fitbit;
    private $sleepLogs;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->sleepLogs = new SleepLogs($this->fitbit);
    }

    public function testGettingASleepLogsInstance()
    {
        $this->assertTrue($this->sleepLogs->sleepLogs() instanceof \Namelivia\Fitbit\SleepLogs\SleepLogs);
    }
}
