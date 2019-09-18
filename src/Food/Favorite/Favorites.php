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

    /**
     * Adds a food with the given ID to the user's list of favorite foods.
     *
     * @param string $foodId
     */
    public function add(string $foodId)
    {
        return $this->fitbit->post(implode('/', [
            'foods',
            'log',
            'favorite',
            $foodId,
          ]) . '.json');
    }

    /**
     * Removes edds a food with the given ID to the user's list of favorite foods.
     *
     * @param string $foodId
     */
    public function remove(string $foodId)
    {
        return $this->fitbit->delete(implode('/', [
            'foods',
            'log',
            'favorite',
            $foodId,
          ]) . '.json');
    }
}
