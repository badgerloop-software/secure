<?php
require_once('classes/SlackAuth.php');

$auth = new SlackAuth();

$auth->checkAuthStatus();

echo $auth->response;

echo "Hello from PHP!";

?>

