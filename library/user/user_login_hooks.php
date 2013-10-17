<?php

/* User login actions and hooks only */

add_action('wp_login', 'sm_user_after_login');
function sm_user_after_login() {
	$current_user = wp_get_current_user();
	$id = $current_user->ID;
	echo $id;
}


/** Other helpful User functions
	
	You should add functions used in this
	template only

	Below...
**/

function custom_login() {
	$creds = array();
	$creds['user_login'] = 'example';
	$creds['user_password'] = 'plaintextpw';
	$creds['remember'] = true;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) )
		echo $user->get_error_message();
}
// run it before the headers and cookies are sent
//add_action( 'after_setup_theme', 'custom_login' );