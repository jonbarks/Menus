<?php
require_once 'objects/MenuModel.php';
require_once 'Utils.php';
$auth = new Authenticate();
if( !$auth->isSignedIn()){
	header( "Location: index.php");
	exit;
}
	
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


