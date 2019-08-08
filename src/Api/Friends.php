<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Friends\Friends as FriendsOperations;

class Friends
{
    private $friends;

    public function __construct(Fitbit $fitbit)
    {
        $this->friends = new FriendsOperations($fitbit);
    }

    public function friends()
    {
        return $this->friends;
    }
}
