<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Water;

class WaterGoal
{
    private $target;

    public function __construct(
        int $target
    ) {
        $this->target = $target / 10;
    }

    /**
     * Returns the water goal parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'target' => $this->target,
        ]);
    }
}
