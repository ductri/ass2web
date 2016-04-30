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

	function register($username, $firstName, $lastName, $email, $password, $avatarFileName) {
		$sql = "SELECT COUNT(*) as no FROM USER WHERE username='$username'";
		if ($this->conn->query($sql)->fetch_assoc()['no'] > 0) {
			return "username_exist";
		}
		$sql = "SELECT COUNT(*) as no FROM USER WHERE email='$email'";
		if ($this->conn->query($sql)->fetch_assoc()['no'] > 0) {
			return "email_exist";
		}

		$sql = "INSERT INTO USER(username, firstname, lastname, email, password, avatar) VALUES('$username', '$firstName', '$lastName', '$email', $password, '$avatarFileName');";
		
		$result = $this->conn->query($sql);
		if ($result === true) {
			return "success";
		} else {
			return "fail";
		}
	}

	function resetPassword($email) {
		$sql = "SELECT * from USER where email = '$email'";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$newPassword = "123ductri";
			$sql = "UPDATE USER set password=$newPassword WHERE email='$email'";
		} else {
			return "emailnotexist";
		}
	}
}

 ?>