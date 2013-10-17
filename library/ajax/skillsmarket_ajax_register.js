/* Registration Ajax */
jQuery(document).ready(function($) {
	jQuery('a#register').on('click', function(e) {
		e.preventDefault();
		alert('fdsfsdfsdfdgsdg');
		var action = 'SM_AJAX_User_Login';
		var username = $("#st-username").val();
		var mail_id = $("#st-email").val();
		var firname = $("#st-fname").val();
		var lasname = $("#st-lname").val();
		var passwrd = $("#st-psw").val();

		var ajaxdata = {
			action: 'SM_AJAX_User_Register',
			username: username,
			mail_id: mail_id,
			firname: firname,
			lasname: lasname,
			passwrd: passwrd,
		};

		$.post( TheSkillsMarket_REGISTER_AJAX.ajaxurl, ajaxdata, function(res) {
			$("#error-message").html(res);
		});
	});
});
