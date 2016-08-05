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
		$sqlquery = "SELECT name, calories, description FROM food";
		
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
	
	public function getUserIdFromUsername( $username)
	{
		
	}
	
	public function getUserFromUserId( $userId)
	{
		
	}

	public function getUserFromUsername( $username)
	{
	
	}
	
	public function isValidUsernamePassword( $username, $password)
	{
		$connection = DatabaseConnection::getInstance()->getConnection();
		
		$sql = $connection->prepare("SELECT user_id, username, password FROM user
        WHERE username = ? AND
        password = ?
        LIMIT 1");

		$sql->bindValue(1, $username);
		$sql->bindValue(2, $password);
		
		// TODO: use hash to one-way encrypt given password and compare to passwords that are stored encrypted
		// TODO: Don't forget the salt
// 		$hashed_password = hash('sha256', $password);
// 		$sql->bindValue(2, $pas);
		
		$sql->execute();
		if($sql->rowCount() == 1)
			return true;
		return false;
	}
}

