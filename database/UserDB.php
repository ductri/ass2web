<?php 
class UserDB {
	private $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}

	function login($username, $password) {
		$encrypted_password = Utils::encrypt($password);
		$sql = "SELECT * from USER where username='$username' AND password='$encrypted_password';";
		$result = $this->conn->query($sql);
		
		$response = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			array_push($response, $row);
			return $response[0];
		} else {
			return null;
		}
	}

	function getInfo($userId) {
		$sql = "SELECT * from USER where userId='$userId'";
		$result = $this->conn->query($sql);
		
		$response = array();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			array_push($response, $row);
			return $response[0];
		} else {
			return null;
		}
	}

	function register($username, $password) {
		
	}
}

 ?>