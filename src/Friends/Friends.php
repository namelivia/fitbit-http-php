<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Friends;

use Carbon\Carbon;
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
     *
     * @param Carbon $date
     * @param Period $period
     */
    public function get()
    {
        return $this->fitbit->getv11Endpoint('friends.json');
    }
}
