<?php 
class CommentDB {
	private $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}

	public function getListComment($slideId, $startIndex, $length) {
		$sql = "SELECT * from COMMENT where slideid = $slideId";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($response, $row) ;
			}
		}
		return array_splice($response, $startIndex, $length);
	}

	public function add($slideid, $userid, $content) {
		$sql = "INSERT INTO COMMENT(slideid, userid, content, time) VALUES($slideid, $userid, '$content', now());";
		$result = $this->conn->query($sql);

		if ($result === true) {
			return true;
		} else {
			return false;
		}
	}
}

 ?>