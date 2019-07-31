<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\SleepLogs\Goals;
use Namelivia\Fitbit\SleepLogs\SleepLogs as SleepLogsOperations;

class SleepLogs
{
    private $sleepLogs;
    private $goals;

    public function __construct(Fitbit $fitbit)
    {
        $this->sleepLogs = new SleepLogsOperations($fitbit);
        $this->goals = new Goals($fitbit);
    }

    public function sleepLogs()
    {
        return $this->sleepLogs;
    }

    public function goals()
    {
        return $this->goals;
    }
}
