<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Food\Foods;

class NutritionalValues
{
	 private $caloriesFromFat ;
	 private $totalFat ;
	 private $transFat ;
	 private $saturatedFat ;
	 private $cholesterol ;
	 private $sodium ;
	 private $potassium ;
	 private $totalCarbohydrate ;
	 private $dietaryFiber ;
	 private $sugars ;
	 private $protein;
	 private $vitaminA;
	 private $vitaminB6 ;
	 private $vitaminB12 ;
	 private $vitaminC ;
	 private $vitaminD ;
	 private $vitaminE ;
	 private $biotin ;
	 private $folicAcid ;
	 private $niacin ;
	 private $pantothenicAcid ;
	 private $riboflavin ;
	 private $thiamin;
	 private $calcium ;
	 private $copper ;
	 private $iron ;
	 private $magnesium ;
	 private $phosphorus ;
	 private $iodine;
	 private $zinc;


  /**
   * Sets the calories coming from the fat.
	 *
	 * @param int $caloriesFromFat
   */
	 public function setCaloriesFromFat(int $caloriesFromFat)
	 {
		 $this->caloriesFromFat = $caloriesFromFat;
		 return $this;
	 }

  /**
   * Sets the total fat in grams.
	 *
	 * @param int $totalFat
   */
	 public function setTotalFat(int $totalFat)
	 {
		 $this->totalFat = $totalFat;
		 return $this;
	 }

  /**
   * Sets the trans fat in grams.
	 *
	 * @param int $transFat
   */
	 public function setTransFat(int $transFat)
	 {
		 $this->transFat = $transFat;
		 return $this;
	 }
	 
  /**
   * Sets the saturated fat in grams.
	 *
	 * @param int $saturatedFat
   */
	 public function setSaturatedFat(int $saturatedFat)
	 {
		 $this->saturatedFat = $saturatedFat;
		 return $this;
	 }

  /**
   * Sets the cholesterol fat in miligrams.
	 *
	 * @param int $cholesterol
   */
	 public function setCholesterol(int $cholesterol)
	 {
		 $this->cholesterol = $cholesterol;
		 return $this;
	 }

  /**
   * Sets the sodium in miligrams.
	 *
	 * @param int $sodium
   */
	 public function setSodium(int $sodium)
	 {
		 $this->sodium = $sodium;
		 return $this;
	 }

  /**
   * Sets the potassium in miligrams.
	 *
	 * @param int $potassium
   */
	 public function setPotassium(int $potassium)
	 {
		 $this->potassium = $potassium;
		 return $this;
	 }

  /**
   * Sets the total carbohydrate in grams.
	 *
	 * @param int $totalCarbohydrate
   */
	 public function setTotalCarbohydrate(int $totalCarbohydrate)
	 {
		 $this->totalCarbohydrate = $totalCarbohydrate;
		 return $this;
	 }

  /**
   * Sets the dietary fiber in grams.
	 *
	 * @param int $dietaryFiber
   */
	 public function setDietaryFiber(int $zinc)
	 {
		 $this->zinc = $zinc;
		 return $this;
	 }

  /**
   * Sets the sugars in grams.
	 *
	 * @param int $sugars
   */
	 public function setSugars(int $sugars)
	 {
		 $this->sugars = $sugars;
		 return $this;
	 }

  /**
   * Sets the protein in grams.
	 *
	 * @param int $protein
   */
	 public function setProtein(int $protein)
	 {
		 $this->protein = $protein;
		 return $this;
	 }

  /**
   * Sets the vitamin A in international units.
	 *
	 * @param int $vitaminA
   */
	 public function setVitaminA(int $vitaminA)
	 {
		 $this->vitaminA = $vitaminA;
		 return $this;
	 }

  /**
   * Sets the vitamin B6 in international units.
	 *
	 * @param int $vitaminB6
   */
	 public function setVitaminB6(int $vitaminB6)
	 {
		 $this->vitaminB6 = $vitaminB6;
		 return $this;
	 }

  /**
   * Sets the vitamin B12 in international units.
	 *
	 * @param int $vitaminB12
   */
	 public function setVitaminB12(int $vitaminB12)
	 {
		 $this->vitaminB12 = $vitaminB12;
		 return $this;
	 }

  /**
   * Sets the vitamin C in international units.
	 *
	 * @param int $vitaminC
   */
	 public function setVitaminC(int $vitaminC)
	 {
		 $this->vitaminC = $vitaminC;
		 return $this;
	 }

  /**
   * Sets the vitamin D in international units.
	 *
	 * @param int $vitaminD
   */
	 public function setVitaminD(int $vitaminD)
	 {
		 $this->vitaminD = $vitaminD;
		 return $this;
	 }
	 
  /**
   * Sets the vitamin E in international units.
	 *
	 * @param int $vitaminE
   */
	 public function setVitaminE(int $vitaminE)
	 {
		 $this->vitaminE = $vitaminE;
		 return $this;
	 }
	 
  /**
   * Sets the biotin in miligrams.
	 *
	 * @param int $biotin
   */
	 public function setBiotin(int $biotin)
	 {
		 $this->biotin = $biotin;
		 return $this;
	 }

  /**
   * Sets the folic acid in miligrams.
	 *
	 * @param int $folicAcid
   */
	 public function setFolicAcid(int $folicAcid)
	 {
		 $this->folicAcid = $folicAcid;
		 return $this;
	 }

  /**
   * Sets the niacin in miligrams.
	 *
	 * @param int $niacin
   */
	 public function setNiacin(int $niacin)
	 {
		 $this->niacin = $niacin;
		 return $this;
	 }

  /**
   * Sets the pantothenicAcid in miligrams.
	 *
	 * @param int $pantothenicAcid
   */
	 public function setPantothenicAcid(int $pantothenicAcid)
	 {
		 $this->pantothenicAcid = $pantothenicAcid;
		 return $this;
	 }

  /**
   * Sets the riboflavin in miligrams.
	 *
	 * @param int $riboflavin
   */
	 public function setRiboflavin(int $riboflavin)
	 {
		 $this->riboflavin = $riboflavin;
		 return $this;
	 }

  /**
   * Sets the thiamin in miligrams.
	 *
	 * @param int $thiamin
   */
	 public function setThiamin(int $thiamin)
	 {
		 $this->thiamin = $thiamin;
		 return $this;
	 }

  /**
   * Sets the calcium in grams.
	 *
	 * @param int $calcium
   */
	 public function setCalcium(int $calcium)
	 {
		 $this->calcium = $calcium;
		 return $this;
	 }

  /**
   * Sets the copper in grams.
	 *
	 * @param int $copper
   */
	 public function setCopper(int $copper)
	 {
		 $this->copper = $copper;
		 return $this;
	 }

  /**
   * Sets the iron in miligrams.
	 *
	 * @param int $iron
   */
	 public function setIron(int $iron)
	 {
		 $this->iron = $iron;
		 return $this;
	 }

  /**
   * Sets the magnesium in miligrams.
	 *
	 * @param int $magnesium
   */
	 public function setMagnesium(int $magnesium)
	 {
		 $this->magnesium = $magnesium;
		 return $this;
	 }

  /**
   * Sets the phosphorus in grams.
	 *
	 * @param int $phosphorus
   */
	 public function setPhosphorus(int $phosphorus)
	 {
		 $this->phosphorus = $phosphorus;
		 return $this;
	 }

  /**
   * Sets the iodine in micrograms.
	 *
	 * @param int $iodine
   */
	 public function setIodine(int $iodine)
	 {
		 $this->iodine = $iodine;
		 return $this;
	 }

  /**
   * Sets the zinc in miligrams.
	 *
	 * @param int $zinc
   */
	 public function setZinc(int $zinc)
	 {
		 $this->zinc = $zinc;
		 return $this;
	 }

	 /**
		* Returns the nutritional values as an array.
		*/
	 public function toArray()
	 {
		 return [
			 'caloriesFromFat' => $this->caloriesFromFat,
			 'totalFat' => $this->totalFat,
			 'transFat' => $this->transFat,
			 'saturatedFat' => $this->saturatedFat,
			 'cholesterol' => $this->cholesterol,
			 'sodium' => $this->sodium,
			 'potassium' => $this->potassium,
			 'totalCarbohydrate' => $this->totalCarbohydrate,
			 'dietaryFiber' => $this->dietaryFiber,
			 'sugars' => $this->sugars,
			 'protein' => $this->protein,
			 'vitaminA' => $this->vitaminA,
			 'vitaminB6' => $this->vitaminB6,
			 'vitaminB12' => $this->vitaminB12,
			 'vitaminC' => $this->vitaminC,
			 'vitaminD' => $this->vitaminD,
			 'vitaminE' => $this->vitaminE,
			 'biotin' => $this->biotin,
			 'folicAcid' => $this->folicAcid,
			 'niacin' => $this->niacin,
			 'pantothenicAcid' => $this->pantothenicAcid,
			 'riboflavin' => $this->riboflavin,
			 'thiamin' => $this->thiamin,
			 'calcium' => $this->calcium,
			 'copper' => $this->copper,
			 'iron' => $this->iron,
			 'magnesium' => $this->magnesium,
			 'phosphorus' => $this->phosphorus,
			 'iodine' => $this->iodine,
			 'zinc' => $this->zinc,
		 ];
	 }
}
