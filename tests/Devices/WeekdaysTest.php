<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\Devices\Weekdays;

class WeekdaysTest extends TestCase
{
    public function testPrintingAWeekdayList()
    {
        $this->assertEquals(
            'MONDAY,TUESDAY',
            (string) new Weekdays([Weekdays::MONDAY, Weekdays::TUESDAY])
        );
    }

    public function testValidatingAllWeekdayList()
    {
        $this->expectException(\Namelivia\Fitbit\Exceptions\InvalidConstantValueException::class);
        new Weekdays([Weekdays::MONDAY, 'INVALID_STRING']);
    }
}
