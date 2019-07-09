<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity\Goals;

use Namelivia\Fitbit\Api\Fitbit;

class Goals
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Retrieves a user's current daily or weekly activity goals using
     * measurement units as defined in the unit system, which corresponds to the Accept-Language header provided.
     *
     * @param Period $period
     */
    public function get(Period $period)
    {
        $url = 'activities/goals/' . $period->asUrlParam() . '.json';

        return $this->fitbit->get($url);
    }

    /**
     * The Update Activity Goals endpoint creates or updates a user's daily activity goals and returns a
     * response using units in the unit system which corresponds to the Accept-Language header provided.
     *
     * @param Period $period
     * @param Goal $goal
     */
    public function update(
        Period $period,
        Goal $goal
    ) {
        $url = 'activities/goals/' . $period->asUrlParam() . '.json?' .
            $goal->asUrlParam();

        return $this->fitbit->post($url);
    }
}
