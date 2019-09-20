<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Subscriptions\Subscriptions as SubscriptionsOperations;

class Subscriptions
{
    private $subscriptions;

    public function __construct(Fitbit $fitbit)
    {
        $this->subscriptions = new SubscriptionsOperations($fitbit);
    }

    public function subscriptions()
    {
        return $this->subscriptions;
    }
}
