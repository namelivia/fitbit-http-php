<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class Language extends BasicEnum
{
    public const EN_US = 'en_US';
    public const FR_FR = 'fr_FR';
    public const DE_DE = 'de_DE';
    public const ES_ES = 'es_ES';
    public const EN_GB = 'en_GB';
    public const EN_AU = 'en_AU';
    public const EN_NZ = 'en_NZ';
    public const JA_JP = 'ja_JP';

    private $language;

    public function __construct(string $language)
    {
        parent::checkValidity($language);
        $this->language = $language;
    }

    public function __toString()
    {
        return $this->language;
    }
}
