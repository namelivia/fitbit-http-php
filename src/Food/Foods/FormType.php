<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Namelivia\Fitbit\BasicEnum;

class FormType extends BasicEnum
{
    public const LIQUID = 'LIQUID';
    public const DRY = 'DRY';

    private $formType;

    public function __construct(string $formType)
    {
        parent::checkValidity($formType);
        $this->formType = $formType;
    }

    public function __toString()
    {
        return $this->formType;
    }
}
