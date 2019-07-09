<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Activity
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Retrieves a summary and list of a user's
     * activities and activity log entries for a given day in the format requested
     * using units in the unit system which corresponds to the Accept-Language header provided.
     *
     * @param Carbon $date
     */
    public function getDailySummary(Carbon $date)
    {
        $formattedDate = $date->format('Y-m-d');
        return $this->fitbit->get('activities/date/' . $formattedDate . '.json');
    }

    /**
     * Retrieves the user's activity statistics in the format requested
     * using units in the unit system which corresponds to the Accept-Language header provided. Activity
     * statistics includes Lifetime and Best achievement values from the My Achievements tile on the website
     * dashboard. Response contains both statistics from the tracker device and total numbers including
     * tracker data and manual activity log entries as seen on the Fitbit website dashboard.
     */
    public function getLifetimeStats()
    {
        return $this->fitbit->get('activities.json');
    }
}
