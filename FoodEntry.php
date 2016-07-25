
<?php
require_once 'objects/MenuModel.php';
require_once 'interfaces/IFood.php';
require_once 'objects/FoodFactory.php';
require_once 'Utils.php';

$newFoodAdded = false;
$newFoodError = false;
// Insert a new food 
if( isset( $_POST['addFood'])) {
	addFood($_POST);
}

function addFood($values){
	if( !isset( $_POST['foodname'])) return;
	if( !isset( $_POST['description'])) return;
	if( !isset( $_POST['calories'])) return;
	
	$foodname = sanitizeString( $_POST['foodname']);
	$calories = sanitizeString( $_POST['calories']);
	$description = sanitizeString( $_POST['description']);

	try {
		$menuModel = new MenuModel();
		$food = FoodFactory::create( $foodname, $calories, $description);
		$newFoodAdded = $menuModel->addFood( $food);
	}
	catch ( PDOException $ex)
	{
		handleError($ex);
	}
}

function handleError($ex){
	$newFoodError = true;
	$errorMessage = $ex->getMessage();
	$errorCode= $ex->getCode();
}
include 'FoodEntryView.html';

?>




