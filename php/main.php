<?php
require_once('classes/SlackAuth.php');
require_once('classes/UserInfo.php');

$auth = new SlackAuth();

$auth->checkAuthStatus();

$user = new UserInfo();

$user->getUserTier();

?>

<h2>Email: <?=$_SESSION['userEmail']?>, Tier Id: <?=$_SESSION['tierId']?></h2>

