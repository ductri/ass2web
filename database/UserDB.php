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

		$sql = "INSERT INTO USER(username, firstname, lastname, email, password, avatar) VALUES('$username', '$firstName', '$lastName', '$email', '$password', '$avatarFileName');";
		
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

			$newPassword = utils::encrypt(rand());
			$hNewPassword = utils::encrypt($newPassword);

			#Send new password to user's email
			if ($this->sendEmail($email, $row['firstname'], $row['lastname'], 
				$row['username'], $newPassword) === true) {
				$sql = "UPDATE USER set password='$hNewPassword' WHERE email='$email'";
				$result = $this->conn->query($sql);
				if ($result === true) {
					return "success";
				} else {
					return "fail";
				}
			} else {
				return "cannot_send_email";
			}
		} else {
			return "email_not_exist";
		}
	}

	function updateInfo($userId, $firstName, $lastName) {

		$sql = "UPDATE USER
		SET firstname='$firstName', lastname='$lastName'
		WHERE userid='$userId'";
		
		$result = $this->conn->query($sql);
		if ($result === true) {
			return "success";
		} else {
			return "fail";
		}
	}

	function changeAvatar($userId, $avatarFileName) {
		$sql = "UPDATE USER
		SET avatar='$avatarFileName'
		WHERE userid='$userId'";
		
		$result = $this->conn->query($sql);
		if ($result === true) {
			return "success";
		} else {
			return "fail";
		}
	}

	function changePass($userId, $oldPass, $newPass1, $newPass2) {
		if ($newPass1 !== $newPass2) {
			return "two_pass_not_same";
		} else {
			$userInfo = $this->getInfo($userId);
			if (Utils::encrypt($oldPass) !== $userInfo["password"]) {
				return "wrong_pass";
			} else {
				$sql = "UPDATE USER
					SET password='$newPass1'
					WHERE userid='$userId'";
				$result = $this->conn->query($sql);
				if ($result === true) {
					return "success";
				} else {
					return "fail";
				}
			}
		}
	}

	function getList($startIndex, $length) {
		$sql = "SELECT * from USER";
		$result = $this->conn->query($sql);
		
		$response = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($response, $row);
			}
			return array_splice($response, $startIndex, $length);
		} else {
			return null;
		}
	}

	function deleteUser($userId) {
		$userInfo = $this->getInfo($userId);
		if ($userId === null) {
			return "not_exist";
		} else {
			$sql = "DELETE FROM USER WHERE userid='$userId'";
			echo $sql;
			$result = $this->conn->query($sql);
			$response = [];
			if ($result===true) {
				$response["result"] = "success";
				$response["msg"] = "Delete user successfully";
			} else {
				$response["result"] = "fail";
				$response["msg"] = "Delete user failure";
			}
			return $response;
		}
	}

	function getListSlide($userId) {
		$sql = "SELECT * from SLIDE where userid='$userId'";
		$result = $this->conn->query($sql);
		
		$response = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($response, $row);
			}
		}
		return $response;
	}

	private function sendEmail($email, $firstName, $lastName, $userName, $newPassword) {
		//require './../PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = SERVER_EMAIL;                 // SMTP username
		$mail->Password = SERVER_EMAIL_PASSWORD;                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('ductri@tshare.com', 'no-reply.ass2web-tshare');
		$mail->addAddress($email, $firstName.$lastName);     // Add a recipient
		$mail->isHTML(true);         	// Set email format to HTML
		$mail->Subject = '[T-Share] Your new password';
		$mail->Body    = "Hi $lastName,<br>
		You are so stupid when forgot your password. Fortunately, I am a very generous person. I'll give you the last chance to access my website. Please take it <strong>carefully</strong>. <br>
		Your username: $userName<br>
		Your new password: $newPassword<br>
		It's not necessory to say thank to me. Bye, <br>
		T-Share<br>

		";

		$mail->AltBody = "New password: $newPassword";

		if(!$mail->send()) {
		    //echo 'Message could not be sent.';
		    //echo 'Mailer Error: ' . $mail->ErrorInfo;
		    return false;
		} else {
		    //echo 'Message has been sent';
		    return true;
		}
	}
}

 ?>