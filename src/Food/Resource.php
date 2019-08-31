<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food;

use Namelivia\Fitbit\BasicEnum;

class Resource extends BasicEnum
{
    const CALORIES_IN = 'caloriesIn';
    const WATER = 'water';

    private $resource;

    public function __construct(string $resource)
    {
        parent::checkValidity($resource);
        $this->resource = $resource;
    }

    public function __toString()
    {
        return $this->resource;
    }
}
