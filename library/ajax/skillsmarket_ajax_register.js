/* Registration Ajax */
$(document).ready(function() {
	var ajax_loader = $('span.ajax_loader.register_loader');

	$('input[type="text"], input[type="password"]').on( 'focus', function() {
		$(this).removeClass('error success');
		$('a#register').removeClass('disabled');
	}).on( 'blur', function() {
		if( $(this).val().length == 0 )
			$(this).addClass('error');
	});

	$('a#register').on('click', function(e) {
		ajax_loader.show();
		e.preventDefault();

		/* Add Coordinates */
		var map, latlng;
		var geocoder = new google.maps.Geocoder();

		/** Let's try to geolocate new user **/
		// Try HTML5 geolocation
		if (navigator.geolocation) {
			
			$('span.ajax_action').html('Geolocating you');

			var timeoutVal = 10 * 1000 * 1000;
			var options = {
				enableHighAccuracy: true,
				timeout: timeoutVal,
				maximumAge: 0
			};
			navigator.geolocation.getCurrentPosition(
				sm_get_user_geolocation,
				sm_display_error,
				options
			);
		}
		else {
			//skillsmarket_register_new_user_no_geo();
			alert('No Geo');
		}
	});
});

/* Get user geo location details */
function sm_get_user_geolocation(position) {
	var sm_lat = position.coords.latitude;
	var sm_long = position.coords.longitude;

	var nonce = $('#wp_nonce').val();
	var ajax_loader = $('span#ajax_loader');
	var maps_api_url = 'http://maps.googleapis.com/maps/api/geocode/json';
	var geolocation=null;

	ajax_loader.show();

	$.ajax({
		dateType: "json",
		data: {
			action: "SM_AJAX_Get_Geocode",
			src: maps_api_url+"?latlng="+sm_lat+","+sm_long+"&sensor=false"
		},
		success: function(geolocation) {
			$('span.ajax_action').html('Registering you');
			if( geolocation ) {
				ajax_loader.hide();
				alert(geolocation);
			}
			else {
				alert('I wasn\'t able to locate you. Click OK to continue registration.');
				skillsmarket_register_new_user_no_geo();
			}
		}
	});
}

function sm_display_error(error) {
	var errors = {
		1: 'Permission denied',
		2: 'Position unavailable',
		3: 'Request timeout'
	};
	alert("Error: " + errors[error.code]);
}

function skillsmarket_register_new_user(geolocation) {
	var error_counter = 0;
	var ajax_loader = $('span.ajax_loader.register_loader');
	var action = 'SM_AJAX_User_Register';
	var username = $("#st-username").val() || null;
	var mail_id = $("#st-email").val() || null;
	var firname = $("#st-fname").val() || null;
	var lasname = $("#st-lname").val() || null;
	var role = $("#st-role").val() || null;
	var passwrd = $("#st-psw").val() || null;

	/* Disable submit button if errors */
	if( username == null || mail_id == null || firname == null || lasname == null || role == null ) {
		ajax_loader.hide(); // hide loader
		$('a#register').addClass('disabled'); // disable button
	}

	/* Mark empty input with errors */
	if( username == null  ) {
		error_counter++;
		$("#st-username").addClass('error');
	}
	if( mail_id == null ) {
		error_counter++;
		$("#st-email").addClass('error');
	}
	if( firname == null  ) {
		error_counter++;
		$("#st-fname").addClass('error');
	}
	if( lasname == null ) {
		error_counter++;
		$("#st-lname").addClass('error');
	}
	if( role == null  ) {
		error_counter++;
		$("#st-role").addClass('error');
	}

	/* Check for errors */
	if( error_counter != 0 )
		return false;

	/* Prepare data for AJAX request */
	var ajaxdata = {
		action: action,
		username: username,
		mail_id: mail_id,
		firname: firname,
		lasname: lasname,
		role: role,
		geolocation: geolocation
	};

	/* Post AJAX request and see what happens */
	$.ajax({
		data: ajaxdata,
		success: function(results) {
			ajax_loader.hide();
			$("span.ajax_action").html(results);
		},
		error: function(xhr, textStatus, erorrThrown) {
			ajax_loader.hide();
			$("span.ajax_action").html(erorrThrown);
		}
	});
}

function skillsmarket_register_new_user_no_geo() {
	var error_counter = 0;
	var ajax_loader = $('span.ajax_loader.register_loader');
	var action = 'SM_AJAX_User_Register';
	var username = $("#st-username").val() || null;
	var mail_id = $("#st-email").val() || null;
	var firname = $("#st-fname").val() || null;
	var lasname = $("#st-lname").val() || null;
	var role = $("#st-role").val() || null;

	/* Disable submit button if errors */
	if( username == null || mail_id == null || firname == null || lasname == null || role == null ) {
		ajax_loader.hide(); // hide loader
		$('a#register').addClass('disabled'); // disable button
	}

	/* Mark empty input with errors */
	if( username == null  ) {
		error_counter++;
		$("#st-username").addClass('error');
	}
	if( mail_id == null ) {
		error_counter++;
		$("#st-email").addClass('error');
	}
	if( firname == null  ) {
		error_counter++;
		$("#st-fname").addClass('error');
	}
	if( lasname == null ) {
		error_counter++;
		$("#st-lname").addClass('error');
	}
	if( role == null  ) {
		error_counter++;
		$("#st-role").addClass('error');
	}

	/* Check for errors */
	if( error_counter != 0 )
		return false;

	/* Prepare data for AJAX request */
	var ajaxdata = {
		action: action,
		username: username,
		mail_id: mail_id,
		firname: firname,
		lasname: lasname,
		role: role
	};

	/* Post AJAX request and see what happens */
	$.post( url, ajaxdata, function(res) {
		ajax_loader.hide();
		$("#error-message").html(res);
	});
}