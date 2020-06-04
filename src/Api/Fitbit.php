<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

class Fitbit
{
    private $nonUserUrl = 'https://api.fitbit.com/1/';
    private $baseUrl = 'https://api.fitbit.com/1/user/';
    private $v11Url = 'https://api.fitbit.com/1.1/user/';
    private $v12Url = 'https://api.fitbit.com/1.2/user/';
    private $userId = '-';
    private $client;
    private $activities;
    private $user;
    private $friends;
    private $heartRate;
    private $sleepLogs;
    private $devices;
    private $body;
    private $food;
    private $subscriptions;

    public function __construct(Api $api)
    {
        $this->client = $api->getClient();
        $this->activities = new Activities($this);
        $this->user = new User($this);
        $this->heartRate = new HeartRate($this);
        $this->sleepLogs = new SleepLogs($this);
        $this->friends = new Friends($this);
        $this->devices = new Devices($this);
        $this->body = new Body($this);
        $this->food = new Food($this);
        $this->subscriptions = new Subscriptions($this);
    }

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

    //TODO: Ugh! I hate doing this
    public function getv11Endpoint($url)
    {
        return $this->client->get(
            $this->v11Url . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    //TODO: Ugh! I hate doing this
    public function postv11Endpoint($url)
    {
        return $this->client->post(
            $this->v11Url . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    //TODO: Ugh! I hate doing this
    public function getv12Endpoint($url)
    {
        return $this->client->get(
            $this->v12Url . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    //TODO: Ugh! I hate doing this
    public function postNonUserEndpoint($url)
    {
        return $this->client->post(
            $this->nonUserUrl . $url
        )->getBody()->getContents();
    }

    //TODO: Ugh! I hate doing this
    public function postv12Endpoint($url)
    {
        return $this->client->post(
            $this->v12Url . $this->userId . '/' . $url
        )->getBody()->getContents();
    }

    //TODO: Ugh! I hate doing this
    public function postBody($url, $body)
    {
        return $this->client->post(
            $this->baseUrl . $this->userId . '/' . $url,
            [
                'json' => $body,
            ]
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

    public function activities()
    {
        return $this->activities;
    }

    public function user()
    {
        return $this->user;
    }

    public function heartRate()
    {
        return $this->heartRate;
    }

    public function sleepLogs()
    {
        return $this->sleepLogs;
    }

    public function friends()
    {
        return $this->friends;
    }

    public function devices()
    {
        return $this->devices;
    }

    public function body()
    {
        return $this->body;
    }

    public function food()
    {
        return $this->food;
    }

    public function subscriptions()
    {
        return $this->subscriptions;
    }
}
