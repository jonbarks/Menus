<?php 

require_once 'interfaces/IDatabaseConnection.php';
require_once 'objects/DatabaseConnection.php';
require_once 'interfaces/IFood.php';
require_once 'objects/Food.php';
require_once 'interfaces/IMenuModel.php';

class MenuModel implements IMenuModel
{
	
	public function addFood( IFood $food)
	{
		$connection = DatabaseConnection::getInstance()->getConnection();
		
		// 	INSERT INTO food (name, calories, description) VALUES ('Cheerios', 60, 'Cheerios')
		$stmt = $connection->prepare("INSERT INTO food (name, calories, description) VALUES (:name, :calories, :description)");
		$stmt->bindParam(':name', $food->getName());
		$stmt->bindParam(':calories', $food->getCalories());
		$stmt->bindParam(':description', $food->getDescription());
		$newFoodAdded = $stmt->execute();
		return $newFoodAdded;
	}
	
	public function getAllFoods()
	{
		$connection = DatabaseConnection::getInstance()->getConnection();
// 		$sqlquery = "SELECT name, calories FROM food";
		$sqlquery = "SELECT * FROM food";
		
		$statement = $connection->prepare( $sqlquery);
		$statement->execute(); 
		$foods= $statement->fetchAll( PDO::FETCH_CLASS, 'Food');
// create array of foods by calling FoodFactory?
		return $foods;
	} 
	
	public function getFoodById( $id)
	{
		// Not Yet Tested
		$connection = DatabaseConnection::getInstance()->getConnection();
		$stmt = $connection->prepare("SELECT * FROM food WHERE food_id = :food_id");
		$stmt->bindParam(':food_id', $id);
		
		$stmt->execute();
		$food= $stmt->fetch( PDO::FETCH_CLASS, 'Food');
		return $food;
	}
	
}
?>