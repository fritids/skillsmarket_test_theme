<?php

/* User register hooks only */

add_action('init', 'skillsmarket_ajax_register');
function skillsmarket_ajax_register() {
	global $wp_query;

	$ajax_dir = trailingslashit( get_template_directory_uri() ).'library/ajax/';
	// LOGIN AJAX
	wp_register_script( 'skillsmarket-ajax-register', $ajax_dir . 'skillsmarket_ajax_register.js', array( 'jquery' ) );
	wp_enqueue_script( 'skillsmarket-ajax-register' );

	wp_localize_script( 'skillsmarket-ajax-register', 'TheSkillsMarket_REGISTER_AJAX', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url().'/tests/register/',
		'loadingmessage' => __( 'Sending user info, please wait...' ) ) );
}
function skillsmarket_user_metadata( $user_id ) {
	if( !empty( $_POST['firname'] ) && !empty( $_POST['lasname'] ) ) {
		update_user_meta( $user_id, 'first_name', trim( $_POST['firname'] ) );
		update_user_meta( $user_id, 'last_name', trim( $_POST['lasname'] ) );
	}
	update_user_meta( $user_id, 'show_admin_bar_front', false );

	//wp_set_auth_cookie( $user_id, false, is_ssl() );
	//wp_redirect( home_url() . '/insights/' );
	//exit;
}
add_action( 'user_register', 'skillsmarket_user_metadata' );
add_action( 'profile_update', 'skillsmarket_user_metadata' );