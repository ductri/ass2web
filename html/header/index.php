<?php
if(!isset($_SESSION["name"]))
  include("header_guest.php");
else
  include("header_member.php");
?>