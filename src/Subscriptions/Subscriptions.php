<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Subscriptions;

use Namelivia\Fitbit\Api\Fitbit;

class Subscriptions
{
    private $fitbit;

    public function __construct(Fitbit $fitbit)
    {
        $this->fitbit = $fitbit;
    }

    /**
     * Get a list of all user's subscriptions for your application
     * in the format requested.
     */
    public function getAll()
    {
        return $this->fitbit->get('apiSubscriptions.json');
    }

    /**
     * Get a list of specific collection user's subscriptions
     * for your application in the format requested.
     *
     * @param CollectionPath $collectionPath
     */
    public function getCollection(CollectionPath $collectionPath)
    {
        return $this->fitbit->get(
            (string) $collectionPath . '/apiSubscriptions.json'
        );
    }

    /**
     * Adds a subscription in your application for all
     * collection so that users will get
     * notifications and return a response in the format requested.
     * The subscriptionId value provides a way to associate an update
     * with a particular user stream in your application.
     *
     * @param string $subscriptionId
     */
    public function addAll(string $subscriptionId)
    {
        return $this->fitbit->post(implode('/', [
            'apiSubscriptions',
            $subscriptionId,
        ]) . '.json');
    }

    /**
     * Adds a subscription in your application for an
     * specific collection so that users will get
     * notifications and return a response in the format requested.
     * The subscriptionId value provides a way to associate an update
     * with a particular user stream in your application.
     *
     * @param string $subscriptionId
     * @param CollectionPath $collectionPath
     */
    public function addCollection(
        string $subscriptionId,
        CollectionPath $collectionPath
    ) {
        return $this->fitbit->post(implode('/', [
            $collectionPath,
            'apiSubscriptions',
            $subscriptionId,
        ]) . '.json');
    }

    /**
     * Deletes all user's subscriptions for your application.
     *
     * @param string $subscriptionId
     */
    public function removeAll(string $subscriptionId)
    {
        return $this->fitbit->delete(implode('/', [
            'apiSubscriptions',
            $subscriptionId,
        ]) . '.json');
    }

    /**
     * Deletes a specific collection user's subscriptions
     * for your application.
     *
     * @param string $subscriptionId
     * @param CollectionPath $collectionPath
     */
    public function removeCollection(
        string $subscriptionId,
        CollectionPath $collectionPath
    ) {
        return $this->fitbit->delete(implode('/', [
            $collectionPath,
            'apiSubscriptions',
            $subscriptionId,
        ]) . '.json');
    }
}
