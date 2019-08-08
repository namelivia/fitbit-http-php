<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Friends;

use Namelivia\Fitbit\Api\Fitbit;

class Friends
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns the data of a user's friends.
     * The Fitbit privacy setting, My Friends (Private, Friends Only or Public),
     * determines the access to a user's list of friends.
     */
    public function get()
    {
        return $this->fitbit->getv11Endpoint('friends.json');
    }

    /**
     * Returns the data of a user's friends leaderboard.
     */
    public function leaderboard()
    {
        return $this->fitbit->getv11Endpoint('leaderboard/friends.json');
    }

    /**
     * Creates an invitation to become friends with the authorized user.
     * The invitation is created silently and can only be fetched through the Get Invitations endpoint.
     * It can be accepted or rejected via the Accept Invitation endpoint.
     *
     * @param string userId
     */
    public function inviteById(string $userId)
    {
        return $this->fitbit->postv11Endpoint('friends/invitations?invitedUserId=' . $userId);
    }

    /**
     * Creates an invitation to become friends with the authorized user.
     * The invitation email is sent to the specified recipient to be accepted or rejected later.
     * It can be accepted or rejected via the Accept Invitation endpoint.
     *
     * @param string email
     */
    public function inviteByEmail(string $email)
    {
        return $this->fitbit->postv11Endpoint('friends/invitations?invitedUserEmail=' . $email);
    }
}
