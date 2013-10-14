<?php

global $wp_query;

$libdir = trailingslashit( get_template_directory() ) . 'library/';

require_once( $libdir . 'sm_rewrites.php' ); // Custom rewrite rules
require_once( $libdir . 'sm_javascripts.php' ); // Javascripts
require_once( $libdir . 'sm_body_classes.php' ); // Modify body classes
require_once( $libdir . 'sm_sidebars.php' ); // Custom sidebars
require_once( $libdir . 'sm_sidebar_widgets.php' ); // Sidebar widgets
require_once( $libdir . 'dashboard-widgets/dashboard_widgets.php'); // WP Dashboard widgets
require_once( $libdir . 'taxonomies/taxonomies.php'); // Custom taxonomies
require_once( $libdir . 'post_types/post_types.php'); // Custom post types

function is_sm_dashboard() {
	global $wp_query;

	$taxonomy = ( isset( $wp_query->query_vars['sm_taxonomy'] ) ) ? get_query_var( 'sm_taxonomy' ) : false;

	if( ! is_admin() ) {
		if( $taxonomy ) {
			if( $taxonomy = 'sm_dashboard' )
				return true;
		}
	}
}

function sm_get_current_taxonomy() {
	global $wp_query;

	echo get_query_var( 'sm_taxonomy' );
}