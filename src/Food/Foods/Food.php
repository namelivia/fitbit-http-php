<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

use Carbon\Carbon;

class Food
{
    private $name;
    private $defaultFoodMeasurementUnitId;
    private $defaultServingSize;
    private $calories;
    private $formType;
    private $description;

    public function __construct(
        string $name,
        string $defaultFoodMeasurementUnitId,
        string $defaultServingSize,
        int $calories,
        FormType $formType = null,
        string $description = null
    ) {
        $this->name = $name;
        $this->defaultFoodMeasurementUnitId = $defaultFoodMeasurementUnitId;
        $this->defaultServingSize = $defaultServingSize;
        $this->calories = $calories;
        $this->formType = $formType;
        $this->description = $description;
    }

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
        return http_build_query([
            'name' => $this->name,
            'defaultFoodMeasurementUnitId' => $this->defaultFoodMeasurementUnitId,
            'defaultServingSize' => $this->defaultServingSize,
            'calories' => $this->calories,
            'formType' => $this->formType,
            'description' => $this->description,
        ]);
    }
}
