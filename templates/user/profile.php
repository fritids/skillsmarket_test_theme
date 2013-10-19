<?php

global $wp_query;

if( ! is_user_logged_in() ) {
	wp_die( 'You have to be logged in to view profiles' );
}

$current_user = wp_get_current_user();
$user_role = $current_user->roles[0];

// Load user profile
if( get_query_var( 'sm_term' ) == 'my-profile' )
	include 'profiles/' . $user_role . '.php';
else
	include 'profiles/user_profile.php';