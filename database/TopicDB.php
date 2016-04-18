<?php 
require_once('/../utils.php');
class TopicDB  {
	private $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}

	public function getTopics() {
		$sql = "SELECT * from TOPIC";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($response, $row) ;
			}
		}
		return json_encode($response);
	}

	public function addTopic($name) {
		$sql = "INSERT INTO TOPIC(topicid, name) VALUES(NULL, '$name')";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result===true) {
			$response["result"] = "success";
			$response["msg"] = "Add topic $name success";
		} else {
			$response["result"] = "fail";
			$response["msg"] = "Add topic $name fail";
		}
		return json_encode($response);
	}

	public function editTopic($topicid, $name) {
		$sql = "UPDATE TOPIC SET name='$name' WHERE topicid=$topicid";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result===true) {
			$response["result"] = "success";
			$response["msg"] = "Edit topic $topicid success";
		} else {
			$response["result"] = "fail";
			$response["msg"] = "Edit topic $topicid fail";
		}
		return json_encode($response);
	}

	public function deleteTopic($topicid) {
		$sql = "DELETE FROM TOPIC WHERE topicid=$topicid";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result===true) {
			$response["result"] = "success";
			$response["msg"] = "Delete topic $topicid success";
		} else {
			$response["result"] = "fail";
			$response["msg"] = "Delete topic $topicid fail";
		}
		return json_encode($response);
	}
}

 ?>
