<?php

add_action('wp_enqueue_scripts', 'sm_setup_scripts');
function sm_setup_scripts() {
	global $wp_query;

	$rtdir =    trailingslashit( get_template_directory_uri() ); // wp theme root dir
	$jsdir =    $rtdir . 'library/js/'; // javascripts dir
	$libdir =   $rtdir . 'library/'; // library dir
	$flatuidir = $libdir . 'css/flat-ui-bootstrap/'; // flat UI dir

	/////////////////////////////////////////////
	/* Register all scripts first */
	wp_register_script( 'modernizr', $jsdir . 'modernizr.custom.67578.js', array( 'jquery' ), null, false ); // Modernizr HTML & CSS detector
	wp_register_script( 'skillsmarket-masonry', $jsdir . 'masonry.pkgd.js', array( 'jquery' ), null, false ); // Masonry layout
	wp_register_script( 'insights-dashboard', $jsdir . 'dashboard/insights-dashboard.js', array( 'jquery' ), null, false ); // Insights Dashboard
	wp_register_script( 'jquery-highcharts', $jsdir . 'Highcharts/js/highcharts.js', array( 'jquery' ), '3.0.6', false ); // Insights Dashboard
	wp_register_script( 'yui', $jsdir . 'calendar/yui-min.js', array( 'jquery' ), null, false ); // Yahoo! YUI framework
	wp_register_script( 'blur', $jsdir . 'blur.min.js', array( 'jquery' ), null, false ); // jQuery blur effect
	wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true', array( 'jquery' ), null, false ); // Google Maps API

	## Register Flat UI here ##
	wp_register_script( 'touch-punch', $flatuidir . 'js/jquery.ui.touch-punch.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'bootstrap-select', $flatuidir . 'js/bootstrap-select.js', array( 'jquery' ), null, true );
	wp_register_script( 'bootstrap-switch', $flatuidir . 'js/bootstrap-switch.js', array( 'jquery' ), null, true );
	wp_register_script( 'flatui-checkbox', $flatuidir . 'js/flatui-checkbox.js', array( 'jquery' ), null, true );
	wp_register_script( 'flatui-radio', $flatuidir . 'js/flatui-radio.js', array( 'jquery' ), null, true );
	wp_register_script( 'jquery-tagsinput', $flatuidir . 'js/jquery.tagsinput.js', array( 'jquery' ), null, true );
	wp_register_script( 'jquery-placeholder', $flatuidir . 'js/jquery.placeholder.js', array( 'jquery' ), null, true );
	wp_register_script( 'jquery-stackable', $flatuidir . 'js/jquery.stacktable.js', array( 'jquery' ), null, true );
	wp_register_script( 'flat-video', 'http://vjs.zencdn.net/4.1/video.js', array( 'jquery' ), '4.1', true );
	wp_register_script( 'flat-application', $flatuidir . 'js/application.js', array( 'jquery' ), null, true );

	/////////////////////////////////////////////
	/* Enqueue all scripts & stylesheets here */

	if( ! is_admin() ) {

		wp_enqueue_style( 'sm_style', $rtdir . 'compass/stylesheets/screen.css', array(), '', 'screen' );
		wp_enqueue_style( 'flat-ui', $flatuidir . 'css/flat-ui.css', array(), '', 'screen' );

		if( is_sm_dashboard() ) {
			if( get_query_var('sm_term') == 'insights' ) {
				wp_enqueue_style( 'insights-dashboard', $rtdir . 'compass/stylesheets/dashboard/insights-dashboard.css', array(), '', 'screen' );

				wp_enqueue_script( 'insights-dashboard' );
				wp_enqueue_script( 'yui' );
				wp_enqueue_script( 'jquery-masonry' );
				wp_enqueue_script( 'jquery-highcharts' );
			}
		}

		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'google-maps' );
		wp_enqueue_script( 'touch-punch' );
		wp_enqueue_script( 'bootstrap-select' );
		wp_enqueue_script( 'bootstrap-switch' );
		wp_enqueue_script( 'flatui-checkbox' );
		wp_enqueue_script( 'flatui-radio' );
		wp_enqueue_script( 'jquery-tagsinput' );
		wp_enqueue_script( 'jquery-placeholder' );
		wp_enqueue_script( 'jquery-stackable' );
		wp_enqueue_script( 'flowtype' );
		wp_enqueue_script( 'flat-application' );

	} // end if admin
}
if (!is_admin())
	add_action("wp_enqueue_scripts", "sm_setup_jquery", 11);

function sm_setup_jquery() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http://codeorigin.jquery.com/jquery-1.8.3.min.js", false, '1.8.3', false);
	wp_enqueue_script('jquery');
}

/* Register custom AJAX functions */
if( !is_admin() )
	add_action( 'init', 'register_skillsmarket_geolocation_ajax' );

function register_skillsmarket_geolocation_ajax() {
	global $wp_query;

	$ajax_dir = trailingslashit( get_template_directory_uri() ).'library/ajax/';
	// GEOLOCATION AJAX
	wp_register_script( 'skillsmarket-ajax-geolocation', $ajax_dir . 'skillsmarket_ajax_geolocation.js', array('jquery', 'google-maps') );
	wp_localize_script( 'skillsmarket-ajax-geolocation', 'TheSkillsMarket_GEO_LOCATION_AJAX', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	wp_enqueue_script( 'skillsmarket-ajax-geolocation' );
}

// Execute the action only if the user isn't logged in
if ( !is_user_logged_in() )
	add_action('init', 'skillsmarket_ajax_login');

function skillsmarket_ajax_login() {
	global $wp_query;

	$ajax_dir = trailingslashit( get_template_directory_uri() ).'library/ajax/';
	// LOGIN AJAX
	wp_register_script( 'skillsmarket-ajax-login', $ajax_dir . 'skillsmarket_ajax_login.js', array( 'jquery' ) );
	wp_enqueue_script( 'skillsmarket-ajax-login' );

	wp_localize_script( 'skillsmarket-ajax-login', 'TheSkillsMarket_LOGIN_AJAX', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url().'/tests/login/',
		'loadingmessage' => __( 'Sending user info, please wait...' ) ) );
}