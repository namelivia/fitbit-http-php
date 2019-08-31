<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Water
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a user's current daily water consumption goal.
     */
    public function getGoals()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'water',
            'goal',
          ]) . '.json');
    }

    /**
     * Retrieves a summary and list of a user's water log entries for a given day.
     *
     * @param Carbon $date
     */
    public function getLogs(Carbon $date)
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'water',
            'date',
            $date->format('Y-m-d'),
          ]) . '.json');
    }
}
