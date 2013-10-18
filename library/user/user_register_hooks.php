<?php

/* User register hooks only */


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