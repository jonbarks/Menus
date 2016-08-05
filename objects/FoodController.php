<?php
require_once 'objects/FoodViewModel.php';
require_once 'objects/FoodFactory.php';

require_once 'Utils.php';

class FoodController
{
	private $foodView;
	private $username;
	
	public function __construct()
	{
		$this->foodView = new FoodViewModel();
	}
	
	private function redirectToIndexIfNotSignedIn()
	{
		$auth = new Authenticate();
		if( !$auth->isSignedIn()){
			header( "Location: /base/Index/index");
			exit;
		}
	}
	
	private function setSignIn()
	{
		$auth = new Authenticate();
		$this->foodView->setVar("isSignedIn", true);// TODO: Enum of signIn status
		$this->foodView->setVar("username", $auth->getUsernameFromSession());
	}
	
	
	private function addFood()
	{
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
			
			$this->setNewFood( $foodname, $calories, $description);
		}
		catch ( PDOException $ex){
			displayExceptionAndExit($ex);
		}
	}
	
	private function setNewFood( $foodname, $calories, $description)
	{
		$this->foodView->setVar( "newFoodAdded", true);
		$this->foodView->setVar( "foodname", $foodname);
		$this->foodView->setVar( "calories", $calories);
		$this->foodView->setVar( "description", $description);
		
	}
	public function add()
	{
		$this->redirectToIndexIfNotSignedIn();
		$this->setSignIn();
				
		if( isset( $_POST['addFood'])) {
			$this->addFood();
		}
		
		$this->foodView->display('FoodEntryView.html');
		
	}

	public function listAll()
	{
		$this->redirectToIndexIfNotSignedIn();
		$this->setSignIn();
		try {
			
			$menuModel = new MenuModel();
			$foodRows = $menuModel->getAllFoods();
			$this->foodView->setVar( "foodRows", $foodRows);
			$this->foodView->display('FoodListView.html');
		}
		catch ( PDOException $ex){
			displayExceptionAndExit($ex);
		}
	}
	
	private function displayExceptionAndExit($ex)
	{
		$this->foodView->setVar( "errorMessage", $ex->getMessage());
		$this->foodView->setVar( "errorCode", $ex->getCode());
		$this->foodView->display('ErrorView.html');
		exit;
	}
	
}