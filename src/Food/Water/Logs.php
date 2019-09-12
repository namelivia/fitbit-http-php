<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Water;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Logs
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Retrieves a summary and list of a user's water log entries for a given day.
     *
     * @param Carbon $date
     */
    public function get(Carbon $date)
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
