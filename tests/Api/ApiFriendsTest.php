<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\Friends;

class ApiFriendsTest extends TestCase
{
    private $fitbit;
    private $friends;

    public function setUp():void
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->friends = new Friends($this->fitbit);
    }

    public function testGettingAFriendsInstance()
    {
        $this->assertTrue($this->friends->friends() instanceof \Namelivia\Fitbit\Friends\Friends);
    }
}
