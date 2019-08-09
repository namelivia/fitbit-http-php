<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Devices\Devices as DevicesOperations;

class Devices
{
    private $devices;

    public function __construct(Fitbit $fitbit)
    {
        $this->devices = new DevicesOperations($fitbit);
    }

    public function devices()
    {
        return $this->devices;
    }
}
