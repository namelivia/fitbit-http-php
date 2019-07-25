<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\User\User;

class UserTest extends TestCase
{
    private $fitbit;
    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->user = new User($this->fitbit);
    }

    public function testGettingTheCurrentUserProfile()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('profile.json')
            ->andReturn('userProfile');
        $this->assertEquals(
            'userProfile',
            $this->user->getProfile()
        );
    }
}
