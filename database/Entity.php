<?php 
class Topic {
	public id;
	public name;

	function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}
}

class User {
	public username;
	public encrypted_password;
	public email;
	public userright;
	public lastname;
	public firstname;
	function __construct($username, $encrypted_password, $email, $userright, $lastname, $firstname) {
		$this->username = $username;
		$this->encrypted_password = $encrypted_password;
		$this->email = $email;
		$this->userright = $userright;
		$this->lastname = $lastname;
		$this->firstname = $firstname;
	}
}

 ?>
