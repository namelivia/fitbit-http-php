<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Api;

use Namelivia\Fitbit\Weight\Weight as WeightOperations;

class Weight
{
    private $weight;

    public function __construct(Fitbit $fitbit)
    {
        $this->weight = new WeightOperations($fitbit);
    }

    public function weight()
    {
        return $this->weight;
    }
}
