<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\Activity\Favorites;
use Namelivia\Fitbit\Api\Fitbit;
use Mockery;

class FavoritesTest extends TestCase
{
	private $fitbit;
	private $favorites;

	public function setUp()
	{
		parent::setUp();
		$this->fitbit = Mockery::mock(Fitbit::class);
		$this->favorites = new Favorites($this->fitbit);
	}

	public function testGettingAListOfFavoriteActivities()
	{
		$this->fitbit->shouldReceive('get')
			->once()
			->with('activities/favorite.json')
			->andReturn('favoriteActivities');
		$this->assertEquals(
			'favoriteActivities',
			$this->favorites->get()
		);
	}

	public function testAddingAFavoriteActivity()
	{
		$activityId = '10190';
		$this->fitbit->shouldReceive('post')
			->once()
			->with('activities/favorite/10190.json')
			->andReturn('added');
		$this->assertEquals(
			'added',
			$this->favorites->add($activityId)
		);
	}

	public function testRemovingAFavoriteActivity()
	{
		$activityId = '10190';
		$this->fitbit->shouldReceive('delete')
			->once()
			->with('activities/favorite/10190.json')
			->andReturn('removed');
		$this->assertEquals(
			'removed',
			$this->favorites->remove($activityId)
		);
	}
}
