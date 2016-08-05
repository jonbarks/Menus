<?php
require_once 'objects/Authenticate.php';

class AuthController
{
	function __construct()
	{
		
	}
	
	public function signIn()
	{
		include "SignIn.html";
	}
	
	
	private function isSubmitForSignIn()
	{
		
		if( isset($_POST['submit']) && $_POST['submit'] == 'signIn')
			return true;
		return false;
	}
	
	public function verifySignIn()
	{
		$auth = new Authenticate();
		if( $this->isSubmitForSignIn() && $auth->isValidUsernamePassword()) {
			$auth->startSession();
		}
		else {
			$auth->destroySession();
		}
		header( "Location: /base/Index/index");
	}
	
	public function signOut()
	{
		$auth = new Authenticate();
		$auth->destroySession();
		header( "Location: /base/Index/index");
		exit;
	}	
	
}