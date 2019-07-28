<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class WeightUnit extends BasicEnum
{
    public const UNITED_STATES = 'en_US';
    public const GREAT_BRITAIN = 'en_GB';
    public const INTERNATIONAL = 'any';

    private $weightUnit;

    public function __construct(string $weightUnit)
    {
        parent::checkValidity($weightUnit);
        $this->weightUnit = $weightUnit;
    }

    public function __toString()
    {
        return $this->weightUnit;
    }
}
