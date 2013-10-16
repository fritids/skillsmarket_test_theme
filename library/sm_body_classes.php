<?php

add_filter('body_class', 'sm_modify_body_classes', 20, 2);
function sm_modify_body_classes($wp_classes) {
	global $wp_query;
	/* Dashboard */
	if( isset( $wp_query->query_vars['sm_taxonomy'] ) && get_query_var( 'sm_taxonomy' ) == 'dashboard' ) :
		foreach( $wp_classes as $key => $value ) {
			if ( $value == 'home' ) unset( $wp_classes[$key] );
		}
		$wp_classes[] = 'sm-dashboard';
		$wp_classes[] = get_query_var( 'sm_term' ) . '-dashboard';

	/* Testing application */
	elseif( isset( $wp_query->query_vars['sm_taxonomy'] ) && get_query_var( 'sm_taxonomy' ) == 'testing_page' ) :
		foreach( $wp_classes as $key => $value ) {
			if ( $value == 'home' ) unset( $wp_classes[$key] );
		}
		$wp_classes[] = 'sm-test-page';
		$wp_classes[] = get_query_var( 'sm_term' ) . '-test';
	endif;

	return $wp_classes;
}