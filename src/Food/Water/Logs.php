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

    /**
     * Creates a water log entry on the users water log records.
     *
     * @param Log $log
     */
    public function add(Log $log)
    {
        return $this->fitbit->post(implode('/', [
            'foods',
            'log',
            'water',
        ]) . '.json?' . $log->asUrlParam());
    }

    /**
     * Creates a water log entry on the users water log records.
     *
     * @param string $logId
     * @param UpdatedLog $log
     */
    public function update(string $logId, UpdatedLog $log)
    {
        return $this->fitbit->post(implode('/', [
            'foods',
            'log',
            'water',
            $logId,
        ]) . '.json?' . $log->asUrlParam());
    }

    /**
     * Deletes a user water log entry with the given ID.
     *
     * @param string $logId
     */
    public function remove(string $logId)
    {
        return $this->fitbit->delete(implode('/', [
            'foods',
            'log',
            'water',
            $logId,
        ]) . '.json');
    }
}
