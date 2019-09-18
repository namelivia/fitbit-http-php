<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

class Food
{
    private $name;
    private $defaultFoodMeasurementUnitId;
    private $defaultServingSize;
    private $calories;
    private $formType;
    private $description;
    private $nutritionalValues;

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
     * Sets the nutritional values information for the
		 * food.
		 *
		 * @param NutritionalValues
     */
    public function setNutritionalValues(NutritionalValues $nutritionalValues)
    {
			$this->nutritionalValues = $nutritionalValues;
			return $this;
		}

    /**
     * Returns the log parameters as an http query to be inserted in an API call.
     */
    public function asUrlParam()
    {
				$nutritionalValues = is_null($this->nutritionalValues) ?
				[]:
				$this->nutritionalValues->toArray();
				return http_build_query(
					array_merge([
            'name' => $this->name,
            'defaultFoodMeasurementUnitId' => $this->defaultFoodMeasurementUnitId,
            'defaultServingSize' => $this->defaultServingSize,
            'calories' => $this->calories,
            'formType' => $this->formType,
            'description' => $this->description,
					], $nutritionalValues)
				);
    }
}
