<?php

interface IMenuModel
{

	public function addFood( IFood $food);
	public function getAllFoods();
	public function getFoodById( $id);
}
