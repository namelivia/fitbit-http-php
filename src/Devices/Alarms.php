<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Devices;

use Namelivia\Fitbit\Api\Fitbit;

class Alarms
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a list of the set alarms on the tracker connected to a user's account.
     *
     * @param string $trackerId
     */
    public function get(string $trackerId)
    {
        return $this->fitbit->get(implode('/', [
            'devices',
            'tracker',
            $trackerId,
            'alarms',
          ]) . '.json');
    }

    /**
     * Adds the alarm settings to a given ID for a given device.
     *
     * @param string $trackerId
     * @param Alarm $alarm
     */
    public function add(string $trackerId, Alarm $alarm)
    {
        return $this->fitbit->post(implode('/', [
            'devices',
            'tracker',
            $trackerId,
            'alarms',
          ]) . '.json?' . $alarm->asUrlParam());
    }

    /**
     * Updates the alarm entry with a given ID for a given device.
     * It also gets a response in the format requested.
     *
     * @param string $trackerId
     * @param string $alarmId
     * @param UpdatingAlarm $alarm
     */
    public function update(string $trackerId, string $alarmId, UpdatingAlarm $alarm)
    {
        return $this->fitbit->post(implode('/', [
            'devices',
            'tracker',
            $trackerId,
            'alarms',
            $alarmId,
          ]) . '.json?' . $alarm->asUrlParam());
    }

    /**
     * Deletes the user's device alarm entry with the given ID for a given device.
     *
     * @param string $trackerId
     * @param string $alarmId
     */
    public function remove(string $trackerId, string $alarmId)
    {
        return $this->fitbit->delete(implode('/', [
            'devices',
            'tracker',
            $trackerId,
            'alarms',
            $alarmId,
          ]) . '.json');
    }
}
