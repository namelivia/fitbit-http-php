<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Body\Fat as FatOperations;
use Namelivia\Fitbit\Body\Goals\Goals as GoalsOperations;

class Body
{
    private $fat;
    private $goals;

    public function __construct(Fitbit $fitbit)
    {
        $this->fat = new FatOperations($fitbit);
        $this->goals = new GoalsOperations($fitbit);
    }

    public function fat()
    {
        return $this->fat;
    }

    public function goals()
    {
        return $this->goals;
    }
}
