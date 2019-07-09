<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use Namelivia\Fitbit\Api\Fitbit;

class Types
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Get a tree of all valid Fitbit public activities from the activities catalog as well as private custom
     * activities the user created in the format requested. If the activity has levels, also
     * get a list of activity level details.
     */
    public function browse()
    {
        return $this->fitbit->get('activities.json');
    }

    /**
     * Returns the details of a specific activity in the Fitbit activities database in the format requested.
     * If activity has levels, also returns a list of activity level details.
     *
     * @param int $activityId
     */
    public function get(int $activityId)
    {
        return $this->fitbit->getNonUserEndpoint('activities/' . $activityId . '.json');
    }

    /**
     * Retrieves a list of a user's frequent activities in the
     * format requested using units in the unit system which corresponds to the Accept-Language header provided.
     * A frequent activity record contains the distance and duration values recorded
     * the last time the activity was logged.
     * The record retrieved can be used to log the activity via the Log Activity endpoint with the same or
     * adjusted values for distance and duration.
     */
    public function frequent()
    {
        return $this->fitbit->get('activities/frequent.json');
    }

    /**
     * Retrieves a list of a user's recent activities types
     * logged with some details of the last activity log of that type using units in the unit system which
     * corresponds to the Accept-Language header provided. The record retrieved can be used to log the
     * activity via the Log Activity endpoint with the same or adjusted values for distance and duration.
     */
    public function recent()
    {
        return $this->fitbit->get('activities/recent.json');
    }
}
