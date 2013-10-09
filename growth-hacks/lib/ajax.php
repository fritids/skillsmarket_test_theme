<?php
global $wp_query;

function AJAX_SM_unlock_color_scheme_feature() {

	$user = $_POST['user_id'];

	update_user_meta( $user, '_growth_hack_tweet-to-unlock-color-scheme', "unlocked" );
		
	echo get_user_meta( $user, '_growth_hack_tweet-to-unlock-color-scheme', true );

	die();
}
add_action( 'wp_ajax_nopriv_AJAX_SM_unlock_color_scheme_feature', 'AJAX_SM_unlock_color_scheme_feature' );
add_action( 'wp_ajax_AJAX_SM_unlock_color_scheme_feature', 'AJAX_SM_unlock_color_scheme_feature' );