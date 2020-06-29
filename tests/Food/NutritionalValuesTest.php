<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Namelivia\Fitbit\Food\Foods\NutritionalValues;

class NutritionalValuesTest extends TestCase
{
    private $nutritionalValues;

    public function setUp():void
    {
        parent::setUp();
        $this->nutritionalValues = new NutritionalValues();
    }

    public function testSettingAllValuesAndTransformingToArray()
    {
        $nutritionalValues = new NutritionalValues();
        $nutritionalValues->setCaloriesFromFat(1)
                ->setTotalFat(2)
                ->setTransFat(3)
                ->setSaturatedFat(4)
                ->setCholesterol(5)
                ->setSodium(6)
                ->setPotassium(7)
                ->setTotalCarbohydrate(8)
                ->setDietaryFiber(9)
                ->setSugars(10)
                ->setProtein(11)
                ->setVitaminA(12)
                ->setVitaminB6(13)
                ->setVitaminB12(14)
                ->setVitaminC(15)
                ->setVitaminD(16)
                ->setVitaminE(17)
                ->setBiotin(18)
                ->setFolicAcid(19)
                ->setNiacin(20)
                ->setPantothenicAcid(21)
                ->setRiboflavin(22)
                ->setThiamin(23)
                ->setCalcium(24)
                ->setCopper(25)
                ->setIron(26)
                ->setMagnesium(27)
                ->setPhosphorus(28)
                ->setIodine(29)
                ->setZinc(30);
        $this->assertEquals(
                [
                    'caloriesFromFat' => 1,
                    'totalFat' => 2,
                    'transFat' => 3,
                    'saturatedFat' => 4,
                    'cholesterol' => 5,
                    'sodium' => 6,
                    'potassium' => 7,
                    'totalCarbohydrate' => 8,
                    'dietaryFiber' => 9,
                    'sugars' => 10,
                    'protein' => 11,
                    'vitaminA' => 12,
                    'vitaminB6' => 13,
                    'vitaminB12' => 14,
                    'vitaminC' => 15,
                    'vitaminD' => 16,
                    'vitaminE' => 17,
                    'biotin' => 18,
                    'folicAcid' => 19,
                    'niacin' => 20,
                    'pantothenicAcid' => 21,
                    'riboflavin' => 22,
                    'thiamin' => 23,
                    'calcium' => 24,
                    'copper' => 25,
                    'iron' => 26,
                    'magnesium' => 27,
                    'phosphorus' => 28,
                    'iodine' => 29,
                    'zinc' => 30,
                ],
            $nutritionalValues->toArray()
        );
    }
}
