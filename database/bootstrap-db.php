<?php 
require_once("/../utils.php");
require_once("topic.php");

class DBManager {
	private $conn;
	private $topic = null;

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

				if (null === $this->topic) {
					$this->topic = new Topic($this->conn);
				}
				return $this->topic;
				
				break;
			
			default:
				# code...
				break;
		}
	}
}


 ?>