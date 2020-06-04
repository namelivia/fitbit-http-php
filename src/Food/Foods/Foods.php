<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Namelivia\Fitbit\Api\Fitbit;

class Foods
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Returns the food locales that the user may choose to search, log, and create food in.
     */
    public function getLocales()
    {
        return $this->fitbit->getNonUserEndpoint(implode('/', [
            'foods',
            'locales',
        ]) . '.json');
    }

    /**
     * Given a search query, the Search Foods endpoint returns a list of public
     * foods from Fitbit foods database and private foods.
     *
     * @param string $query
     */
    public function search(string $query)
    {
        return $this->fitbit->getNonUserEndpoint(implode('/', [
            'foods',
            'search',
        ]) . '.json' . '?' . http_build_query(['query' => $query]));
    }

    /**
     * Returns a list of all valid Fitbit food units.
     */
    public function getUnits()
    {
        return $this->fitbit->getNonUserEndpoint(implode('/', [
            'foods',
            'units',
        ]) . '.json');
    }

    /**
     * Returns the details of a specific food in the Fitbit food database or a private food.
     *
     * @param string $foodId
     */
    public function get($foodId)
    {
        return $this->fitbit->getNonUserEndpoint(implode('/', [
            'foods',
            $foodId,
        ]) . '.json');
    }

    /**
     * Returns a list of a user's recent foods in the format requested.
     */
    public function recent()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'recent',
        ]) . '.json');
    }

    /**
     * Returns a list of a user's recent foods in the format requested.
     */
    public function frequent()
    {
        return $this->fitbit->get(implode('/', [
            'foods',
            'log',
            'frequent',
        ]) . '.json');
    }

    /**
     * Creates a new private food for a user and returns a response in the format requested.
     *
     * @param food $food
     */
    public function create(Food $food)
    {
        return $this->fitbit->postNonUserEndpoint('foods.json?' . $food->asUrlParam());
    }

    /**
     * Deletes custom food for a user and returns a response in the format requested.
     *
     * @param string $foodId
     */
    public function remove(string $foodId)
    {
        return $this->fitbit->delete('foods/' . $foodId . '.json');
    }
}
