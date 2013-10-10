<?php

add_filter('body_class', 'sm_modify_body_classes', 20, 2);
function sm_modify_body_classes($wp_classes) {
	if( is_sm_dashboard() ) :
		foreach( $wp_classes as $key => $value ) {
			if ( $value == 'home' ) unset( $wp_classes[$key] );
		}
		$wp_classes[] = 'sm-dashboard';
		$wp_classes[] = get_query_var( 'sm_term' ) . '-dashboard';
	endif;

	return $wp_classes;
}