<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\SleepLogs;

use Namelivia\Fitbit\Api\Fitbit;

class SleepLogs
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

}
