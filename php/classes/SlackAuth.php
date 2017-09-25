<?php
require_once('Secrets.php');

class SlackAuth
{
	public $response = "";
	private $clientId = "";
	private $clientSecret = "";

	function __construct() {
		session_start();
		$secret = new Secrets();

		$this->clientId = $secret->clientId;
		$this->clientSecret = $secret->clientSecret;
	}

	public function checkAuthStatus() {
		if (!$_SESSION['loggedIn'] && is_null($_GET['code'])) {
			$this->redirect();
		} elseif ($_GET['code']) {
			$this->getUserInfo();
		}
	}

	private function redirect() {
//		echo "https://slack.com/oauth/authorize?scope=identity.basic,identity.email,identity.team,identity.avatar&client_id=$this->clientId&redirect_uri=http://localhost:8080";
//		echo '<meta http-equiv="refresh" content="0; url=https://slack.com/oauth/authorize?scope=identity.basic,identity.email,identity.team,identity.avatar&client_id=' . $this->clientId . '&redirect_uri=http://localhost:8080';
	}

	private function getUserInfo() {
		$url = "https://slack.com/api/oauth.access?client_id=" . $this->clientId . "&client_secret=" . $this->clientSecret . "&code=" . $_GET['code'] . '&redirect_uri=http://localhost:8080';
//		echo $url;
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		$this->response = $result;
		$this->saveSession();
	}

	private function saveSession() {
		$json = json_decode($this->response, false);
		$userName = $json->user->name;
		$userEmail = $json->user->email;
		$_SESSION['loggedIn'] = true;

		if(!is_null($userName) && !is_null($userEmail)) {
			$_SESSION['userName'] = $userName;
			$_SESSION['userEmail'] = $userEmail;
		}
	}
}