<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

class Fitbit
{
    private $nonUserUrl = 'https://api.fitbit.com/1/';
    private $baseUrl = 'https://api.fitbit.com/1/user/';
    private $userId = '-';
    private $client;
    private $activities;
    private $user;

    public function __construct(Api $api)
    {
        $this->client = $api->getClient();
        $this->activities = new Activities($this);
        $this->user = new User($this);
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
}
