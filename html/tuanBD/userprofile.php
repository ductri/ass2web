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
</head>
<body>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include(dirname(__FILE__)."\..\header\index.php");
?>

<div class="container">
      <div class="row adjust">
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
                       
                      </tr>
                      </tr>
                        <td>My slide</td>
                        <td id="slide">
                        <a id="slide1"></a><br>
                        <a id="slide2"></a><br>
                        <a id="slide3"></a><br>


                        </td>
                           
                      </tr>
                    </tbody>
                  </table>
                  
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Sent Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="#" role="button" data-toggle="modal" data-original-title="Edit profile" data-toggle="tooltip modal" type="button" class="btn btn-sm btn-warning" data-target="#edit-user"><i class="glyphicon glyphicon-edit"></i></a>
                          
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
<!--mockup -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
      
        <img class="img-circle" id="img_logo" src="/pub/img/quang/user.png" alt="img"> <!-- http://bootsnipp.com/img/logo.jpg -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>

      <!-- Begin # DIV Form -->
      <div id="div-forms">

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
        <div class="form-group">

          <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3" required>

        </div>
       

        <hr>
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="7" id="btnRegister">Change and Save</button>
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
			
			//document.getElementById("edit_email").value=userInfo.data.email;
			//document.getElementById("edit_password").value=userInfo.data.password;
		}


	});


	$("#edit-form").submit(function(e){

		tuan11=$("#edit-form").serialize();
		$.ajax({
			url:'chua biet',
			type: 'get',
			dataType:'json',
			data:$("#edit-form").serialize(),

			success: function(data){

			}
		});
	});
});
	
	


</script>
</body>
</html>