<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="/pub/css/quang/style.css"/>
</head>

<?php
if(!isset($_SESSION))
{
    session_start();
}
//include(dirname(__FILE__)."\..\header\index.php");
if(!isset($_SESSION["username"])){
  header("location:/");
  exit();
} else {
  echo "<script>";
    //echo $_SERVER['REQUEST_URI'];
    echo "window.userid = ".$_SESSION['userid'].";";
    echo 'window.typeUser = "'.$_SESSION['type'].'";';
    echo "</script>";
    if($_SESSION['type'] == 'admin'){
      include(dirname(__FILE__)."\..\header\header_pageAdmin.php");
    } else{
      header("location:/");
      exit();
    }
}
?>


<!-- Body tri/resources/slide1.png -->
<div id="root"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.24/browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js"></script>


<script src="/pub/js/quang/admin_user.js" type="text/babel"></script>
<!-- <script scr="/pub/js/quang/catalog.js"></script> -->

</body>
</html>
