<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Body\Fat as FatOperations;

class Body
{
    private $fat;

    public function __construct(Fitbit $fitbit)
    {
        $this->fat = new FatOperations($fitbit);
    }

    public function fat()
    {
        return $this->fat;
    }
}
