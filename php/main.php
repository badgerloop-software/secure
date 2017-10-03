<?php

session_start();

require_once('classes/SlackAuth.php');
require_once('classes/UserInfo.php');

SlackAuth::checkStatus();

$user = new UserInfo();

$user->getUserTier();

?>

<h2>Email: <?=$_SESSION['userEmail']?>, Tier Id: <?=$_SESSION['tierId']?></h2>
<p>Test commit.</p>

