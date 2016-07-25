<?php

interface IFood
{
	public function getFoodId();
	public function getName();
	public function getCalories();
	public function getDescription();

	public function setFoodId( $foodId);
	public function setName( $name);
	public function setCalories( $calories);
	public function setDescription( $description);

}
