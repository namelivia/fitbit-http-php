<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

class Profile
{
    private $gender;
    private $birhday;
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
						'gender' => $this->gender,
						'birhday' => $this->birhday,
						'height' => $this->height,
						'aboutMe' => $this->aboutMe,
						'fullname' => $this->fullname,
						'country' => $this->country,
						'state' => $this->state,
						'city' => $this->city,
						'strideLengthWalking' => $this->strideLengthWalking,
						'strideLengthRunning' => $this->strideLengthRunning,
						'weightUnit' => $this->weightUnit,
						'heightUnit' => $this->heightUnit,
						'waterUnit' => $this->waterUnit,
						'glucoseUnit' => $this->glucoseUnit,
						'timezone' => $this->timezone,
						'foodsLocale' => $this->foodsLocale,
						'locale' => $this->locale,
						'localeLang' => $this->localeLang,
						'localeCountry' => $this->localeCountry,
						'startDayOfWeek' => $this->startDayOfWeek,
						'clockTimeDisplayFormat' => $this->clockTimeDisplayFormat,
        ]);
    }

    /**
     * Sets how trackers with a clock should display the time. Either 12hour or 24hour.
		 *
		 * @param $clockTimeDisplayFormat
		 *
		 * @return $this
     */
		public function setClockTimeDisplayFormat($clockTimeDisplayFormat)
		{
			  $this->clockTimeDisplayFormat = $clockTimeDisplayFormat;
        return $this;
		}

    /**
     * Sets gender, more accurately, sex; (MALE/FEMALE/NA)
		 *
		 * @param $gender
		 *
		 * @return $this
     */
		public function setGender($gender)
		{
			  $this->gender = $gender;
        return $this;
		}

    /**
     * Sets the date of birth.
		 *
		 * @param $birthday
		 *
		 * @return $this
     */
		public function setBirthday($birthday)
		{
			  $this->birthday = $birthday;
        return $this;
		}

    /**
     * Sets the height in centimeters.
		 *
		 * @param $height
		 *
		 * @return $this
     */
		public function setHeight($height)
		{
			  $this->height = $height;
        return $this;
		}

    /**
     * Sets the about me string.
		 *
		 * @param $aboutMe
		 *
		 * @return $this
     */
		public function setAboutMe($aboutMe)
		{
			  $this->aboutMe = $aboutMe;
        return $this;
		}

    /**
     * Sets the full name.
		 *
		 * @param $clockTimeDisplayFormat
		 *
		 * @return $this
     */
		public function setFullname($fullName)
		{
			  $this->fullName = $fullName;
        return $this;
		}

    /**
     * Sets the country, accepts a two character code.
		 *
		 * @param $country
		 *
		 * @return $this
     */
		public function setCountry($country)
		{
			  $this->country = $country;
        return $this;
		}

    /**
     * Sets the US State; two-character code; valid only if country was or being set to US.
		 *
		 * @param $state
		 *
		 * @return $this
     */
		public function setState($state)
		{
			  $this->state = $state;
        return $this;
		}

    /**
     * Sets the city.
		 *
		 * @param $city
		 *
		 * @return $this
     */
		public function setCity($city)
		{
			  $this->city = $city;
        return $this;
		}

    /**
     * Sets the walking stride length in centimeters.
		 *
		 * @param $strideLengthWalking
		 *
		 * @return $this
     */
		public function setStrideLengthWalking($strideLengthWalking)
		{
			  $this->strideLengthWalking = $strideLengthWalking;
        return $this;
		}

    /**
     * Sets the running stride length in centimeters.
		 *
		 * @param $strideLengthRunning
		 *
		 * @return $this
     */
		public function setStrideLengthRunning($strideLengthRunning)
		{
			  $this->strideLengthRunning = $strideLengthRunning;
        return $this;
		}

    /**
		 * Sets the default weight unit on website (doesn't affect API)
		 * One of (en_US, en_GB, "any" for METRIC).
		 *
		 * @param $weightUnit
		 *
		 * @return $this
     */
		public function setWeightUnit($weightUnit)
		{
			  $this->weightUnit = $weightUnit;
        return $this;
		}

    /**
		 * Sets the default height/distance unit on website (doesn't affect API)
		 * One of (en_US, "any" for METRIC).
		 *
		 * @param $heightUnit
		 *
		 * @return $this
     */
		public function setHeightUnit($heightUnit)
		{
			  $this->heightUnit = $heightUnit;
        return $this;
		}

    /**
		 * Sets the default water unit on website (doesn't affect API)
		 * One of (en_US, "any" for METRIC).
		 *
		 * @param $waterUnit
		 *
		 * @return $this
     */
		public function setWaterUnit($waterUnit)
		{
			  $this->waterUnit = $waterUnit;
        return $this;
		}

    /**
		 * Sets the default glucose unit on website (doesn't affect API)
		 * One of (en_US, "any" for METRIC).
		 *
		 * @param $glucoseUnit
		 *
		 * @return $this
     */
		public function setGlucoseUnit($glucoseUnit)
		{
			  $this->glucoseUnit = $glucoseUnit;
        return $this;
		}

    /**
     * Sets the timezone in the format "America/Los_Angeles".
		 *
		 * @param $timezone
		 *
		 * @return $this
     */
		public function setTimezone($timeZone)
		{
			  $this->timeZone = $timeZone;
        return $this;
		}

    /**
     * Sets the food database locale; in the format "xx_XX".
		 *
		 * @param $foodsLocale
		 *
		 * @return $this
     */
		public function setFoodsLocale($foodsLocale)
		{
			  $this->foodsLocale = $foodsLocale;
        return $this;
		}

    /**
		 * Sets the ocale of website (country/language);
		 * One of the locales, currently – (en_US, fr_FR, de_DE, es_ES, en_GB, en_AU, en_NZ, ja_JP)
		 *
		 * @param $locale
		 *
		 * @return $this
     */
		public function setLocale($locale)
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
		 * @param $startDayOfWeek
		 *
		 * @return $this
     */
		public function setStartDayOfWeek($startDayOfWeek)
		{
			  $this->startDayOfWeek = $startDayOfWeek;
        return $this;
		}
}
