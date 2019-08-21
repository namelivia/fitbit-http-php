<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Body\Goals;

use Namelivia\Fitbit\Api\Fitbit;

class Goals
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns the current body goal for the user for the given goal type.
     *
     * @param GoalType $type
     */
    public function get(GoalType $type)
    {
        return $this->fitbit->get(implode('/', [
            'body',
            'log',
            $type,
            'goal',
          ]) . '.json');
    }

    /**
     * Creates or updates user's fat percentage goal.
     *
     * @param int $fat
     */
    public function updateFat(int $fat)
    {
        $newValue = $fat / 100;

        return $this->fitbit->post(implode('/', [
            'body',
            'log',
            'fat',
            'goal',
          ]) . '.json?fat=' . $newValue);
    }

    /**
     * Creates or updates user's weight goal.
     *
     * @param weightGoal $weight
     */
    public function updateWeight(WeightGoal $weight)
    {
        return $this->fitbit->post(implode('/', [
            'body',
            'log',
            'weight',
            'goal',
          ]) . '.json?' . $weight->asUrlParam());
    }
}
