<?php

add_action('wp_enqueue_scripts', 'sm_setup_hacks_scripts');
function sm_setup_hacks_scripts() {
	global $wp_query;

	$rtdir =    get_template_directory_uri() . '/growth-hacks/'; // wp theme root dir
	$jsdir =    $rtdir . 'javascripts/'; // javascripts dir
	$libdir =   $rtdir . 'lib/'; // library dir

	/////////////////////////////////////////////
	/* Register all scripts first */
	wp_register_script( 'tweet-to-unlock', $jsdir . 'tweet-to-unlock.js', array( 'jquery' ), null, false ); // jquery dotdotdot

	/////////////////////////////////////////////
	/* Enqueue all scripts here */

	if( get_query_var('hacks') == 1 ) {
		if( get_query_var('hack_term') == 'tweet-to-unlock' ) {
			wp_enqueue_style( 'tweet-to-unlock', $rtdir . 'tweet-to-unlock/compass/stylesheets/screen.css', array(), '', 'screen' );
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-dialog' );
			wp_enqueue_script( 'tweet-to-unlock' );
		}
	}
}