<?php
require_once 'objects/Authenticate.php';
$auth = new Authenticate();

function isSubmitForSignIn()
{
	if( isset($_POST['submit']) && $_POST['submit'] == 'Sign In')
		return true;
	return false;
}

if( isSubmitForSignIn()) {
	if( $auth->isValidUsernamePassword()) {
		$auth->startSession();
	}
}

header("Location: index.php");
exit;
