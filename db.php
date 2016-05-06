<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass ='';
	$db = "examples";
	$cn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if($cn)
	{
		mysqli_select_db($cn,"examples");
	}
?>