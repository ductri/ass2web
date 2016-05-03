<?php
if(!isset($_SESSION["username"]))
  include("header_guest.php");
else
  include("header_user.php");

?>