jQuery.ajaxSetup({
   type: 'POST',
   url: TheSkillsMarket_REGISTER_AJAX.ajaxurl,
   global: false
});
/* Registration Ajax */
jQuery('#register-me').on('click',function($) {
	var action = 'SM_AJAX_User_Login';
	var username = $("#st-username").val();
	var mail_id = $("#st-email").val();
	var firname = $("#st-fname").val();
	var lasname = $("#st-lname").val();
	var passwrd = $("#st-psw").val();

	var ajaxdata = {
		action: 'SM_AJAX_User_Login',
		username: username,
		mail_id: mail_id,
		firname: firname,
		lasname: lasname,
		passwrd: passwrd,
	};

	$.post( ajaxurl, ajaxdata, function(res) { // ajaxurl must be defined previously
		$("#error-message").html(res);
	});
});
