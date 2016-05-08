<!DOCTYPE html>
<html>
<head>
  <title>Templates Share</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/pub/js/quang/index.js"></script>
  <link rel="stylesheet" type="text/css" href="/pub/css/tuan/style.css">
  <link rel="stylesheet" type="text.css" href="/pub/css/tuan/userprofile.css">
  <style type="text/css"></style>
  <style>
  img {
    max-width: 100%;
    max-height: 100%;
}

#slide a {
  display:block;
}

  </style>
</head>
<body>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include(dirname(__FILE__)."\..\header\index.php");
?>

<div class="container ">
    <div class="row " >
       <div class="adjust" style="margin-top: 105px;">
          <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
         
       <br>
          <p class=" text-info" id="time">May 01,2015,03:00 pm </p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title", id="name"></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img id="userpic" alt="User Pic" src="userpic.jpg" class="img-circle img-responsive"> </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                       <tr>
                        <td>Dislay Name</td>
                        <td id="dislay_name"></td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td id="email"><a href="https://www.gmail.com">nnductuan@gmail.com</a></td>
                      </tr>
                       
                     
                      <tr>
                        <td>My slide</td>
                        <td id="slide"></td>
                           
                      </tr>
                    </tbody>
                  </table>
                  
              </div>
            </div>
                 <div class="panel-footer">
                       <a href="#" role="button" data-toggle="modal" data-original-title="Edit profile" data-toggle="tooltip modal" data-target="#edit-password" style=" background-color: hue">Change password</a>
                        <span class="pull-right">
                            <a href="#" role="button" data-toggle="modal" data-original-title="Edit profile" data-toggle="tooltip modal" type="button" class="btn btn-sm btn-warning" data-target="#edit-user"><i class="glyphicon glyphicon-edit"></i></a>
                          
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
    </div>
</div>
<!--mockup -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center row">
      

        <div class="col-md-3 col-lg-3 " align="center">  <img class="img-circle" id="img_logo" src="/pub/img/quang/user.png" alt="img" class="img-circle img-responsive"> </div>



        <!-- http://bootsnipp.com/img/logo.jpg -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>

      
      <!-- Begin # DIV Form -->
      <div id="div-forms">
        <div class="modal-header text-center">
      
       <form id="form-avatar" >
          <input type="file" name="avatar" id="avatar">
        </form>
      </div>

        <!-- Begin # Login Form -->
        <form id="edit-form">
        <hr>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">

              <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required>

            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">

              <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required>

            </div>
          </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="7" onclick="changeInfo()">Change and Save</button>
          </div>
        </div>
        </form>
      
      </div>
      <!-- End # DIV Form -->

    </div>
  </div>
</div>



<div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
          
      <!-- Begin # DIV Form -->
      <div id="div-forms">
        <div class="modal-header text-center">
       
            <div class="form-group" style:"display:block">

              <input type="password" id="oldpassword" class="form-control input-lg" placeholder="Old Password" tabindex="5" required>
            </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">

              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>

            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">

              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" required>

            </div>
          </div>
    
        </div>

        <hr>
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="7" onclick="changePassword()">Change Password</button>
          </div>
        </div>
        </form>
      </div>
      <!-- End # DIV Form -->

    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();

	document.getElementById("userpic").setAttribute("src","/user/"+userid+"/avatar");
   ava = document.getElementById('img_logo');
                ava.setAttribute('src',"/user/"+userid+"/avatar");


	$.ajax({
		url:"/user/getinfo/"+userid,
		type:"get",
		success: function(data){
			userInfo=JSON.parse(data);
			email.innerHTML=userInfo.data.email;
      $('#dislay_name').html(userInfo.data.username);
      fullName= userInfo.data.firstname;
      fullName+=" "+userInfo.data.lastname;
			document.getElementById("name").innerHTML=fullName;
     
      $('#first_name').val(userInfo.data.firstname);
      $("#last_name").val(userInfo.data.lastname);
			//document.getElementById("edit_email").value=userInfo.data.email;
			//document.getElementById("edit_password").value=userInfo.data.password;
		}


	});

    $.ajax({
      url: "/user/"+userid+"/getslides",
      type: "get",
      success: function(data){
        console.log(data);
        obj= JSON.parse(data);
          for(i=0;i<obj.data.length;i++){

            showSlide(obj.data[i].title,'/catalog/'+obj.data[i].topicid+'/'+obj.data[i].slideid);
          }

      }
    });


	$("#edit-form").submit(function(e){

		tuan11=$("#edit-form").serialize();
		$.ajax({
			url:'/user/editinfo/'+userid,
			type: 'get',
			dataType:'json',
			data:$("#edit-form").serialize(),

			success: function(data){

			}
		});


	});

    $('#form-avatar').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: "/user/changeavatar/"+userid,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
                ava = document.getElementById('img_logo');
                ava.setAttribute('src',"/user/"+userid+"/avatar");
                document.getElementById("userpic").setAttribute("src","/user/"+userid+"/avatar");

            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

    $("#avatar").on("change", function() {
        $("#form-avatar").submit();

    });

   


function showSlide(title,link){
  var a= document.createElement("a");
  a.href=link;
  a.innerHTML=title;
  document.getElementById("slide").appendChild(a);

}

});
	
function changePassword(){
  
    $.ajax({
      url: "/user/changepass/"+userid,
      type: "POST",
      dataType: "json",
      data: {
        "oldpass": $('#oldpassword').val(),
        "newpass1": $("#password").val(),
        "newpass2": $("#password_confirmation").val(),
      },

      success: function(res){
        alert(res.msg);
        location.reload();
      }
    });
  
}

function changeInfo(){
  $.ajax({
    url: "/user/editinfo/"+userid,
    type: "post",
    data: {

      "firstname":$('#first_name').val(),
      "lastname":$("#last_name").val(),
    },

    success: function(res){
      console.log(res);
      location.reload();
    }
  });
}



</script>
</body>
</html>