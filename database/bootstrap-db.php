<?php 
require_once("/../utils.php");
require_once("TopicDB.php");
require_once("UserDB.php");
require_once("SlideDB.php");
require_once("CommentDB.php");

class DBManager {
	private $conn;
	private $topicDB = null;
	private $userDB = null;
	private $slideDB = null;
	private $commentDB = null;

	function __construct() {
		//Connect db
		$this->conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if ($this->conn->connect_error) {
			die("Connection failed" . $this->conn->connect_error);
		}
		$this->conn->set_charset("utf8");
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
			
			case 'slide':
				if (null === $this->slideDB) {
					$this->slideDB = new SlideDB($this->conn);
				}
				return $this->slideDB;
				break;
			
			case 'comment':
				if (null === $this->commentDB) {
					$this->commentDB = new CommentDB($this->conn);
				}
				return $this->commentDB;
			default:
				# code...
				break;
		}
	}
}


 ?>