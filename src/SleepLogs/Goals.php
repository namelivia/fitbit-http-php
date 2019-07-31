<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\SleepLogs;

use Namelivia\Fitbit\Api\Fitbit;

class Goals
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Retrieves a user's current daily sleep goal in minutes.
     *
     */
    public function get()
    {
        return $this->fitbit->get(implode('/', ['sleep', 'goal']) . '.json');
    }

    /**
     * Creates or updates a user's daily sleep goal in minutes and returns the new goal.
     *
     * @param int $duration
     */
    public function update(int $duration) {
        return $this->fitbit->post(implode('/', ['sleep', 'goal']) . '.json?minDuration=' . $duration);
    }
}
