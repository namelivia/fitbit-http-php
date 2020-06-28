<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\OAuth\Config;

use GuzzleHttp\Client as OAuthClient;
use GuzzleHttp\HandlerStack;

class Config
{
    private $clientId;
    private $clientSecret;
    private $redirectUrl;
    private $code;

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $redirectUrl,
        string $code = null
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function setCode(string $code)
    {
        return $this->code = $code;
    }

    public function hasCode()
    {
        return !is_null($this->code);
    }

    public function toArray()
    {
        return [
            'code' => $this->code,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_url' => $this->redirectUrl,
        ];
    }

}
