<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\Activity\Goals\Period;

class GoalPeriodTest extends TestCase
{
    public function testGettingAPeriodAsString()
    {
        $this->assertEquals(
            'daily',
            (string) (new Period(Period::DAILY))
        );
    }

    public function testWhenAnInvalidPeriodIsPassedAnExceptionWillBeThrown()
    {
        $this->expectException(\Namelivia\Fitbit\Exceptions\InvalidConstantValueException::class);
        new Period('invalidString');
    }
}
