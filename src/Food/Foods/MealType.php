<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Namelivia\Fitbit\BasicEnum;

class MealType extends BasicEnum
{
    public const BREAKFAST = '1';
    public const MORNING_SNACK = '2';
    public const LUNCH = '3';
    public const AFTERNOON_SNACK = '4';
    public const DINNER = '5';
    public const ANYTIME = '7';

    private $mealType;

    public function __construct(string $mealType)
    {
        parent::checkValidity($mealType);
        $this->mealType = $mealType;
    }

    public function __toString()
    {
        return $this->mealType;
    }
}
