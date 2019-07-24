<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Activity;

use Namelivia\Fitbit\BasicEnum;

class DetailLevel extends BasicEnum
{
    const ONE_MINUTE = '1min';
    const FIFTEEN_MINUTES = '15min';

    private $detailLevel;

    public function __construct(string $detailLevel)
    {
        parent::checkValidity($detailLevel);
        $this->detailLevel = $detailLevel;
    }

    public function __toString()
    {
        return $this->detailLevel;
    }
}
