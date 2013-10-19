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

	var map, latlng;
	var geocoder = new google.maps.Geocoder();

	/** Let's try to geolocate new user **/
	// Try HTML5 geolocation
	if (navigator.geolocation) {

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
		sm_set_user_no_geolocation();
	}

	$('a#register').on( 'click', function(e) {
		var nonce = $('#wp_nonce').val();
		var ajax_loader = $('span#ajax_loader');
		var gmapi_url = $('input#gmapi').val();
		var geolocation=null;

		// run loader
		ajax_loader.show();

		var has_geo = parseInt( $('input#has_user_geo').val() );
		var lat_inp = $('input#user_lat').val();
		var lng_inp = $('input#user_lng').val();
		var gmapi = $('input#gmapi').val();

		$('span.ajax_action').html('Registering you');

		if( has_geo == 1 )
			skillsmarket_register_new_user( lat_inp, lng_inp, gmapi );
		else
			skillsmarket_register_new_user_no_geo();

		e.preventDefault(); // prevent reloading page
	});
});

/* Get user geo location details */
function sm_get_user_geolocation(position) {
	var sm_lat = position.coords.latitude;
	var sm_long = position.coords.longitude;
	var maps_api_url = 'http://maps.googleapis.com/maps/api/geocode/json';

	var has_geo = $('input#has_user_geo');
	var lat_inp = $('input#user_lat');
	var lng_inp = $('input#user_lng');
	var gmapi = $('input#gmapi');

	has_geo.val(1);
	lat_inp.val(sm_lat);
	lng_inp.val(sm_long);
	gmapi.val(maps_api_url+"?latlng="+sm_lat+","+sm_long+"&sensor=false");
}

/* Set user with no geolocation */
function sm_set_user_no_geolocation() {
	var has_geo = $('input#has_user_geo');
	var lat_inp = $('input#user_lat');
	var lng_inp = $('input#user_lng');
	var gmapi = $('input#gmapi');

	has_geo.val(0);
	lat_inp.val(null);
	lng_inp.val(null);
	gmapi.val(null);
}

/* Display error */
function sm_display_error(error) {
	var errors = {
		1: 'Permission denied',
		2: 'Position unavailable',
		3: 'Request timeout'
	};
	alert("Error: " + errors[error.code]);
}

/* Register new user at The Skills Market with geolocation */
function skillsmarket_register_new_user(latitude, longitude, map_api) {
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
		role: role,
		lat: latitude,
		lng: longitude,
		api: map_api
	};

	/* Post AJAX request and see what happens */
	$.ajax({
		data: ajaxdata,
		success: function(results) {
			ajax_loader.hide();
			alert(results);
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