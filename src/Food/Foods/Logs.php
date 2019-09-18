<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

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
     * Returns a summary and list of a user's food log entries for a given day in the format requested.
     *
     * @param Carbon $date
     */
    public function get(Carbon $date)
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'date',
            $date->format('Y-m-d'),
          ]) . '.json');
    }

    /**
     * Creates log entry for on the user's food log, etheir a private or a public food.
     *
     * @param FoodLog $log
     */
    public function add(FoodLog $log)
    {
        return $this->fitbit->post('foods/log.json?' . $log->asUrlParam());
    }

    /**
     * Changes the quantity or calories consumed for a user's food log entry with the given ID.
     *
     * @param string $logId
     * @param UpdatedFoodLog $log
     */
    public function update(string $logId, UpdatedFoodLog $log)
    {
        return $this->fitbit->post('foods/log/' . $logId . '.json?' . $log->asUrlParam());
    }

    /**
     * Deletes a user's food log entry with the given ID.
     *
     * @param string $logId
     */
    public function remove(string $logId)
    {
        return $this->fitbit->delete('foods/log/' . $logId . '.json');
    }
}
