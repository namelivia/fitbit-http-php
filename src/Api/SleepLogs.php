<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\SleepLogs\SleepLogs as SleepLogsOperations;

class SleepLogs
{
    private $sleepLogs;

    public function __construct(Fitbit $fitbit)
    {
        $this->sleepLogs = new SleepLogsOperations($fitbit);
    }

    public function sleepLogs()
    {
        return $this->sleepLogs;
    }
}
