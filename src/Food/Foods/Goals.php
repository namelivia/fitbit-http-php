<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Goals
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a user's current daily calorie consumption goal and/or food Plan in the format requested.
     */
    public function get()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'goal',
          ]) . '.json');
    }
}
