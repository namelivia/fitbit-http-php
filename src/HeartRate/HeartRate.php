<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\HeartRate;

use Namelivia\Fitbit\Api\Fitbit;

class HeartRate
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }
}
