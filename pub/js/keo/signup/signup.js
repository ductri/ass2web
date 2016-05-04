//require_once("config.php");

$( document ).ready(function() {
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    //Lam them tung form rieng biet
    $('#login-form').submit(function (e){
    	e.preventDefault();
    	console.log("Login");
    	var $lg_username = $('#login_username').val();
        var $lg_password = $('#login_password').val();

        var $lg_username_len = $lg_username.length;
        var $lg_password_len = $lg_password.length;

        var $letters = /^[A-Za-z]+$/;
        var $mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if ($lg_username == "ERROR") {
                    //msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
        } else {

            if ($lg_username_len == 0) {
	            alert("Please input username");
	            $('#login_username').focus();
	            return false;
          	} else {
            
            	if ($lg_password_len == 0) {
	                alert("Please input password");
	                $('#login_password').focus();
	                return false;
              	} else {
	                var dataLogin = {username: $lg_username, password: $lg_password};

	                $.ajax({
	                      type: "POST",
	                      url: "/login",
	                      data: dataLogin,
	                      success: function(results){
	                        var data = JSON.parse(results)
	                        console.log(data.code);
	                        if (data.code == 0) {
	                          window.location.href = "/";
	                          //header("Location:/");
	                        } else if(data.code == 3){
	                          alert("Username or password wrong !")
	                        } else if (data.code == 2) {
	                          alert("You already have logined")
	                        }
	                      }
	                    });
	                return true;
              	}
    		}
		}
	});

    $('#lost-form').submit(function (f) {
      	f.preventDefault();

      	var $ls_email=$('#lost_email').val();
        var dataLostPass = {email: $ls_email};

        var $letters = /^[A-Za-z]+$/;
        var $mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if ($ls_email == "ERROR") {
        	//msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
        } else {
          	if ($ls_email.match($mailformat)) {
	            $.ajax({
	              type: "GET",
	              url: "/user/resetpassword/"+ $ls_email,
	              data: "",
	              success: function(d){
	                      var data_lostpass = JSON.parse(d)
	                      console.log(data_lostpass.code);
	                      if (data_lostpass.code == 0) {
	                        alert(data_lostpass.msg);
	                      } else if(data_lostpass.code == 3){
	                        alert(data_lostpass.msg);
	                      } else if (data_lostpass.code == 4) {
	                        alert(data_lostpass.msg);
	                      } else if (data_lostpass.code == 5) {
	                        alert(data_lostpass.msg);
	                      }
	              }
	            });

	            return true;

          	} else {
	            alert("You have entered an invalid email address!");
	            $('#ls_email').focus();
	            return false;
        	}

  		}
  	});
    //....
    $('#registration_form').submit(function (g) {
      	g.preventDefault();

        var $first_name = $('#first_name').val();
        var $last_name = $('#last_name').val();
        var $display_name = $('#display_name').val();
        var $email = $('#email').val();
        var $password = $('#password').val();
        var $password_confirmation = $('#password_confirmation').val();

        var $first_name_len = $first_name.length;
        var $last_name_len = $last_name.length;
        var $display_name_len = $display_name.length;
        var $password_len = $password.length;

        var $letters = /^[A-Za-z]+$/;
        var $mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if ($first_name == "ERROR") {
               //msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
        } else {

            if ($first_name_len == 0 || $first_name_len > 20 || $first_name_len < 2) {
	            alert("First name should length be between 2 to 20");
	            $('#first_name').focus();
	            return false;
          	} else {
	            if ($first_name.match($letters)) {
	              	if ($last_name_len == 0 || $last_name_len > 30 || $last_name_len < 2) {
		                alert("Last name should length be between 2 to 30");
		                $('#last_name').focus();
		                return false;

	              	} else {
	                	if ($last_name.match($letters)) {

		                  if ($display_name_len == 0 || $display_name_len > 30 || $display_name_len < 2) {
		                    alert("Display name should length be between 2 to 30");
		                    $('#display_name').focus();
		                    return false;
		                  } else {
		                    if ($display_name.match($letters)) {

		                      if ($email.match($mailformat)) {
		                        if ($password_len < 5) {
		                        alert("Password should not empty / length be from 5 characters");
		                        $('#password').focus();
		                        return false;
		                      } else {
		                        if ($password_confirmation == $password) {
		                          console.log("register");
		                          var dataSignup = {username: $display_name, firstname: $first_name, lastname: $last_name, email: $email, password: $password};
		                          console.log(dataSignup);
		                          $.ajax({
		                                type: "POST",
		                                url: "/user/register",
		                                data: dataSignup,
		                                success: function(res){
		                                  console.log(res);
		                                  var code = JSON.parse(res)
		                                  console.log(code);
		                                  if (code.code == 0){
		                                  $("body").load("/").hide().fadeIn(1500).delay(6000);
		                                    //window.location.href = "/";
		                                  } else if (code.code == 3) {
		                                    alert(code.msg);
		                                  }
		                                }
		                              });
		                          return true;
		                        } else {
		                          alert("Password different confirmpassword. Please try again !");
		                          $('#password_confirmation').focus();
		                          return false;
		                        }
		                      }
		                        return true ;
		                      } else {
		                        alert("You have entered an invalid email address!");
		                        $('#email').focus();
		                        return false;
		                      }

		                    } else {
		                      alert("Display name must have alphabet characters only");
		                      $('#display_name').focus();
		                      return false;
		                    }
		                  }


	                } else {
	                  alert("Last name must have alphabet characters only");
	                  $('#last_name').focus();
	                  return false;
	                }
	              }

	            } else {
	              alert("First name must have alphabet characters only");
	              $('#first_name').focus();
	              return false;
	            }


                      //msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
         	}

        	return false;
    	}

	});

    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });

    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }

    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
      }, $msgShowTime);
    }

});
