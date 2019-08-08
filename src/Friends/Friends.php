<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Friends;

use Carbon\Carbon;
use Namelivia\Fitbit\Api\Fitbit;

class Friends
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }
}
