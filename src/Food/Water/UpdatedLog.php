<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Water;

class UpdatedLog
{
    private $amount;
    private $unit;

    public function __construct(
        int $amount,
        Unit $unit = null
    ) {
        $this->amount = $amount / 10;
        $this->unit = $unit;
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'unit' => is_null($this->unit) ? null : (string) $this->unit,
            'amount' => $this->amount,
        ]);
    }
}
