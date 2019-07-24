<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Activity\Activity;
use Namelivia\Fitbit\Activity\Favorites;
use Namelivia\Fitbit\Activity\Goals\Goals;
use Namelivia\Fitbit\Activity\Intraday;
use Namelivia\Fitbit\Activity\Logs\Logs;
use Namelivia\Fitbit\Activity\TimeSeries;
use Namelivia\Fitbit\Activity\Types;

class Activities
{
    private $activity;
    private $timeSeries;
    private $intraday;
    private $activityTypes;
    private $activityLogs;
    private $favorites;
    private $goals;

    public function __construct(Fitbit $fitbit)
    {
        $this->activity = new Activity($fitbit);
        $this->timeSeries = new TimeSeries($fitbit);
        $this->intraday = new Intraday($fitbit);
        $this->activityTypes = new Types($fitbit);
        $this->activityLogs = new Logs($fitbit);
        $this->favorites = new Favorites($fitbit);
        $this->goals = new Goals($fitbit);
    }

    public function activity()
    {
        return $this->activity;
    }

    public function timeSeries()
    {
        return $this->timeSeries;
    }

    public function intraday()
    {
        return $this->intraday;
    }

    public function activityTypes()
    {
        return $this->activityTypes;
    }

    public function activityLogs()
    {
        return $this->activityLogs;
    }

    public function favorites()
    {
        return $this->favorites;
    }

    public function goals()
    {
        return $this->goals;
    }
}
