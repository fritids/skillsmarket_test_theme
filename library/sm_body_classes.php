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

	/* User profiles */
	elseif( isset( $wp_query->query_vars['sm_taxonomy'] ) && get_query_var( 'sm_taxonomy' ) == 'sm_profile' ) :
		foreach( $wp_classes as $key => $value ) {
			if ( $value == 'home' ) unset( $wp_classes[$key] );
		}

		// get current user
		$current_user = wp_get_current_user();
		$user_role = $current_user->roles[0];

		if( get_query_var( 'sm_term' ) == 'my-profile' )
			$wp_classes[] = 'sm-my-profile';

		$wp_classes[] = 'sm-user-profile';
		$wp_classes[] = 'sm-'.$user_role.'-profile';

	endif;

	foreach( $wp_classes as $key => $value ) {
		if ( $value == 'custom-background' ) 
			unset( $wp_classes[$key] );
	}

	return $wp_classes;
}

?>