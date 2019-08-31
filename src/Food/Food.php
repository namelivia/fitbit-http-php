<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Food
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns the food locales that the user may choose to search, log, and create food in.
     */
    public function getLocales()
    {
        return $this->fitbit->getNonUserEndpoint(implode('/', [
            'foods',
            'locales',
          ]) . '.json');
    }

    /**
     * Returns a user's current daily calorie consumption goal and/or food Plan in the format requested.
     */
    public function getGoals()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'goal',
          ]) . '.json');
    }

    /**
     * Returns a summary and list of a user's food log entries for a given day in the format requested.
     *
     * @param Carbon $date
     */
    public function getLogs(Carbon $date)
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'date',
            $date->format('Y-m-d'),
          ]) . '.json');
    }

}
