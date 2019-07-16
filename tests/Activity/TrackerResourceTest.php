<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\Activity\Resource\TrackerResource;

class TrackerResourceTest extends TestCase
{
    public function testGettingAPeriodAsString()
    {
        $this->assertEquals(
            'activities/tracker/calories',
            (string) (new TrackerResource(TrackerResource::CALORIES))
        );
    }

    /**
     * @expectedException Namelivia\Fitbit\Exceptions\InvalidConstantValueException
     */
    public function testWhenAnInvalidPeriodIsPassedAnExceptionWillBeThrown()
    {
        new TrackerResource('invalidString');
    }
}
