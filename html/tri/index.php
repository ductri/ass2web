<!DOCTYPE html>
<html>
<head>
	<title>Assignmet1</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/pub/css/tri/style.css"/>
	<script src="/pub/js/quang/index.js"></script>
</head>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include(dirname(__FILE__)."\..\header\index.php");

?>


<div class='container'>
		<div class='row'>
			<div class='col-md-1 col-lg-1'>
			</div>

			<div class='col-ex-12 col-sm-12 col-md-7 col-lg-7'>
				<div class='media-middle' id='slides'>
					<div id='slide-wrap'>
						<img class="img-responsive image-slide" src="/slide/1/1" alt="Slide1">
						<img class="img-responsive image-slide" src="/slide/1/2" alt="Slide2">
						<img class="img-responsive image-slide" src="/slide/1/3" alt="Slide3">
						<img class="img-responsive image-slide" src="/slide/1/4" alt="Slide4">
						<img class="img-responsive image-slide" src="/slide/1/5" alt="Slide5">
						<img class="img-responsive image-slide" src="/slide/1/6" alt="Slide6">
						<img class="img-responsive image-slide" src="/slide/1/7" alt="Slide7">
						<img class="img-responsive image-slide" src="/slide/1/8" alt="Slide8">
						<img class="img-responsive image-slide" src="/slide/1/9" alt="Slide9">
						
						<div class="progress">
							<div id="progressbar" class="progress-bar active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
						</div>
						<nav>
							<div class="pager pager_custom">
								<button class="btn" onclick="showPrevious()" title="Previous">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true" ></span>
								</button>
								
								<div id="slideNumber" class="btn">3/18</div>
								
								<button class="btn" onclick="showNext()" title="Next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" ></span>
								</button>
							</div>
						</nav>
					</div>
					<h3 id='slide-title'> How to boost inbound marketing success with content marketing, SEO and social media marketing</h3>
					<div class="pull-right">
						<div id='like-share' class="btn-group" role="group" aria-label="...">
							<button type="button" class="btn btn-default">
								<img src="/pub/img/Thumb-Up-48.png" title="Like" width="24" alt="Like">
							</button>
							<button type="button" class="btn btn-default">
								<img src="/pub/img/Share-48.png" title="Share" width="24" alt="Share">
							</button>
							<button type="button" class="btn btn-default">
								<img src="/pub/img/Download-48.png" title="Download" width="24" alt="Download">
							</button>
						</div>
					</div>
					
					<div style="clear: both;"></div>
					
					<div id="wrap-slide-extra">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="#comment" onClick="getCommentPage()">Comment</a></li>
							<li role="presentation"><a href="#statistics" onClick="getStatisticsPage()">Statistics</a></li>
							<li role="presentation"><a href="#notes" onClick="getNotesPage()">Notes</a></li>
							<li role="presentation"><a href="#aboutauthor" onClick="getAboutAuthorPage()">About author</a></li>
						</ul>
						<div id="comment-wrap">
							<div class="row" id='slide-extra'>
								<div class="col-xs-12">
									<div class="input-group input-group-lg">
										<span class="input-group-addon" id="sizing-addon1">
											<img src="/pub/img/tri/Pencil-48.png" alt="Share your thought">
										</span>
										<input type="text" class="form-control" placeholder="Share your thought..." aria-describedby="sizing-addon1">
										<span class="input-group-btn">
											<button class="btn btn-default btn-success" type="button">Post</button>
										</span>
									</div>
								</div>
							</div>

							<div class="list-group" id='comment-list'>
								
								
								<div  id="show-more" class='text-center'>
									<a href="https://google.com.vn">	
											Show more
									</a>
								</div>
							</div>
						</div>
						<div id="statistics-wrap">
							
						</div>
						<div id="notes-wrap">
							
						</div>
						<div id="aboutauthor-wrap">
							
						</div>
					</div>
				</div>

				<script type="text/javascript">

					var currentItem = 0;
					var items = $('.image-slide');
					items.hide();
					items.eq(currentItem).show();

					var progressBar = document.getElementById('progressbar');
					var progressBarValue = 0;
					progressBar.style.width = progressBarValue+"%";

					var progressStep = 100/(items.length-1);
					var slideNumber = document.getElementById('slideNumber');
					slideNumber.innerHTML = (currentItem+1)+ "/"+items.length;
					function showNext() {
						currentItem++;
						if (currentItem == items.length) {
							currentItem = 0;
							progressBar.style.width = "0%";
							progressBarValue = 0;
							items.hide();
							items.eq(currentItem).show();
							slideNumber.innerHTML = (currentItem+1) + "/"+items.length;;
							return;
						}
						progressBarValue += progressStep;
						progressBar.style.width = progressBarValue+"%";
						items.hide();
						items.eq(currentItem).show();
						slideNumber.innerHTML = (currentItem+1)+ "/"+items.length;
					}

					function showPrevious() {
						currentItem--;
						if (currentItem<0) {
							currentItem = items.length-1;
							progressBar.style.width = "100%";
							progressBarValue = 100;
							items.hide();
							items.eq(currentItem).show();
							slideNumber.innerHTML = (currentItem+1)+ "/"+items.length;
							return;
						}
						progressBarValue -= progressStep;
						if (progressBarValue<0) {
							progressBarValue = 0;
						}
						progressBar.style.width = progressBarValue+"%";
						slideNumber.innerHTML = (currentItem+1)+ "/"+items.length;
						items.hide();
						items.eq(currentItem).show();			

					}

					var slideExtras = $('#wrap-slide-extra>div');
					var slideExtraNav = $('#wrap-slide-extra li');
					for (var i=0; i<slideExtras.length;i++) {
						slideExtraNav[i].className = "";
					}
					slideExtraNav[0].className="active";
					function getCommentPage() {
						slideExtras.hide();
						slideExtras.eq(1).show();
						for (var i=0; i<slideExtras.length;i++) {
							slideExtraNav[i].className = "";
						}
						slideExtraNav[0].className="active";
					}

					function getStatisticsPage() {
						slideExtras.hide();
						slideExtras.eq(2).show();
						for (var i=0; i<slideExtras.length;i++) {
							slideExtraNav[i].className = "";
						}
						slideExtraNav[1].className="active";
					}

					function getNotesPage() {
						
						slideExtras.hide();
						slideExtras.eq(3).show();
						for (var i=0; i<slideExtras.length;i++) {
							slideExtraNav[i].className = "";
						}
						slideExtraNav[2].className="active";
					}

					function getAboutAuthorPage() {
						
						slideExtras.hide();
						slideExtras.eq(2).show();
						for (var i=0; i<slideExtras.length;i++) {
							slideExtraNav[i].className = "";
						}
						slideExtraNav[3].className="active";
					}
				</script>
			</div>

			<div class='col-ex-12 col-sm-12 col-md-4 col-lg-4'>
				<h3 style="font-family: initial;">
					Recommended
				</h3>
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-custom" title="Content Marketing Training by Christa Sabathaly">
						<div class="thumbnail-custom">
							<div class="image-wrap">
								<img src="resources/slide-demo-2.jpg" alt="Slide demo">	
							</div>
							<div class="text-wrap">
								<div class="item-title">
									<h4 class="">
										Content Marketing Training by Christa Sabathaly
									</h4>
								</div>
								<small class="item-detail small">
									Growth Hacking Asia
								</small>
							</div>
							<div style="clear: both;"></div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-custom" title="The Workforce Engages">
						<div class="thumbnail-custom">
							<div class="image-wrap">
								<img src="resources/slide-demo-3.jpg" alt="Slide demo">	
							</div>
							<div class="text-wrap">
								<div class="item-title">
									<h4>The Workforce Engages</h4>
								</div>
								<small class="item-detail">
									Webtrends
								</small>
							</div>
							<div style="clear: both;"></div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-custom" title="Valentine's Day Traditions">
						<div class="thumbnail-custom">
							<div class="image-wrap">
								<img src="resources/slide-demo-4.jpg" alt="Slide demo">	
							</div>
							<div class="text-wrap">
								<div class="item-title">
									<h4>Valentine's Day Traditions</h4>
								</div>
								<small class="item-detail">
									Rudolph Kirkland
								</small>
							</div>
							<div style="clear: both;"></div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-custom" title="Your Guide to Brand Tracking: Exploring Social Collaboration Software">
						<div class="thumbnail-custom">
							<div class="image-wrap">
								<img src="resources/slide-demo-5.jpg" alt="Slide demo">	
							</div>
							<div class="text-wrap">
								<div class="item-title">
									<h4>Your Guide to Brand Tracking: Exploring Social Collaboration Software</h4>
								</div>
								<small class="item-detail">
									SurveyMonkey for Business
								</small>
							</div>
							<div style="clear: both;"></div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-custom" title="Why Are Amazon, Apple, Facebook and Google The Gang Of 4? Who Are Their Victi...">
						<div class="thumbnail-custom">
							<div class="image-wrap">
								<img src="resources/slide-demo-6.jpg" alt="Slide demo">	
							</div>
							<div class="text-wrap">
								<div class="item-title">
									<h4>Why Are Amazon, Apple, Facebook and Google The Gang Of 4? Who Are Their Victi...</h4>
								</div>
								<small class="item-detail">
									Dr. William J. Ward
								</small>
							</div>
							<div style="clear: both;"></div>
						</div>
					</a>
					<a href="#" class="list-group-item list-group-item-custom" title="7 Ways Soft-Skills Power Organizational Performance">
						<div class="thumbnail-custom">
							<div class="image-wrap">
								<img src="resources/slide-demo-7.jpg" alt="Slide demo">	
							</div>
							<div class="text-wrap">
								<div class="item-title">
									<h4>7 Ways Soft-Skills Power Organizational Performance</h4>
								</div>
								<small class="item-detail">
									BambooHR
								</small>
							</div>
							<div style="clear: both;"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	$(document).ready(function(){
		 var obj;
	
		console.log("ahihi");
			i=2;
			$.ajax({
				url:'/comment/getlist/'+i+'/0/2',
				//url:"/user/getinfo/1",
				type: 'get',

				success: function(data) {
					console.log(data);
	              data1=data;
	              obj= JSON.parse(data);
	              console.log(obj.data[0]);
	              //obj_data= JSON.parse(obj.data[0]);
	              for(index=0;index<2;index++){
	              	console.log("dsafds" +index);
	              	 $.ajax({
	              	 	//console.log(obj.data[index].userid);
	              		url:'/user/getinfo/1',
	              		type:"get",

	              		success: function(data){
	              			
	     
	              			console.log("datab" +data);
	              			obj1= JSON.parse(data);
	              			console.log("ten "+obj1.data.username);
	              			showComment(obj1.src,obj1.data.username,obj.data[index].content,obj.data[index].time);
	              		},
	              		async: false
	              });

	              	 
	              }
	             


	            }
			});
			t1="src";
			t2="daf";
			t3="adf";
			t4="fadf";
			showComment(t1,t2,t3,t4);

		}

	);



	function showComment(_src,_name,_cmt,_time){
	var cmt= document.createElement('div');
	cmt.className= "list-group-item";

		var cmtAva = document.createElement('div');
		cmtAva.className="comment-avatar pull-left";

			var img = document.createElement("IMG");
			img.setAttribute("src",_src);
			img.setAttribute("alt","ahihi");
			cmtAva.appendChild(img);
			cmt.appendChild(cmtAva);

		var cmtText = document.createElement('div');
		cmtText.className="comment-text";

			var cmtName = document.createElement('div');
			cmtName.className="name";
			cmtName.innerHTML=_name;

		cmtText.appendChild(cmtName);

			var cmtContent = document.createElement('div');
			cmtContent.className="comment-content";
			cmtContent.innerHTML=_cmt;

		cmtText.appendChild(cmtContent);

			var time =  document.createElement('div');
			time.className="comment-time";
			time.innerHTML=_time;

		cmtText.appendChild(time);
		cmt.appendChild(cmtText);

	t=document.getElementById('comment-list');

	var before = document.getElementById("show-more");

	//t.appendChild(cmt);
	t.insertBefore(cmt,before);
}	

	
</script>



</body>
</html>
