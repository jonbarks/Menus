<?php
require_once 'objects/Authenticate.php';

$auth = new Authenticate();
$auth->destroySession();

header( "Location: index.php");
exit;

