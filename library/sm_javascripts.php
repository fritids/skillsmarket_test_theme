<?php

add_action('wp_enqueue_scripts', 'sm_setup_scripts');
function sm_setup_scripts() {
	global $wp_query;

	$rtdir =    trailingslashit( get_template_directory_uri() ); // wp theme root dir
	$jsdir =    $rtdir . 'library/js/'; // javascripts dir
	$libdir =   $rtdir . 'library/'; // library dir

	/////////////////////////////////////////////
	/* Register all scripts first */
	wp_register_script( 'insights-dashboard', $jsdir . 'dashboard/insights-dashboard.js', array( 'jquery' ), null, false ); // Insights Dashboard
	wp_register_script( 'jquery-highcharts', $jsdir . 'Highcharts/js/highcharts.js', array( 'jquery' ), '3.0.6', false ); // Insights Dashboard
	wp_register_script( 'datepicker', $jsdir . 'calendar/datepicker.js', array( 'jquery' ), null, false ); // Insights Dashboard
	wp_register_script( 'datepicker-eye', $jsdir . 'calendar/eye.js', array( 'jquery' ), null, false ); // Insights Dashboard
	wp_register_script( 'datepicker-utils', $jsdir . 'calendar/utils.js', array( 'jquery' ), null, false ); // Insights Dashboard
	wp_register_script( 'datepicker-layout', $jsdir . 'calendar/layout.js', array( 'jquery' ), null, false ); // Insights Dashboard

	/////////////////////////////////////////////
	/* Enqueue all scripts here */

	if( ! is_admin() ) {

		wp_enqueue_style( 'sm_style', $rtdir . 'compass/stylesheets/screen.css', array(), '', 'screen' );

		if( is_sm_dashboard() ) {
			if( get_query_var('sm_term') == 'insights' ) {
				wp_enqueue_style( 'insights-dashboard', $rtdir . 'compass/stylesheets/dashboard/insights-dashboard.css', array(), '', 'screen' );

				wp_enqueue_script( 'insights-dashboard' );
				wp_enqueue_script( 'jquery-masonry' );
				wp_enqueue_script( 'jquery-highcharts' );
				wp_enqueue_script( 'datepicker' );
				wp_enqueue_script( 'datepicker-eye' );
				wp_enqueue_script( 'datepicker-utils' );
				wp_enqueue_script( 'datepicker-layout' );
			}
		}

	} // end if admin
}