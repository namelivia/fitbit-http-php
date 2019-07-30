<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\HeartRate\Period;

class HeartRatePeriodTest extends TestCase
{
    public function testGettingAPeriodAsString()
    {
        $this->assertEquals(
            '1d',
            (string) (new Period(Period::ONE_DAY))
        );
    }

    /**
     * @expectedException Namelivia\Fitbit\Exceptions\InvalidConstantValueException
     */
    public function testWhenAnInvalidPeriodIsPassedAnExceptionWillBeThrown()
    {
        new Period('invalidString');
    }
}
