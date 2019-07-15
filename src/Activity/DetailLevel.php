<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

class DetailLevel
{
    const ONE_MINUTE = '1min';
    const FIFTEEN_MINUTES = '15min';

    private $detailLevel;

    public function __construct(string $detailLevel)
    {
        if ($detailLevel < self::ONE_MINUTE || $detailLevel > self::FIFTEEN_MINUTES) {
            //TOD: Throw an exception
        }
        $this->detailLevel = $detailLevel;
    }

    public function __toString()
    {
        return $this->detailLevel;
    }
}
