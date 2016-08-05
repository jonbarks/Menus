<?php
require_once 'objects/Authenticate.php';

class IndexController
{
	function __construct()
	{
		
	}
	
	public function index()
	{
		$auth = new Authenticate();

		$isSignedIn = $auth->isSignedIn();
		$username = $_SESSION['username'];
		
		include "index.html";
	}
	
}