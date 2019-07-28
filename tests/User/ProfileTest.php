<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;
use Namelivia\Fitbit\User\Gender;
use Namelivia\Fitbit\User\GlucoseUnit;
use Namelivia\Fitbit\User\HeightUnit;
use Namelivia\Fitbit\User\Language;
use Namelivia\Fitbit\User\Profile;
use Namelivia\Fitbit\User\StartDay;
use Namelivia\Fitbit\User\TimeFormat;
use Namelivia\Fitbit\User\WaterUnit;
use Namelivia\Fitbit\User\WeightUnit;

class ProfileTest extends TestCase
{
    private $profile;

    public function setUp()
    {
        parent::setUp();
        $this->profile = new Profile($this->profile);
    }

    public function testSettingAndPrintingTheGender()
    {
        $this->assertEquals(
            'gender=MALE',
            $this->profile->setGender(new Gender(Gender::MALE))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheBirthday()
    {
        $this->assertEquals(
            'birthday=2016-01-23',
            $this->profile->setBirthday(new Carbon('2016-01-23'))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheHeight()
    {
        $this->assertEquals(
            'height=1.57',
            $this->profile->setHeight(157)->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheAboutMeSection()
    {
        $this->assertEquals(
            'aboutMe=foobar',
            $this->profile->setAboutMe('foobar')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheFullName()
    {
        $this->assertEquals(
            'fullname=Mike+Peterson',
            $this->profile->setFullName('Mike Peterson')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheCountry()
    {
        $this->assertEquals(
            'country=AU',
            $this->profile->setCountry('AU')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheState()
    {
        $this->assertEquals(
            'state=AZ',
            $this->profile->setState('AZ')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheCity()
    {
        $this->assertEquals(
            'city=Barcelona',
            $this->profile->setCity('Barcelona')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheWalkingStrideLength()
    {
        $this->assertEquals(
            'strideLengthWalking=0.99',
            $this->profile->setStrideLengthWalking(99)->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheRunningStrideLength()
    {
        $this->assertEquals(
            'strideLengthRunning=1.29',
            $this->profile->setStrideLengthRunning(129)->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheWeightUnit()
    {
        $this->assertEquals(
            'weightUnit=en_GB',
            $this->profile->setWeightUnit(new WeightUnit(WeightUnit::GREAT_BRITAIN))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheHeightUnit()
    {
        $this->assertEquals(
            'heightUnit=en_US',
            $this->profile->setHeightUnit(new HeightUnit(HeightUnit::UNITED_STATES))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheWaterUnit()
    {
        $this->assertEquals(
            'waterUnit=any',
            $this->profile->setWaterUnit(new WaterUnit(WaterUnit::INTERNATIONAL))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheGlucoseUnit()
    {
        $this->assertEquals(
            'glucoseUnit=any',
            $this->profile->setGlucoseUnit(new GlucoseUnit(GlucoseUnit::INTERNATIONAL))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheTimezone()
    {
        $this->assertEquals(
            'timezone=Europe%5CMadrid',
            $this->profile->setTimezone('Europe\Madrid')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheFoodsLocale()
    {
        $this->assertEquals(
            'foodsLocale=es_ES',
            $this->profile->setFoodsLocale('es_ES')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheLocale()
    {
        $this->assertEquals(
            'locale=ja_JP',
            $this->profile->setLocale(new Language(Language::JA_JP))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheLocaleLang()
    {
        $this->assertEquals(
            'localeLang=es',
            $this->profile->setLocaleLang('es')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheLocaleCountry()
    {
        $this->assertEquals(
            'localeCountry=AR',
            $this->profile->setLocaleCountry('AR')->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheStartDayOfTheWeek()
    {
        $this->assertEquals(
            'startDayOfWeek=Monday',
            $this->profile->setStartDayOfWeek(new StartDay(StartDay::MONDAY))->asUrlParam()
        );
    }

    public function testSettingAndPrintingTheClockTimeDisplayFormat()
    {
        $this->assertEquals(
            'clockTimeDisplayFormat=12hour',
            $this->profile->setClockTimeDisplayFormat(new TimeFormat(TimeFormat::TWELVE_HOUR))->asUrlParam()
        );
    }
}
