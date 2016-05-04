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

class Slide {
	public slideId;
	public userId;
	public URL;
	public topicId;
	public title;
	public description;
	public timeUpload;

	function __construct($slideId, $userId, $URL, $topicId, $title, $description, $timeUpload) {
		$this->slideId = $slideId;
		$this->userId = $userId;
		$this->URL = $URL;
		$this->topicId = $topicId;
		$this->title = $title;
		$this->description = $description;
		$this->timeUpload = $timeUpload;
	}

	
}

 ?>
