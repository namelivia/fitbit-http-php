<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

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

    /**
     * Updates or creates a user's daily calorie consumption goal or food plan and returns
     * a response in the format requested.
     */
    public function update(FoodGoal $goal)
    {
        return $this->fitbit->post(implode('/', [
            'foods',
            'log',
            'goal',
          ]) . '.json?' . $goal->asUrlParam());
    }
}
