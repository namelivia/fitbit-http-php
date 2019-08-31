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
     * Write
     */
    public function getLocales()
    {
        return $this->fitbit->getNonUserEndpoint(implode('/', [
            'foods',
            'locales',
          ]) . '.json');
    }

    /**
     * Write
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
     * Write
     *
     * @param Carbon $date
     */
    public function getLogs(Carbon $date)
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'date',
            $date->format('Y-m-d')
          ]) . '.json');
    }

}
