<?php
require_once 'objects/MenuModel.php';

class Authenticate
{
	public function __construct()
	{
		session_start();
	}

	function isSignedIn()
	{
		if( isset($_SESSION['is_signed_in']) && $_SESSION['is_signed_in'] == true)
			return true;
		return false;
	}
	
	public function isValidUsernamePassword()
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$menuModel = new MenuModel();
		$isValid = $menuModel->isValidUsernamePassword($username, $password);
		return $isValid;
	}
	
	public function getUsernameFromSession()
	{
		return $_SESSION['username'];
	}
	
	public function startSession()
	{
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['is_signed_in'] = true;
	}
	
	public function destroySession()
	{
		unset( $_SESSION['is_signed_in']);
		unset( $_SESSION['username']);
		session_destroy();
	}	
	
}