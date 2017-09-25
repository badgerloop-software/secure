<?php

include 'Secrets.php';
class Conn
{
	private $conn;

	function __construct() {
		$secret = new Secrets();
		$this->serverName = $secret->getServername();
		$this->username = $secret->getUsername();
		$this->password = $secret->getPassword();
		$this->database = $secret->getDatabase();
	}

	function connect() {
		$conn = new mysqli($this->serverName, $this->username, $this->password, $this->database);
		$this->conn = $conn;
		return $this->conn;
	}
}