<?php
require_once('classes/SlackAuth.php');
//require_once('classes/Members.php');

//$members = new Members();
$auth = new SlackAuth();

$auth->checkAuthStatus();

echo "Hello from PHP!";

echo $_SESSION['userEmail'];

//$members->getMemberByEmail();

?>

