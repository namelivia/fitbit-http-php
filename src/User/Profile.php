<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Carbon\Carbon;

class Profile
{
    private $gender;
    private $birthday;
    private $height;
    private $aboutMe;
    private $fullname;
    private $country;
    private $state;
    private $city;
    private $strideLengthWalking;
    private $strideLengthRunning;
    private $weightUnit;
    private $heightUnit;
    private $waterUnit;
    private $glucoseUnit;
    private $timezone;
    private $foodsLocale;
    private $locale;
    private $localeLang;
    private $localeCountry;
    private $startDayOfWeek;
    private $clockTimeDisplayFormat;

    /**
     * Returns the set parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'gender' => is_null($this->gender) ? null :(string) $this->gender,
            'birthday' => $this->birthday,
            'height' => $this->height,
            'aboutMe' => $this->aboutMe,
            'fullname' => $this->fullname,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'strideLengthWalking' => $this->strideLengthWalking,
            'strideLengthRunning' => $this->strideLengthRunning,
            'weightUnit' => is_null($this->weightUnit) ? null : (string) $this->weightUnit,
            'heightUnit' => is_null($this->heightUnit) ? null :(string) $this->heightUnit,
            'waterUnit' => is_null($this->waterUnit) ? null : (string) $this->waterUnit,
            'glucoseUnit' => is_null($this->glucoseUnit) ? null : (string) $this->glucoseUnit,
            'timezone' => $this->timezone,
            'foodsLocale' => $this->foodsLocale,
            'locale' => is_null($this->locale) ? null : (string) $this->locale,
            'localeLang' => $this->localeLang,
            'localeCountry' => $this->localeCountry,
            'startDayOfWeek' => is_null($this->startDayOfWeek) ? null : (string) $this->startDayOfWeek,
            'clockTimeDisplayFormat' => is_null($this->clockTimeDisplayFormat) ? null : (string) $this->clockTimeDisplayFormat,
        ]);
    }

    /**
     * Sets gender, more accurately, sex; (MALE/FEMALE/NA).
     *
     * @param Gender $gender
     *
     * @return $this
     */
    public function setGender(Gender $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Sets the date of birth.
     *
     * @param Carbon $birthday
     *
     * @return $this
     */
    public function setBirthday(Carbon $birthday)
    {
        $this->birthday = $birthday->format('Y-m-d');

        return $this;
    }

    /**
     * Sets the height in centimeters.
     *
     * @param int $height
     *
     * @return $this
     */
    public function setHeight(int $height)
    {
        $this->height = $height / 100;

        return $this;
    }

    /**
     * Sets the about me string.
     *
     * @param string $aboutMe
     *
     * @return $this
     */
    public function setAboutMe(string $aboutMe)
    {
        $this->aboutMe = $aboutMe;

        return $this;
    }

    /**
     * Sets the full name.
     *
     * @param string $fullname
     *
     * @return $this
     */
    public function setFullname(string $fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Sets the country, accepts a two character code.
     *
     * @param string $country
     *
     * @return $this
     */
    public function setCountry(string $country)
    {
			  //TODO: Countries as enum?
        $this->country = $country;

        return $this;
    }

    /**
     * Sets the US State, two-character code, valid only if country was or being set to US.
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState(string $state)
    {
			  //TODO: States as enum?
        $this->state = $state;

        return $this;
    }

    /**
     * Sets the city.
     *
     * @param string $city
     *
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Sets the walking stride length in centimeters.
     *
     * @param int $strideLengthWalking
     *
     * @return $this
     */
    public function setStrideLengthWalking(int $strideLengthWalking)
    {
        $this->strideLengthWalking = $strideLengthWalking / 100;

        return $this;
    }

    /**
     * Sets the running stride length in centimeters.
     *
     * @param int $strideLengthRunning
     *
     * @return $this
     */
    public function setStrideLengthRunning(int $strideLengthRunning)
    {
        $this->strideLengthRunning = $strideLengthRunning / 100;

        return $this;
    }

    /**
     * Sets the default weight unit on website (doesn't affect API)
     * One of (en_US, en_GB, "any" for METRIC).
     *
     * @param WeightUnit $weightUnit
     *
     * @return $this
     */
    public function setWeightUnit(WeightUnit $weightUnit)
    {
        $this->weightUnit = $weightUnit;

        return $this;
    }

    /**
     * Sets the default height/distance unit on website (doesn't affect API)
     * One of (en_US, "any" for METRIC).
     *
     * @param HeightUnit $heightUnit
     *
     * @return $this
     */
    public function setHeightUnit(HeightUnit $heightUnit)
    {
        $this->heightUnit = $heightUnit;

        return $this;
    }

    /**
     * Sets the default water unit on website (doesn't affect API)
     * One of (en_US, "any" for METRIC).
     *
     * @param WaterUnit $waterUnit
     *
     * @return $this
     */
    public function setWaterUnit(WaterUnit $waterUnit)
    {
        $this->waterUnit = $waterUnit;

        return $this;
    }

    /**
     * Sets the default glucose unit on website (doesn't affect API)
     * One of (en_US, "any" for METRIC).
     *
     * @param GlucoseUnit $glucoseUnit
     *
     * @return $this
     */
    public function setGlucoseUnit(GlucoseUnit $glucoseUnit)
    {
        $this->glucoseUnit = $glucoseUnit;

        return $this;
    }

    /**
     * Sets the timezone in the format "America/Los_Angeles".
     *
     * @param string $timezone
     *
     * @return $this
     */
    public function setTimezone(string $timeZone)
    {
			  //TODO: Can I get a list of timezones?
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Sets the food database locale; in the format "xx_XX".
     *
     * @param string $foodsLocale
     *
     * @return $this
     */
    public function setFoodsLocale(string $foodsLocale)
    {
			  //TODO: Can I get a list of locales?
        $this->foodsLocale = $foodsLocale;

        return $this;
    }

    /**
     * Sets the ocale of website (country/language)
     * One of the locales, currently – (en_US, fr_FR, de_DE, es_ES, en_GB, en_AU, en_NZ, ja_JP).
     *
     * @param Language $locale
     *
     * @return $this
     */
    public function setLocale(Language $locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Sets the language
     * In the format "xx".
     * You should specify either locale or both - localeLang and
     * localeCountry (locale is higher priority).
     *
     * @param $localeLang
     *
     * @return $this
     */
    public function setLocaleLang($localeLang)
    {
        $this->localeLang = $localeLang;

        return $this;
    }

    /**
     * Sets the country; in the format "XX".
     * You should specify either locale or both - localeLang and
     * localeCountry (locale is higher priority).
     *
     * @param $localeCountry
     *
     * @return $this
     */
    public function setLocaleCountry($localeCountry)
    {
        $this->localeCountry = $localeCountry;

        return $this;
    }

    /**
     * Sets what day the week should start on. Either Sunday or Monday.
     *
     * @param StartDay $startDayOfWeek
     *
     * @return $this
     */
    public function setStartDayOfWeek(StartDay $startDayOfWeek)
    {
        $this->startDayOfWeek = $startDayOfWeek;

        return $this;
    }

    /**
     * Sets how trackers with a clock should display the time. Either 12hour or 24hour.
     *
     * @param TimeFormat $clockTimeDisplayFormat
     *
     * @return $this
     */
    public function setClockTimeDisplayFormat(TimeFormat $clockTimeDisplayFormat)
    {
        $this->clockTimeDisplayFormat = $clockTimeDisplayFormat;

        return $this;
    }

}
