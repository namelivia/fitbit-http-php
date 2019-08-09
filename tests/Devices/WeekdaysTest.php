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

    /**
     * @expectedException Namelivia\Fitbit\Exceptions\InvalidConstantValueException
     */
    public function testValidatingAllWeekdayList()
    {
      new Weekdays([Weekdays::MONDAY, 'INVALID_STRING']);
    }

}
