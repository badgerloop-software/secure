<?php

require_once('Secrets.php');

class SlackAuth {

	public static $response = "";

	const URL_STR = '<meta http-equiv="refresh" content="0; url=https://slack.com/oauth/authorize?scope=identity.basic,identity.email,identity.team,identity.avatar&client_id=' . Secrets::ID . '%s">';

	public static function checkStatus() {
		if (!$_SESSION['loggedIn'] && is_null($_GET['code']))
			SlackAuth::redirect();
		elseif ($_GET['code'])
			SlackAuth::getUserInfo();
	}

	private static function redirect() {
		if(Secrets::LOCAL)
			echo sprintf(SlackAuth::URL_STR,
						"&redirect_uri=http://localhost:8080");
		else
			echo sprintf(SlackAuth::URL_STR, "");
	}

	private static function getUserInfo() {

		if(Secrets::LOCAL)
			$url = "https://slack.com/api/oauth.access?client_id=" . Secrets::ID . "&client_secret=" . Secrets::SECRET . "&code=" . $_GET['code'] . '&redirect_uri=http://localhost:8080';
		else
			$url = "https://slack.com/api/oauth.access?client_id=" . Secrets::ID . "&client_secret=" . Secrets::SECRET . "&code=" . $_GET['code'];

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		SlackAuth::$response = $result;
		SlackAuth::saveSession();
	}

	private static function saveSession() {
		$json = json_decode(SlackAuth::$response, false);
		$userName = $json->user->name;
		$userEmail = $json->user->email;
		$_SESSION['loggedIn'] = true;

		if(!is_null($userName) && !is_null($userEmail)) {
			$_SESSION['userName'] = $userName;
			$_SESSION['userEmail'] = $userEmail;
		}
	}
}

