<!DOCTYPE html>
<html>
<head>
<title>Catalog</title>
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
include(dirname(__FILE__)."\..\header\index.php");
?>


<!-- Body tri/resources/slide1.png -->
<img class="img-responsive center-block" src="images/banner4.jpg" alt="banner"/>
<div id="root"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.24/browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js"></script>
<script src="/pub/js/quang/catalog_search.js" type="text/babel"></script>
<!-- <script scr="/pub/js/quang/catalog.js"></script> -->

</body>
</html>
