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
		if ($result->num_rows == 0) {
			$response["result"] = "fail";
			$response["msg"] = "Wrong username or password";
		} else {
			$row = $result->fetch_assoc();
			$response["result"] = $row;
			$response["msg"] = "Login success";
		}
		return $response;
	}
}

 ?>