<?php
require_once 'objects/Authenticate.php';

function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}

function echoRibbon( $auth)
{
	
	if( !$auth->isSignedIn()){
?>
		<div> Hello,
		<a href="SignIn.php" >Sign In</a>
		<?php
		return;
	} 
	
	$username = $_SESSION['username'];
?>
	<div> Hello, 
	<?php echo $username; ?>
	<a href="SignOut.php" >Sign Out</a>
	<a href="index.php" >Main Menu</a>
	<a href="FoodEntry.php" >Add New Food</a>
	<a href="FoodList.php" >List All Foods</a>
	</div>
<?php
}


