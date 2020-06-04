<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Subscriptions\CollectionPath;
use Namelivia\Fitbit\Subscriptions\Subscriptions;

class SubscriptionsTest extends TestCase
{
    private $fitbit;
    private $subscriptions;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->subscriptions = new Subscriptions($this->fitbit);
    }

    public function testGettingAllSubscriptions()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('apiSubscriptions.json')
            ->andReturn('allSubscriptionsList');
        $this->assertEquals(
            'allSubscriptionsList',
            $this->subscriptions->getAll()
        );
    }

    public function testGettingCollectionSubscriptions()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/apiSubscriptions.json')
            ->andReturn('foodsSubscriptionsList');
        $this->assertEquals(
            'foodsSubscriptionsList',
            $this->subscriptions->getCollection(
                            new CollectionPath(CollectionPath::FOODS)
                        )
        );
    }

    public function testAddingSubscriptionToAllCollections()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('apiSubscriptions/subscriptionId.json')
            ->andReturn('addedSubscription');
        $this->assertEquals(
            'addedSubscription',
            $this->subscriptions->addAll(
                            'subscriptionId'
                        )
        );
    }

    public function testAddingSubscriptionToACollection()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('foods/apiSubscriptions/subscriptionId.json')
            ->andReturn('addedSubscription');
        $this->assertEquals(
            'addedSubscription',
            $this->subscriptions->addCollection(
                            'subscriptionId',
                            new CollectionPath(CollectionPath::FOODS)
                        )
        );
    }

    public function testRemovingSubscriptionToAllCollections()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('apiSubscriptions/subscriptionId.json')
            ->andReturn('');
        $this->assertEquals(
            '',
            $this->subscriptions->removeAll(
                            'subscriptionId'
                        )
        );
    }

    public function testRemovingSubscriptionToACollection()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('foods/apiSubscriptions/subscriptionId.json')
            ->andReturn('');
        $this->assertEquals(
            '',
            $this->subscriptions->removeCollection(
                            'subscriptionId',
                            new CollectionPath(CollectionPath::FOODS)
                        )
        );
    }
}
