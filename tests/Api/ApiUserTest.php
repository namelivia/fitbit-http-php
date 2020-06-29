<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\User;

class ApiUserTest extends TestCase
{
    private $fitbit;
    private $user;

    public function setUp():void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->user = new User($this->fitbit);
    }

    public function testGettingAUserInstance()
    {
        $this->assertTrue($this->user->user() instanceof \Namelivia\Fitbit\User\User);
    }
}
