<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

class DetailLevel
{
    const ONE_MINUTE = 0;
    const FIFTEEN_MINUTES = 1;

    private $detailLevel;

    public function __construct(int $detailLevel)
    {
        if ($detailLevel < self::ONE_MINUTE || $detailLevel > self::FIFTEEN_MINUTES) {
            //TOD: Throw an exception
        }
        $this->detailLevel = $detailLevel;
    }

    public function asUrlParam()
    {
        switch ($this->detailLevel) {
            case self::ONE_MINUTE:
                return '1min';
            case self::FIFTEEN_MINUTES:
                return '15min';
            default:
                //TODO: Thrown an exception
                return;
        }
    }
}
