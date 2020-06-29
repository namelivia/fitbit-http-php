<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\Subscriptions;

class ApiSubscriptionsTest extends TestCase
{
    private $fitbit;
    private $subscriptions;

    public function setUp():void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->subscriptions = new Subscriptions($this->fitbit);
    }

    public function testGettingASubscriptionsInstance()
    {
        $this->assertTrue($this->subscriptions->subscriptions() instanceof \Namelivia\Fitbit\Subscriptions\Subscriptions);
    }
}
