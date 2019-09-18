<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Namelivia\Fitbit\BasicEnum;

class Intensity extends BasicEnum
{
    public const MAINTENANCE = 'MAINTENANCE';
    public const EASIER = 'EASIER';
    public const MEDIUM = 'MEDIUM';
    public const KINDAHARD = 'KINDAHARD';
    public const HARDER = 'HARDER';

    private $intensity;

    public function __construct(string $intensity)
    {
        parent::checkValidity($intensity);
        $this->intensity = $intensity;
    }

    public function __toString()
    {
        return $this->intensity;
    }
}
