<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\HeartRate\HeartRate as HeartRateOperations;

class HeartRate
{
    private $heartRate;

    public function __construct(Fitbit $fitbit)
    {
        $this->heartRate = new HeartRateOperations($fitbit);
    }

    public function heartRate()
    {
        return $this->heartRate;
    }
}
