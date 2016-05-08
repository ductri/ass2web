<!DOCTYPE html>
<html lang="en">
<head>
  <title>Templates Share</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!--<script src="/pub/js/quang/index.js"></script> -->
  <link rel="stylesheet" type="text/css" href="/pub/css/tuan/style.css">
  <style type="text/css"></style>
</head>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include(dirname(__FILE__)."\..\header\index.php");

?>



<div class="container " id="container">
  <div class="jumbotron" id="bottom">
  	<div id ="text">
  		<h1 style="font-size: 2.5em;">Share Made Simple</h1>
	    <h2 style="font-size: 1.5em;">Build your own presentations today!</h2>
	    <p class="text-justify" style="font-size: 1.2em;"><small>TSSE is an content management software powering dozens of presentation. </small></p>
	    <p class="text-justify" style="font-size: 1.2em;"><small>It's secure, fast, stable and supported by an active diverse support and community</small>.</p>
  	</div>

  </div>
  <div class="row" id="bottomRow">
  	<div class="col-sm-12" style="border-color: black; border-bottom: 1px; border-bottom-style: solid;">
  	<h1 style="text-align: center;"> There are more than 1000 templates here</h1>

  	</div>
     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide1.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide2.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide3.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
        <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide4.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide5.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide6.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide7.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide8.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide9.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide10.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide11.png" alt="item"/>
     </div>

     <div class="col-md-2 text-center top-10">
      <img class="img-responsive center-block item-picture" src="/pub/img/tuan/slide12.png" alt="item"/>
     </div>



  </div>


</div>

<footer class="container-fluid text-center" id="footer">
 <div class="footerContent">
				<div class="menu mid">
					<ul>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Support Desk" >Support Desk</a></li>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Tutorials">Tutorials</a></li>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Report a Site">Report a Site</a></li>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Report a Bug" >Report a Bug</a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="menu mid">
					<ul>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Support Desk">Facebook</a></li>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Tutorials">Twitter</a></li>
						<li><a href="https://www.facebook.com/sirtuan.nguyen" title="Tutorials">Youtube</a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="copyright mid">
					<div>© 2016 Templateshares. &nbsp;&nbsp;&nbsp; </div>
				</div>
			</div>
</footer>

<script type="text/javascript">
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

/*$(document).ready(function(){
  console.log(userid);
});*/

</script>

</body>
</html>
