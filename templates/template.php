<?php

/* Get template based on what's browsed right now */
global $wp_query;

if( is_home() || is_front_page() ) {
	if( isset( $wp_query->query_vars['sm_taxonomy'] ) && get_query_var( 'sm_taxonomy' ) == 'sm_dashboard' ) {
		get_template_part( 'templates/dashboard/dashboard' );
	}
	elseif( isset( $wp_query->query_vars['sm_taxonomy'] ) && get_query_var( 'sm_taxonomy' ) == 'testing_page' ) {
		get_template_part( 'templates/test/' . get_query_var( 'sm_term' ) );
	}
	elseif( isset( $wp_query->query_vars['sm_taxonomy'] ) && get_query_var( 'sm_taxonomy' ) == 'sm_profile' ) {
		get_template_part( 'templates/user/profile' );
	}
	else {
		get_template_part( 'templates/front_page' );
	}
}

?>