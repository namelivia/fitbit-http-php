<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Subscriptions;

use Namelivia\Fitbit\Api\Fitbit;

class Subscriptions
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }
}
