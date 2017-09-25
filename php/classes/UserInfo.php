<?php
session_start();
require_once('Conn.php');
class UserInfo
{
	private $email;
	private $conn;

	function __construct() {
		$conn = new Conn();
		$this->conn = $conn->connect();
	}

	public function getUserTier() {
		$query = 'select t.id from member m, position p, tier t where m.position = p.id and p.level = t.id and m.email = \'' . $_SESSION['userEmail'] . '\'';
//		echo $query;
		if($result = $this->conn->query($query)) {
			while($row = $result->fetch_array())  {
				$_SESSION['tierId'] = $row['id'];
			}
		}
	}
}