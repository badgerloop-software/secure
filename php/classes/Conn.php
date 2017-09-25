<?php

require_once('Secrets.php');
class Conn
{
	private $conn;

	function __construct() {
		$secret = new Secrets();
		$this->serverName = $secret->serverName;
		$this->username = $secret->username;
		$this->password = $secret->password;
		$this->database = $secret->database;
	}

	function connect() {
		$conn = new mysqli($this->serverName, $this->username, $this->password, $this->database);
		$this->conn = $conn;
		return $this->conn;
	}
}