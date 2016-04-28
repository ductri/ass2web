<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thực tập tốt nghiệp - Nhận dạng cảm xúc</title>
</head>
<body>
	<form method="POST" action="index.php" enctype="multipart/form-data">
		<div>
			<label id="upload">Select file:<input type="file" id="upload" name="upload"></label>
			<input type="submit" value="Submit"></input>

		</div>
	</form>
	<label>Tiêu đề:</label>
	<ol id="titles">

	<?php 
		include("./../utils.php");
		utils::console_log($_FILES['upload']);
		echo "</br>";
		define("DB_HOSTNAME", "localhost");
		define("DB_USERNAME", "root");
		define("DB_PASSWORD", "ductri");
		define("DB_NAME", "tttn_literature");
		$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if ($conn->connect_error) {
			die("Connection fail");
		}
		$response = [];
		$sql = "SELECT * FROM ABSTRACTARTICLE";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($response, $row);
				echo "<li>";
				echo $row["title"];
				echo "</li>";
			}
		}	
	?>
	</ol>

</body>
</html>