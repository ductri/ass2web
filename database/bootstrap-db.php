<?php 
require_once("/../utils.php");
require_once("TopicDB.php");
require_once("UserDB.php");

class DBManager {
	private $conn;
	private $topicDB = null;
	private $userDB = null;

	function __construct() {
		//Connect db
		$this->conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if ($this->conn->connect_error) {
			die("Connection failed" . $this->conn->connect_error);
		}
	}

	function getTable($table_name) {
		switch ($table_name) {
			case 'topic':
				if (null === $this->topicDB) {
					$this->topicDB = new TopicDB($this->conn);
				}
				return $this->topicDB;
				break;

			case 'user':
				if (null === $this->userDB) {
					$this->userDB = new UserDB($this->conn);
				}
				return $this->userDB;
				break;
			
			default:
				# code...
				break;
		}
	}
}


 ?>