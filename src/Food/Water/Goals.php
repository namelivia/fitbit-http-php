<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Water;

use Namelivia\Fitbit\Api\Fitbit;

class Goals
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a user's current daily water consumption goal.
     */
    public function get()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'water',
            'goal',
          ]) . '.json');
    }

    /**
     * Updates or creates a user's daily water consumption goal and returns
     * a response in the format requested.
     */
    public function update(WaterGoal $goal)
    {
        return $this->fitbit->post(implode('/', [
            'foods',
            'log',
            'water',
            'goal',
          ]) . '.json?' . $goal->asUrlParam());
    }
}
