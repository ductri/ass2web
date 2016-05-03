<?php
$con = mysqli_connect("localhost","root","","examples");
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

if (!isset($_GET['add']) && !isset($_GET['del']) && !isset($_GET['retrieve']) && !isset($_GET['edit']))
	die;

function validate_input($tid,$tname,$tyear) {
	$err="";
	$id = trim($tid);
	$name = trim($tname);
	$year = trim($tyear);
	

	if (!preg_match("/\d+/", $id)) {
		$err = "ID must be number";
		$arr = array("error" => $err, "success"=>false);
		echo json_encode($arr);
		return false;
	}
	elseif (strlen($name) < 5 || strlen($name) >30) {
		$err="Name must be between 5 and 30 letters";
		$arr = array("error" => $err, "success"=>false);
		echo json_encode($arr);
		return false;
	}
	elseif (!preg_match("/\d+/", $year) || $year < 1990 || $year > 2015) {
		$err ="Year must be 4 digits and between 1990 and 2014";
		$arr = array("error" => $err, "success"=>false);
		echo json_encode($arr);
		return false;
	}
	return true;
}

if ( isset($_GET['add']) && $_GET['add']==1) {
	$id = $_GET['id'];
	$name = $_GET['name'];
	$year = $_GET['year'];

	if (validate_input($id, $name, $year)) {
		
		$query = "INSERT INTO cars VALUES('$id','$name','$year')";
		if (!mysqli_query($con,$query)) {
			echo json_encode(array("success" => false, "error"=>"Duplicate ID"));
			die;
		}
		echo '{"success":true}';
		die;
	}
}

if (isset($_GET['del']) && $_GET['del'] != 0) {
	$id= $_GET['id'];
	$query = "DELETE FROM cars where id = '$id'";

	mysqli_query($con,$query);
	$affectedRows = mysqli_affected_rows($con);
	if ($affectedRows == 0 )	
		echo json_encode(array("success" => false, "error" => "No ID found"));
	else	
		echo json_encode(array("success" => true, "notice" => $affectedRows." row(s) affected"));
	die;
}

if (isset($_GET['edit']) && $_GET['edit'] != 0) {
	$id = $_GET['id'];
	$name = $_GET['name'];
	$year = $_GET['year'];


	$query = "UPDATE cars SET name='$name', year='$year' WHERE id='$id'";
	if (validate_input($id,$name,$year)) {

		mysqli_query($con,$query);
		$affectedRows = mysqli_affected_rows($con);
		if ($affectedRows < 1 )	
			echo json_encode(array("success" => false, "error" => "No ID found"));
		else	
			echo json_encode(array("success" => true, "notice" => $affectedRows." row(s) affected"));
		die;
	}
}

if ( isset($_GET['retrieve']) && $_GET['retrieve'] != 0) {

	$query = "SELECT * FROM cars";
	$result = mysqli_query($con,"SELECT * FROM cars");
	$return = array();
	while ($row = mysqli_fetch_assoc($result))
	{
		//echo $row['id']."<br>";
		array_push($return, $row) ;
	}
	echo json_encode($return);
	die;
}