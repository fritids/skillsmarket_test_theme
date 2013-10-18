$(document).ready(function() {

	// Show the login dialog box on click
	$('a#show_login').on('click', function(e){
		$('body').prepend('<div class="login_overlay"></div>');
		$('form#login').fadeIn(500);
		$('div.login_overlay, form#login a.close').on('click', function(){
			$('div.login_overlay').remove();
			$('form#login').hide();
		});
		e.preventDefault();
	});

	// Perform AJAX login on form submit
	$('form#login').on('submit', function(e){
		$('form#login p.status').show().text(TheSkillsMarket_LOGIN_AJAX.loadingmessage);
		$.ajax({
			data: {
				action: 'SM_AJAX_User_Login',
				username: $('form#login #username').val(),
				password: $('form#login #password').val(),
				security: $('form#login #security').val()
			},
			success: function(data){
				var is_logged = parseInt(data);
				if (is_logged == 1){
					document.location.href = TheSkillsMarket_LOGIN_AJAX.redirecturl;
				}
			}
		});
		e.preventDefault();
	});

});