<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Devices\Alarm;
use Namelivia\Fitbit\Devices\Alarms;
use Namelivia\Fitbit\Devices\UpdatingAlarm;
use Namelivia\Fitbit\Devices\Weekdays;

class AlarmsTest extends TestCase
{
    private $fitbit;
    private $alarms;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->alarms = new Alarms($this->fitbit);
    }

    public function testGettingTheAlarmsListForADevice()
    {
        $this->fitbit->shouldReceive('get')
            ->once()
            ->with('devices/tracker/TrackerId/alarms.json')
            ->andReturn('AlarmsList');
        $this->assertEquals(
            'AlarmsList',
            $this->alarms->get('TrackerId')
        );
    }

    public function testAddingAnAlarmForADevice()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('devices/tracker/TrackerId/alarms.json?' .
            'time=10%3A03%2B00%3A00&enabled=true&recurring=false&weekDays=MONDAY')
            ->andReturn('AddedAlarm');
        $this->assertEquals(
            'AddedAlarm',
            $this->alarms->add(
                'TrackerId',
                new Alarm(Carbon::now(), true, false, new Weekdays([Weekdays::MONDAY]))
            )
        );
    }

    public function testUpdatingAnAlarmForADevice()
    {
        $this->fitbit->shouldReceive('post')
            ->once()
            ->with('devices/tracker/TrackerId/alarms/AlarmId.json?' .
            'time=10%3A03%2B00%3A00&enabled=true&recurring=false&' .
            'weekDays=SATURDAY%2CSUNDAY&snoozeLength=20&snoozeCount=30')
            ->andReturn('UpdatedAlarm');
        $this->assertEquals(
            'UpdatedAlarm',
            $this->alarms->update(
                'TrackerId',
                'AlarmId',
                new UpdatingAlarm(
                  Carbon::now(),
                  true,
                  false,
                  new Weekdays([Weekdays::SATURDAY, Weekdays::SUNDAY]),
                  20,
                  30
              )
            )
        );
    }

    public function testDeletingAnAlarmForADevice()
    {
        $this->fitbit->shouldReceive('delete')
            ->once()
            ->with('devices/tracker/TrackerId/alarms/AlarmId.json')
            ->andReturn('DeletedAlarm');
        $this->assertEquals(
            'DeletedAlarm',
            $this->alarms->remove(
                'TrackerId',
                'AlarmId'
            )
        );
    }
}
