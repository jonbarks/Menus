<?php

require_once 'objects/Food.php';
		
class FoodFactory
{
	public static function create( $name, $calories, $description)
	{
		$food = new Food();
		$food->name = $name;
		$food->calories = $calories;
		$food->description = $description;
		return $food;
	}
}

