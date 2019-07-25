<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\Api\Fitbit;

class User
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a user's profile. The authenticated owner receives
     * all values. Access to other user's profile is not available.
     * If you wish to retrieve the profile information of the
     * authenticated owner's friends, use GetFriends.
     */
    public function getProfile()
    {
        return $this->fitbit->get('profile.json');
    }
}
