<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class HeightUnit extends BasicEnum
{
    public const UNITED_STATES = 'en_US';
    public const INTERNATIONAL = 'any';

    private $heightUnit;

    public function __construct(string $heightUnit)
    {
        parent::checkValidity($heightUnit);
        $this->heightUnit = $heightUnit;
    }

    public function __toString()
    {
        return $this->heightUnit;
    }
}
