<?php

/* AJAX file */

function TEST_AJAX_Get_Country_Code() {
	$longitude = $_POST['sm_long'];
	$latitude = $_POST['sm_lat'];
	$cc_check_url = 'http://ws.geonames.org/countryCode?lat='.$latitude.'&lng='.$longitude;
	$nonce = $_POST['sm_nonce'];

	if ( !wp_verify_nonce( $nonce, "test_ajax_get_country_code" ) ) {
		exit( "No naughty business please" );
	}

	$htmlContent = sm_curl_get( $cc_check_url );

	echo $htmlContent;

	die();
}
add_action("wp_ajax_TEST_AJAX_Get_Country_Code", "TEST_AJAX_Get_Country_Code");
add_action("wp_ajax_nopriv_TEST_AJAX_Get_Country_Code", "sm_you_must_login");

function TEST_AJAX_Get_Geocode() {
	$from = $_POST['from'];

	$geocode_json = sm_curl_get( $from );

	$geocode = json_decode( $geocode_json );
	$geo_status = $geocode->status;
	if( $geo_status == 'OK' || strtolower( $geo_status ) == 'ok' ) {
		$lat = $geocode->results[0]->geometry->location->lat;
		$lng = $geocode->results[0]->geometry->location->lng;

		$street_number = $geocode->results[0]->address_components[0]->long_name;
		$street_name = $geocode->results[0]->address_components[1]->long_name;
		$short_street_name = $geocode->results[0]->address_components[1]->short_name;
		$administrative_area = $geocode->results[0]->address_components[2]->long_name;
		$short_administrative_area = $geocode->results[0]->address_components[2]->short_name;
		$country_name = $geocode->results[0]->address_components[3]->long_name;
		$short_country_name = $geocode->results[0]->address_components[3]->short_name;
		$city_name = $geocode->results[0]->address_components[5]->long_name;
		$post_code = $geocode->results[1]->address_components[0]->long_name;

		$geometry_lat = $geocode->results[0]->geometry->location->lat;
		$geometry_lng = $geocode->results[0]->geometry->location->lng;

		$formatted_address = $street_number . ' ' . $street_name . ', ' . $city_name . ' ' . $post_code . ', ' . $administrative_area . ', ' . $country_name;
	}
		
	echo $formatted_address;

	die();
}
add_action("wp_ajax_TEST_AJAX_Get_Geocode", "TEST_AJAX_Get_Geocode");
add_action("wp_ajax_nopriv_TEST_AJAX_Get_Geocode", "sm_you_must_login");

function SM_AJAX_Get_Geocode() {

	global $wp_query, $current_user;

	$current_user = wp_get_current_user();

	$from = $_REQUEST['src'];
	$user_id = $current_user->ID;

	$geocode_json = sm_curl_get( $from );

	$geocode = json_decode( $geocode_json );

	$geo_status = $geocode->status;
	if( $geo_status == 'OK' || strtolower( $geo_status ) == 'ok' ) {
		$lat = $geocode->results[0]->geometry->location->lat;
		$lng = $geocode->results[0]->geometry->location->lng;

		$street_number = $geocode->results[0]->address_components[0]->long_name;
		$street_name = $geocode->results[0]->address_components[1]->long_name;
		$short_street_name = $geocode->results[0]->address_components[1]->short_name;
		$administrative_area = $geocode->results[0]->address_components[2]->long_name;
		$short_administrative_area = $geocode->results[0]->address_components[2]->short_name;
		$country_name = $geocode->results[0]->address_components[3]->long_name;
		$short_country_name = $geocode->results[0]->address_components[3]->short_name;
		$city_name = $geocode->results[0]->address_components[5]->long_name;
		$post_code = $geocode->results[1]->address_components[0]->long_name;

		$geometry_lat = $geocode->results[0]->geometry->location->lat;
		$geometry_lng = $geocode->results[0]->geometry->location->lng;

		$formatted_address = $street_number . ' ' . $street_name . ', ' . $city_name . ' ' . $post_code . ', ' . $administrative_area . ', ' . $country_name;
	}
		
	echo json_encode(array(
		'street_number' => $street_number,
		'street_name' => array(
			'short' => $short_street_name,
			'long' => $street_name
		),
		'administrative_area' => array(
			'short' => $short_administrative_area,
			'long' => $administrative_area
		),
		'country_name' => array(
			'short' => $short_country_name,
			'long' => $country_name
		),
		'city_name' => $city_name,
		'post_code' => $post_code,
		'geometry' => array(
			'lat' => $geometry_lat,
			'lng' => $geometry_lng
		),
		'formatted_address' => $formatted_address,
		'status' => $geo_status
	));

	die();
}
add_action("wp_ajax_SM_AJAX_Get_Geocode", "SM_AJAX_Get_Geocode");
add_action("wp_ajax_nopriv_SM_AJAX_Get_Geocode", "SM_AJAX_Get_Geocode");

function SM_AJAX_User_Login() {
	// First check the nonce, if it fails the function will break
	check_ajax_referer( 'ajax-login-nonce', 'security' );

	// Nonce is checked, get the POST data and sign user on
	$info = array();
	$info['user_login'] = $_POST['username'];
	$info['user_password'] = $_POST['password'];
	$info['remember'] = true;


	$user_signon = wp_signon( $info, false );

	if ( is_wp_error( $user_signon ) ){
		echo "0";
	} else {
		echo "1";
	}

	die();
}
add_action("wp_ajax_nopriv_SM_AJAX_User_Login", "SM_AJAX_User_Login");

add_action( 'wp_ajax_SM_AJAX_User_Register', 'SM_AJAX_User_Register' );
add_action( 'wp_ajax_nopriv_SM_AJAX_User_Register', 'SM_AJAX_User_Register' );
function SM_AJAX_User_Register() {
	$error = $msg = '';

	$username = $_POST['username'];
	$email = $_POST['mail_id'];
	$firstname = $_POST['firname'];
	$lastname = $_POST['lasname'];
	$user_role = $_POST['role'];
	$latitude = $_POST['lat'];
	$longitude =  $_POST['lng'];
	$api =  $_POST['api'];

	$geolocation = sm_curl_get( $api );
	$geolocation = json_decode( $geolocation );
	$geolocation = maybe_serialize( $geolocation );
	
	$user_id = username_exists( $username );
	if ( !$user_id and email_exists( $email ) == false ) {

		$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
		$user_id = wp_create_user( $username, $random_password, $email );
		
		add_user_meta( $user_id, '_geolocation', $geolocation );
		wp_update_user( array ( 'ID' => $user_id, 'role' => $user_role ) );
	}

	echo "1";

	die();
}

/* Fallback function for not logged in */
function sm_you_must_login() {
	echo "You must log in";
	die();
}
?>