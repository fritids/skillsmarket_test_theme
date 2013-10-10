<?php

/* Get template based on what's browsed right now */
global $wp_query;

if( is_home() || is_front_page() ) {
	if( is_sm_dashboard() ) {
		get_template_part( 'templates/dashboard/dashboard' );
	}
	else {
		get_template_part( 'templates/front_page' );
	}
}