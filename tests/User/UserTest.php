<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\User\Gender;
use Namelivia\Fitbit\User\GlucoseUnit;
use Namelivia\Fitbit\User\Profile;
use Namelivia\Fitbit\User\StartDay;
use Namelivia\Fitbit\User\User;

class UserTest extends TestCase
{
    private $fitbit;
    private $user;

    public function setUp(): void
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

    public function testUpdatingTheCurrentUserProfile()
    {
        $profile = (new Profile())->setGender(new Gender(Gender::FEMALE))
          ->setStartDayOfWeek(new StartDay(StartDay::SUNDAY))
          ->setGlucoseUnit(new GlucoseUnit(GlucoseUnit::INTERNATIONAL));
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('profile.json?gender=FEMALE&glucoseUnit=any&startDayOfWeek=Sunday')
            ->andReturn('updatedProfile');
        $this->assertEquals(
            'updatedProfile',
            $this->user->updateProfile($profile)
        );
    }

    public function testGettingTheCurrentUserBadges()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('badges.json')
            ->andReturn('userBadges');
        $this->assertEquals(
            'userBadges',
            $this->user->getBadges()
        );
    }
}
