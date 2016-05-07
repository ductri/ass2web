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
						<div class="progress" id="progressBar">
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
					<h3 id='slide-title'></h3>
					<div class="pull-right">
						<div id='like-share' class="btn-group" role="group" aria-label="...">
							<button type="button" class="btn btn-default">
								<img src="/pub/img/Thumb-Up-48.png" title="Like" width="24" alt="Like">
							</button>
							<button type="button" class="btn btn-default">
								<img src="/pub/img/Share-48.png" title="Share" width="24" alt="Share">
							</button>
							<button type="button" class="btn btn-default" onclick="onClickDownload()" >
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
										<input type="text" id="form-cmt" class="form-control" placeholder="Share your thought..." aria-describedby="sizing-addon1">
										<span class="input-group-btn">
											<button class="btn btn-default btn-success" type="button" onclick="submitCmt()">Post</button>
										</span>
									</div>
								</div>
							</div>

							<div class="list-group" id='comment-list'>
								
								
								<div  id="show-more" class='text-center'>
									<a onclick="showMore()">	
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
				<div class="list-group" id="recommendList">
					
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	$(document).ready(function(){
			
			//document.getElementById("slide-title").innerHTML="ahihi";
			start_cmt=0;
			lend_cmt=2;
			showListComment(start_cmt,lend_cmt);
			showListRecommend();

		$.ajax({
			url: "/slide/getinfo/"+slideid,
			type: "get",

			success: function(res){
				

				var obj=JSON.parse(res);
				console.log(obj);
				$("#slide-title").html(obj.data.title);
				for(i=0;i<obj.data.noslide;i++){

					
					var showSlide = document.createElement("IMG");
					showSlide.setAttribute("class","img-responsive image-slide");
					showSlide.setAttribute("src","/slide/getslide/"+slideid+"/"+(i+1));
					var slide_wrap = document.getElementById("slide-wrap");
					var progress = document.getElementById("progressBar");
					slide_wrap.insertBefore(showSlide,progress);

					
				}
				
				currentItem = 0;
				items = $('.image-slide');
				items.hide();
				items.eq(currentItem).show();

				progressBar = document.getElementById('progressbar');
				progressBarValue = 0;
				progressBar.style.width = progressBarValue+"%";

				progressStep = 100/(items.length-1);
				slideNumber = document.getElementById('slideNumber');
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

				slideExtras = $('#wrap-slide-extra>div');
				slideExtraNav = $('#wrap-slide-extra li');
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
			}

		});
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
 
 function showListComment(start, lend){			
			$.ajax({
				url:'/comment/getlist/'+slideid+'/'+ start +'/' +lend,
				//url:"/user/getinfo/1",
				type: 'get',

				success: function(data) {
					console.log(data);
	              data1=data;
	              obj= JSON.parse(data);
	              console.log(obj.data[0]);
	              //obj_data= JSON.parse(obj.data[0]);
	              for(index=0;index<obj.data.length;index++){
	              	
	              	 $.ajax({

	              		url:'/user/getinfo/' +obj.data[index].userid,
	              		type:"get",

	              		success: function(data){
	              			console.log("datab" +data);
	              			obj1= JSON.parse(data);
	              			console.log("ten "+obj1.data.username);
	              			showComment("/user/"+obj1.data.userid+"/avatar",obj1.data.username,obj.data[index].content,obj.data[index].time);
	              		},
	              		async: false
	              });

	              	 
	              }
	             


	            }
			});
 }
  function showMore(){
 	start_cmt+=2;
 	lend_cmt+=2;
 	showListComment(start_cmt,lend_cmt);
 }

function showRecommend(r_href,r_name,r_src,r_des){
 	var a = document.createElement("A");
	a.className="list-group-item list-group-item-custom";
	a.title="test";
	a.href=r_href;
    
    //a.appendChild(t);

    var custom = document.createElement("div");
    custom.className="thumbnail-custom";
    a.appendChild(custom);

    var image_wrap= document.createElement("div");
    image_wrap.className="image-wrap";

    var src_image = document.createElement("IMG");
    src_image.setAttribute("src",r_src)
    src_image.setAttribute("alt","adfdsa");
    image_wrap.appendChild(src_image);
    custom.appendChild(image_wrap);

    var text_wrap = document.createElement("div");
    text_wrap.className="text-wrap";

    var item_title= document.createElement("div");
    item_title.className="item-title";

    text_wrap.appendChild(item_title);
    var h4=document.createElement("H4");
    var t = document.createTextNode(r_name);
    h4.appendChild(t);
    item_title.appendChild(h4);

    var small = document.createElement("small");
    small.className="item-detail small";
    var t_small = document.createTextNode(r_des);
    small.appendChild(t_small);
    text_wrap.appendChild(small);


    var clear = document.createElement("div");
  	clear.className="clear";


    custom.appendChild(text_wrap);
    var r= document.getElementById("recommendList");
    //document.getElementById("recommendList").appendChild(para);
    r.appendChild(a);
    custom.appendChild(clear);
 }




function showListRecommend(){
 	$.ajax({
 		url: "/slide/getlist/"+topicid,
 		type: "get",

 		success: function(data){
 			slide_data=JSON.parse(data);
 			for(i=0;i<slide_data.data.length;i++){
 				//showRecommend(slide_data[i].)
 				if(slide_data.data[i].slideid!=slideid){
 					showRecommend("/catalog/"+topicid+"/"+slide_data.data[i].slideid,slide_data.data[i].title,"/slide/getslide/"+slide_data.data[i].slideid+"/1",slide_data.data[i].description );
 				}
 			}
 		},

 	});
 }


function showSlideTitle(){
	$.ajax({
		url: "/slideid",
		type: 'get',
		success: function(data){
			$("#slide-title").html(data);
		}
	});
}

function submitCmt(){
	$.ajax({
		url: "/comment/add",
		type: "post",
		data: {
			"slideid":slideid,
			"userid":userid,
			"content":$('#form-cmt').val(),
		},

		success: function(data){
			console.log("cmt" +data);
			showComment("/user/"+userid+"/avatar",$('#userlink1').html(),$('#form-cmt').val(),"just now");
			$('#form-cmt').val("");

		}
	});
}


function onClickDownload(event){
     
      	if(typeof $("#userlink2").val() == "undefined"){
        alert('You need to login to download file!');
      } else {
        window.location = "/slide/download/"+slideid;
      }
    }
</script>



</body>
</html>
