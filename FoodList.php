<?php
require_once 'objects/MenuModel.php';
require_once 'Utils.php';

$foodListError = false;

// Display all foods
	try {
		$menuModel = new MenuModel();
		$foodRows = $menuModel->getAllFoods();
					
	}
	catch ( PDOException $ex)
	{
		$foodListError = true;
		$errorMessage = $ex->getMessage();
		$errorCode= $ex->getCode();
	}
	
include 'FoodListView.html';

// phpinfo(1);
?>
