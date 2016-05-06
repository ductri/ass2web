<?php
if(!isset($_SESSION["username"]))
  include("header_guest.php");
else {
	echo "<script>";
    //echo $_SERVER['REQUEST_URI'];
   	echo "window.userid = ".$_SESSION['userid'].";";
    echo 'window.typeUser = "'.$_SESSION['type'].'";';
   	echo "</script>";
    if($_SESSION['type'] == 'admin'){
      include("header_admin.php");
    } else
      include("header_user.php");
}
?>