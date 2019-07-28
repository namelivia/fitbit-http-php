<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\User\User as UserOperations;

class User
{
    private $user;

    public function __construct(Fitbit $fitbit)
    {
        $this->user = new UserOperations($fitbit);
    }

    public function user()
    {
        return $this->user;
    }
}
