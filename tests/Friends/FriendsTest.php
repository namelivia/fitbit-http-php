<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Friends\Friends;

class FriendsTest extends TestCase
{
    private $fitbit;
    private $friends;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->friends = new Friends($this->fitbit);
    }

    public function testGettingTheUsersFriends()
    {
        $this->fitbit->shouldReceive('getV11Endpoint')
            ->once()
            ->with('friends.json')
            ->andReturn('friendsList');
        $this->assertEquals(
            'friendsList',
            $this->friends->get()
        );
    }

    public function testGettingTheUsersFriendsLeaderboard()
    {
        $this->fitbit->shouldReceive('getV11Endpoint')
            ->once()
            ->with('leaderboard/friends.json')
            ->andReturn('friendsLeaderboard');
        $this->assertEquals(
            'friendsLeaderboard',
            $this->friends->leaderboard()
        );
    }
}
