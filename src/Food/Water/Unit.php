<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Water;

use Namelivia\Fitbit\BasicEnum;

class Unit extends BasicEnum
{
    public const MILIMETER = 'ml';
    public const FUILD_OUNCE = 'fl oz';
    public const CUP = 'cup';

    private $unit;

    public function __construct(string $unit)
    {
        parent::checkValidity($unit);
        $this->unit = $unit;
    }

    public function __toString()
    {
        return $this->unit;
    }
}
