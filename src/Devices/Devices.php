<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Devices;

use Namelivia\Fitbit\Api\Fitbit;

class Devices
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns the data of user devices.
     * Third-party applications can check when a Fitbit device
     * last synced with Fitbit's servers using this endpoint.
     */
    public function get()
    {
        return $this->fitbit->get('devices.json');
    }
}
