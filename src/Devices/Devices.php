<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Devices;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Devices
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }
}
