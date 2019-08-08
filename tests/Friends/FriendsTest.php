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

    public function testInvitingAnUserById()
    {
        $this->fitbit->shouldReceive('postV11Endpoint')
            ->once()
            ->with('friends/invitations?invitedUserId=USERID')
            ->andReturn('invitedUser');
        $this->assertEquals(
            'invitedUser',
            $this->friends->inviteById('USERID')
        );
    }

    public function testInvitingAnUserByEmail()
    {
        $this->fitbit->shouldReceive('postV11Endpoint')
            ->once()
            ->with('friends/invitations?invitedUserEmail=foo@bar.com')
            ->andReturn('invitedUser');
        $this->assertEquals(
            'invitedUser',
            $this->friends->inviteByEmail('foo@bar.com')
        );
    }

    public function testGettingTheUserInvitations()
    {
        $this->fitbit->shouldReceive('getV11Endpoint')
            ->once()
            ->with('friends/invitations.json')
            ->andReturn('userInvitations');
        $this->assertEquals(
            'userInvitations',
            $this->friends->getInvitations()
        );
    }

    public function testAcceptingAnUserInvitation()
    {
        $this->fitbit->shouldReceive('postV11Endpoint')
            ->once()
            ->with('friends/invitations/USER1?accept=true')
            ->andReturn('acceptedInvitation');
        $this->assertEquals(
            'acceptedInvitation',
            $this->friends->acceptInvitation('USER1')
        );
    }

    public function testRejectingAnUserInvitation()
    {
        $this->fitbit->shouldReceive('postV11Endpoint')
            ->once()
            ->with('friends/invitations/USER1?accept=false')
            ->andReturn('rejectedInvitation');
        $this->assertEquals(
            'rejectedInvitation',
            $this->friends->rejectInvitation('USER1')
        );
    }
}
