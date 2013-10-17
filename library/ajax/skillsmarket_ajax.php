<?php

/* AJAX file */

add_action("wp_ajax_TEST_AJAX_Get_Country_Code", "TEST_AJAX_Get_Country_Code");
add_action("wp_ajax_nopriv_TEST_AJAX_Get_Country_Code", "sm_you_must_login");
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

add_action("wp_ajax_TEST_AJAX_Get_Geocode", "TEST_AJAX_Get_Geocode");
add_action("wp_ajax_nopriv_TEST_AJAX_Get_Geocode", "sm_you_must_login");
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

add_action("wp_ajax_SM_AJAX_Get_Geocode", "SM_AJAX_Get_Geocode");
add_action("wp_ajax_nopriv_SM_AJAX_Get_Geocode", "sm_you_must_login");
function SM_AJAX_Get_Geocode() {
	global $wp_query, $current_user;

	$current_user = wp_get_current_user();

	$from = $_POST['src'];
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
		
	echo $uer_id;

	die();
}

add_action("wp_ajax_nopriv_SM_AJAX_User_Login", "SM_AJAX_User_Login");
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

add_action( 'wp_ajax_SM_AJAX_User_Login', 'SM_AJAX_User_Login' );
add_action( 'wp_ajax_nopriv_SM_AJAX_User_Login', 'SM_AJAX_User_Login' );
function SM_AJAX_User_Login(){

if( $_POST['action'] == 'register_action' ) {

$error = '';

$uname = trim( $_POST['username'] );
 $email = trim( $_POST['mail_id'] );
 $fname = trim( $_POST['firname'] );
 $lname = trim( $_POST['lasname'] );
 $pswrd = $_POST['passwrd'];

if( empty( $_POST['username'] ) )
 $error .= '<p class="error">Enter Username</p>';

if( empty( $_POST['mail_id'] ) )
 $error .= '<p class="error">Enter Email Id</p>';
 elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) )
 $error .= '<p class="error">Enter Valid Email</p>';

if( empty( $_POST['passwrd'] ) )
 $error .= '<p class="error">Password should not be blank</p>';

if( empty( $_POST['firname'] ) )
 $error .= '<p class="error">Enter First Name</p>';
 elseif( !preg_match("/^[a-zA-Z'-]+$/",$fname) )
 $error .= '<p class="error">Enter Valid First Name</p>';

if( empty( $_POST['lasname'] ) )
 $error .= '<p class="error">Enter Last Name</p>';
 elseif( !preg_match("/^[a-zA-Z'-]+$/",$lname) )
 $error .= '<p class="error">Enter Valid Last Name</p>';

if( empty( $error ) ){

$status = wp_create_user( $uname, $pswrd ,$email );

if( is_wp_error($status) ){

$msg = '';

 foreach( $status->errors as $key=>$val ){

 foreach( $val as $k=>$v ){

 $msg = '<p class="error">'.$v.'</p>';
 }
 }

echo $msg;

 }else{

$msg = '<p class="success">Registration Successful</p>';

 echo $msg;
 }

}
 else{

echo $error;
 }
 die(1);
 }
}

/* Fallback function for not logged in */
function sm_you_must_login() {
	echo "You must log in";
	die();
}