<?php


class API
{
	public function callAPI ($url, $method = null, $data = null) {
		$curl = curl_init();

		if ($method === "POST") {
			curl_setopt($curl, CURLOPT_POST, true);
		} else {

		}

		if ($method === "POST" && $data !== null) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($curl);
		curl_close($curl);

		return $response;
	}
}