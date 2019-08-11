<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Body\Goals;

use Namelivia\Fitbit\Api\Fitbit;

class Goals
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }
}
