<?php

add_action('wp_enqueue_scripts', 'sm_setup_scripts');
function sm_setup_scripts() {
	global $wp_query;

	$rtdir =    trailingslashit( get_template_directory_uri() ); // wp theme root dir
	$jsdir =    $rtdir . 'library/js/'; // javascripts dir
	$libdir =   $rtdir . 'library/'; // library dir

	/////////////////////////////////////////////
	/* Register all scripts first */
	wp_register_script( 'insights-dashboard', $jsdir . 'dashboard/insights-dashboard.js', array( 'jquery' ), null, false ); // jquery dotdotdot

	/////////////////////////////////////////////
	/* Enqueue all scripts here */


	wp_enqueue_style( 'sm_style', $rtdir . 'compass/stylesheets/screen.css', array(), '', 'screen' );

	if( is_sm_dashboard() ) {
		if( get_query_var('sm_term') == 'insights' ) {
			wp_enqueue_style( 'insights-dashboard', $rtdir . 'compass/stylesheets/dashboard/insights-dashboard.css', array(), '', 'screen' );
			wp_enqueue_script( 'insights-dashboard' );
		}
	}
}