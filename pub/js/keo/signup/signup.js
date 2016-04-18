$( document ).ready(function() {
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {

    	var $lg_username = $('#login_username').val();
        var $lg_password = $('#login_password').val();

        var $lg_username_len = $lg_username.length;
        var $lg_password_len = $lg_password.length;

        var $first_name = $('#first_name').val();
        var $last_name = $('#last_name').val();
        var $display_name = $('#display_name').val();
        var $password = $('#password').val();
        var $password_confirmation = $('#password_confirmation').val();
        var $check_condition = $('#check_condition').attr('checked');

        var $first_name_len = $first_name.length;
        var $last_name_len = $last_name.length;
        var $display_name_len = $display_name.length;
        var $password_len = $password.length;    

        var $letters = /^[A-Za-z]+$/;
        var $mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 


        switch(this.id) {
            case "login-form":
            {
                
                if ($lg_username == "ERROR") {
                    //msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {	

                	if ($lg_username_len == 0 || $lg_username_len > 20 || $lg_username_len < 2) {
						alert("First name should length be between 2 to 20");
						$('#login_username').focus();
						return false;
					} else {
						if ($lg_username.match($letters)) {
							if ($lg_password_len < 5) {
								alert("Password should not empty / length be from 5 characters");
								$('#login_password').focus();
								return false;
							} else {
								return true;
							}					
						} else {
							alert("First name must have alphabet characters only");
							$('#login_username').focus();
							return false;
						}

                   	 	//msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                	}
                	break;

				}
			}
					
            case "lost-form":
            {
                var $ls_email=$('#lost_email').val();

                if ($ls_email == "ERROR") {
                    //msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {

					if ($ls_email.match($mailformat)) {
						return true ;
					} else {
						alert("You have entered an invalid email address!");
						email.focus();
						return false;
					}
                    //msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            }

            case "registrtion_form":
            {
            	if ($first_name == "ERROR") {
                    //msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {	

                	if ($first_name == 0 || $first_name > 20 || $first_name < 2) {
						alert("First name should length be between 2 to 20");
						$('#first_name').focus();
						return false;
					} else {
						if ($lg_username.match($letters)) {
							
							if ($last_name_len == 0 || $last_name_len > 30 || lastname_len < 3) {
								alert("First name should length be between 3 to 30");
								$('#last_name').focus();
								return false;
							} else {
								if ($last_name_len.match(letters)) {

									if ($display_name_len == 0 || $display_name_len > 30 || display_name_len < 3) {
										alert("First name should length be between 3 to 30");
										$('#display_name').focus();
										return false;
									} else {
										if ($display_name.match(letters)) {

											if ($password_len < 5) {
												alert("Password should not empty / length be from 5 characters");
												$('#password').focus();
												return false;
											} else {
												if ($password_confirmation == $password) {
													if ($check_condition) {
														return true;
													} else {
														alert("Please check Condition !");
														$('#check_condition').focus();
														return false;
													}
												} else {
													alert("Password different confirmpassword. Please try again !");
													$('#password_confirmation').focus();
													return false;
												}
											}					
											
										} else {
											alert("Last name must have alphabet characters only");
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
                	break;

				}
            }

            default:
            {
                return false;
            }
        }
        return false;
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

/*

function formValidation(){
	var first_name = document.registrtion.first_name;
	var last_name = document.registrtion.last_name;
	var display_name = document.registrtion.display_name;
	var email = document.registrtion.email;
	var password = document.registrtion.password;
	var password_confirmation = document.registrtion.password_confirmation;
	var check_condition = document.registrtion.check_condition;

	if (firstname_validation(first_name,2,20)) {
		if (lastname_validation(last_name,2,40)) {
			if (displayname_validation(display_name,2,12)) {
				if (email_validation(email)) {
					if (password_validation(password,5)) {
						if (confirmpassword_validation(password,password_confirmation)) {
							if (checkcondition_validation(check_condition)) {

							}
						}
					}
				}
			}
		}
	}

	return false;


	function firstname_validation(first_name,mx,my){
		var firstname_len = first_name.value.length;
		var letters = /^[A-Za-z]+$/;
		if (firstname_len == 0 || firstname_len > my || firstname_len < mx) {
			alert("First name should length be between "+mx+" to "+my);
			first_name.focus();
			return false;
		} else {
			if (first_name.value.match(letters)) {
				return true;
			} else {
				alert("First name must have alphabet characters only");
				first_name.focus();
				return false;
			}
		}

		
	}

	function lastname_validation(first_name,mx,my){
		var lastname_len = last_name.value.length;
		var letters = /^[A-Za-z]+$/;
		if (lastname_len == 0 || lastname_len > my || lastname_len < mx) {
			alert("First name should length be between "+mx+" to "+my);
			last_name.focus();
			return false;
		} else {
			if (last_name.value.match(letters)) {
				return true;
			} else {
				alert("Last name must have alphabet characters only");
				last_name.focus();
				return false;
			}
		}

		
	}

	function displayname_validation(first_name,mx,my){
		var displayname_len = display_name.value.length;
		var letters = /^[A-Za-z]+$/;
		if (displayname_len == 0 || displayname_len > my || displayname_len < mx) {
			alert("First name should length be between "+mx+" to "+my);
			display_name.focus();
			return false;
		} else {
			if (display_name.value.match(letters)) {
				return true;
			} else {
				alert("Last name must have alphabet characters only");
				display_name.focus();
				return false;
			}
		}
		
	}

	function email_validation(email){
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		if (email.value.match(mailformat)) {
			return true ;
		} else {
			alert("You have entered an invalid email address!");
			email.focus();
			return false;
		}
	}

	function password_validation(password,mx){
		var password_len = password.value.length;
		if (password_len == 0 || password_len < mx) {
			alert("Password should not empty / length be from "+mx+ "characters");
			password.focus();
			return false;
		}
		return true;
	}

	function confirmpassword_validation(password,password_confirmation){
		if (password_confirmation.value == password.value) {
			return true;
		} else {
			alert("Password different confirmpassword. Please try again !");
			password_confirmation.focus();
			return false;
		}
	}

	function checkcondition_validation(check_condition){
		if (check_condition.checked) {
			return true;
		} else {
			alert("Please check Condition !");
			check_condition.focus();
			return false;
		}
	}
}
*/