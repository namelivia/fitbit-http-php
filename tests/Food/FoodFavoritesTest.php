<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Food\Favorite\Favorites;

class FoodFavoritesTest extends TestCase
{
    private $fitbit;
    private $favorites;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->favorites = new Favorites($this->fitbit);
    }

    public function testGettingAllFavorites()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('foods/log/favorite.json')
            ->andReturn('favorites');
        $this->assertEquals(
            'favorites',
            $this->favorites->get()
        );
    }
}
