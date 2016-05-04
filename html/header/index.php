<?php
if(!isset($_SESSION["username"]))
  include("header_guest.php");
else {
	echo "<script>";
   	echo "window.userid = ".$_SESSION['userid'].";";
   	echo "</script>";
  	include("header_user.php");
   }
?>