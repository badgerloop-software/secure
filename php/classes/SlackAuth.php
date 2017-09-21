<?php
include 'Secrets.php';

class SlackAuth
{
	public $response = "";
	private $clientId = "";
	private $clientSecret = "";

	function __construct() {
		$secret = new Secrets();

		$this->clientId = $secret->getClientId();
		$this->clientSecret = $secret->getClientSecret();
	}

	public function checkAuthStatus() {
		if($_SESSION['email'] == null && $_GET['code'] == null) {
			// Dirty way to do this...
			echo '<meta http-equiv="refresh" content="0; url=https://slack.com/oauth/authorize?scope=identity.basic,identity.email,identity.team,identity.avatar&client_id=' . $this->clientId . '&redirect_uri=http://localhost:8080">';
		} elseif ($_GET['code'] !== null) {
			$this->code = $_GET['code'];
			$this->getUserInfo();
		}
	}

	private function getUserInfo() {
		$url = "https://slack.com/api/oauth.access?client_id=" . $this->clientId . "&client_secret=" . $this->clientSecret . "&code=" . $this->code;
//		echo $url;
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_URL, $url);

		$result = curl_exec($curl);
		curl_close($curl);
		$this->response = $result;

	}
}