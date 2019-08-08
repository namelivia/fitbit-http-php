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
}
