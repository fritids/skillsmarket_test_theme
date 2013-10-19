<?php

global $current_user;

$current_user = wp_get_current_user();

if ( 0 == $current_user->ID ) {
	wp_die();
} else {
	// Logged in.
	$dashboard_type = get_query_var('sm_term');
	get_template_part( 'templates/dashboard/' . $dashboard_type );
}

?>