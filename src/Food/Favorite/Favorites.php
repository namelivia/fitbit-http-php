<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Favorite;

use Namelivia\Fitbit\Api\Fitbit;

class Favorites
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns a list of a user's favorite foods.
     */
    public function get()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'favorite',
          ]) . '.json');
    }
}
