<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use Namelivia\Fitbit\Api\Fitbit;

class Favorites
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a list of a user's favorite activities.
     */
    public function get()
    {
        return $this->fitbit->get(implode('/', ['activities', 'favorite']) . '.json');
    }

    /**
     * Adds the activity with the given ID to user's list of favorite activities.
     *
     * @param int $activityId
     */
    public function add(string $activityId)
    {
        return $this->fitbit->post(implode('/', ['activities', 'favorite', $activityId]) . '.json');
    }

    /**
     * Removes the activity with the given ID from a user's list of favorite activities.
     *
     * @param int $activityId
     */
    public function remove(string $activityId)
    {
        return $this->fitbit->delete(implode('/', ['activities', 'favorite', $activityId]) . '.json');
    }
}
