<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use GuzzleHttp\Client;
use Namelivia\Fitbit\Activity\Activity;
use Namelivia\Fitbit\Activity\Favorites;
use Namelivia\Fitbit\Activity\Goals\Goals;
use Namelivia\Fitbit\Activity\Intraday;
use Namelivia\Fitbit\Activity\Logs\Logs;
use Namelivia\Fitbit\Activity\TimeSeries;
use Namelivia\Fitbit\Activity\Types;

class Fitbit
{
    private $nonUserUrl = 'https://api.fitbit.com/1/';
    private $baseUrl = 'https://api.fitbit.com/1/user/';
    private $userId = '-';
    private $client;
    private $activity;
    private $timeSeries;
    private $intraday;
    private $activityTypes;
    private $activityLogs;
    private $favorites;
    private $goals;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->activity = new Activity($this);
        $this->timeSeries = new TimeSeries($this);
        $this->intraday = new Intraday($this);
        $this->activityTypes = new Types($this);
        $this->activityLogs = new Logs($this);
        $this->favorites = new Favorites($this);
        $this->goals = new Goals($this);
    }

    //TODO: Now I want to separate this get, etc.. methods from the Fitbit class
    public function get($url)
    {
        return $this->client->get(
            $this->baseUrl . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    //TODO: Ugh! I hate doing this
    public function getNonUserEndpoint($url)
    {
        return $this->client->get(
            $this->nonUserUrl . $url
        )->getBody()->getContents();
    }

    public function post($url)
    {
        return $this->client->post(
            $this->baseUrl . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    public function delete($url)
    {
        return $this->client->delete(
            $this->baseUrl . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    public function userId(int $userId)
    {
        $this->userId = $userId;
    }

    public function currentUser()
    {
        $this->userId = '-';
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
