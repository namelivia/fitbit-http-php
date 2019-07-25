<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class TimeFormat extends BasicEnum
{
    public const TWELVE_HOUR = '12hour';
    public const TWENTYFOUR_HOUR = '24hour';

    private $format;

    public function __construct(string $format)
    {
        parent::checkValidity($format);
        $this->format = $format;
    }

    public function __toString()
    {
        return $this->format;
    }
}
