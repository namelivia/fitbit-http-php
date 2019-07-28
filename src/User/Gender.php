<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\User;

use Namelivia\Fitbit\BasicEnum;

class Gender extends BasicEnum
{
    public const MALE = 'MALE';
    public const FEMALE = 'FEMALE';
    public const OTHER = 'NA';

    private $gender;

    public function __construct(string $gender)
    {
        parent::checkValidity($gender);
        $this->gender = $gender;
    }

    public function __toString()
    {
        return $this->gender;
    }
}
