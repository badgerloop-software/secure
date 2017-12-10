<?php

session_start();

require_once('classes/SlackAuth.php');
require_once('classes/UserInfo.php');

SlackAuth::checkStatus();

# Don't do anything with our custom data for now
#$user = new UserInfo();
#$user->getUserTier();

?>

<h1>Hello <?=$_SESSION['userName']?>!</h1>

<h2>Email: <?=$_SESSION['userEmail']?></h2>

<p><?=$_SESSION['userAvatar']?></p>
