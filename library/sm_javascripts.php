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
if (!is_admin()) add_action("wp_enqueue_scripts", "sm_setup_jquery", 11);
function sm_setup_jquery() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http://codeorigin.jquery.com/jquery-1.8.3.min.js", false, '1.8.3', false);
	wp_enqueue_script('jquery');
}

if( !is_admin() ) add_action( 'init', 'register_skillsmarket_ajax' );

function register_skillsmarket_ajax() {
	wp_register_script( "skillsmarket-ajax", trailingslashit( get_template_directory_uri() ).'library/ajax/skillsmarket_ajax.js', array('jquery') );
	wp_localize_script( 'skillsmarket-ajax', 'TheSkillsMarket_AJAX', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

	wp_enqueue_script( 'skillsmarket-ajax' );
}