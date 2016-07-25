<?php

require_once 'interfaces/IFood.php';

class Food implements IFood
{
	public $food_id;
	public $name;
	public $calories;
	public $description;

	public function getFoodId() { return $this->food_id; }
	public function getName() { return $this->name; }
	public function getCalories() { return $this->calories; }
	public function getDescription() { return $this->description; }
	
	public function setFoodId( $foodId) { $this->food_id = $foodId; }
	public function setName( $name) { $this->name = $name; }
	public function setCalories( $calories) { $this->calories = $calories; }
	public function setDescription( $description) { $this->description = $description; }
	
	public static function create( $name, $calories, $description)
	{
		$food = new Food();
		$food->name = $name;
		$food->calories = $calories;
		$food->description = $description;
		return $food;
	}
	
}

