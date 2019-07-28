<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class WaterUnit extends BasicEnum
{
    public const UNITED_STATES = 'en_US';
    public const INTERNATIONAL = 'any';

    private $waterUnit;

    public function __construct(string $waterUnit)
    {
        parent::checkValidity($waterUnit);
        $this->waterUnit = $waterUnit;
    }

    public function __toString()
    {
        return $this->waterUnit;
    }
}
