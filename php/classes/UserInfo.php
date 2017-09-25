<?php
session_start();
include 'Conn.php';
class UserInfo
{
	private $email;
	private $conn;

	function __construct($email) {
		$conn = new Conn();
		$dbc = $conn->connect();
		$query = "select t.id from member m, position p, tier t where m.position = p.id and p.level = t.id and m.email = \"$email\"";
//		echo $query;
		if($result = $dbc->query($query)) {
			while($row = $result->fetch_array())  {
				$_SESSION['tierId'] = $row['id'];
			}
		}


	}
}