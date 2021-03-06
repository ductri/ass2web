<?php 
require_once(dirname(__FILE__)."/../libs/utils.php");
class SlideDB  {
	private $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}

	public function getSlidesInTopic($topicId) {
		$sql = "SELECT * from SLIDE where topicid = $topicId";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$row['url'] = "/slide/download/".$row['slideid'];
				array_push($response, $row) ;
			}
		}
		return $response;
	}

	/**
	 * Description
	 * @param type $slideId 
	 * @return null if none, object if success
	 */
	public function getSlide($slideId) {
		$sql = "SELECT * from SLIDE where slideid = $slideId;";
		$result = $this->conn->query($sql);
		$response = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$row['url'] = "/slide/download/".$row['slideid'];
				array_push($response, $row) ;
			}
			return $response[0];
		} else return null;
	}

	public function uploadSlide($userId, $topicId, $title, $description, $slideURL, $noSlide) {
		$sql = "INSERT INTO SLIDE(userid, topicid, title, description, timeupload, filename, noslide) VALUES('$userId', '$topicId', '$title', '$description', now(), '$slideURL', $noSlide);";
		$result = $this->conn->query($sql);

		if ($result === true) {
			return true;
		} else {
			return false;
		}
	}

	public function searchSlide($keyword) {
		$sql = "SELECT * from SLIDE where title like '%{$keyword}%'";
		$result = $this->conn->query($sql);
		$response = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$row['url'] = "/slide/download/".$row['slideid'];
				array_push($response, $row) ;
			}
		}
		return $response;
	}

	public function deleteSlide($slideId) {
		$sql = "DELETE FROM SLIDE WHERE slideid='$slideId'";
		//echo $sql;
		$result = $this->conn->query($sql);
		if ($result=== true) {
			return "success";
		} else {
			return "failure";
		}
	}

	public function getAllSlide($startIndex, $length) {
		$sql = "SELECT * from SLIDE";
		$result = $this->conn->query($sql);
		$response = [];
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$row['url'] = "/slide/download/".$row['slideid'];
				array_push($response, $row) ;
			}
		}
		return array_slice($response, $startIndex, $length);
	}

	public function increaseNoDownload($slideId) {
		$slideInfo = $this->getSlide($slideId);
		$noDownload = $slideInfo["nodownload"] + 1;
		$sql = "UPDATE SLIDE
		SET nodownload=$noDownload
		WHERE slideid='$slideId'";
		
		$result = $this->conn->query($sql);
		if ($result === true) {
			return "success";
		} else {
			return "fail";
		}
	}

	public function getTopDownload($count) {
		$sql = "SELECT * from SLIDE order by nodownload DESC";
		$result = $this->conn->query($sql);
		$response = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$row['url'] = "/slide/download/".$row['slideid'];
				array_push($response, $row) ;
			}
			return array_slice($response, 0, $count);
		} else return null;
	}
}

 ?>
