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

    public function testWhenAnInvalidPeriodIsPassedAnExceptionWillBeThrown()
    {
        $this->expectException(\Namelivia\Fitbit\Exceptions\InvalidConstantValueException::class);
        new TrackerResource('invalidString');
    }
}
