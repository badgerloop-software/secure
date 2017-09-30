<?php

require_once('API.php');

class UserInfo
{
	private $api;

	function __construct() {
		$this->api = new API();
	}

	public function getUserTier() {

		$response = $this->api->callAPI('https://badgerloop.com/api/php/memberTier.php?email=' . $_SESSION['userEmail']);
		$decode = json_decode($response);
		$_SESSION['tierId'] = $decode[0]->id;
		echo $_SESSION['tierId'];

	}
}
