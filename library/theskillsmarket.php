<?php

global $wp_query;

$libdir = trailingslashit( get_template_directory() ) . 'library/';

require_once( $libdir . 'ajax/skillsmarket_ajax.php' ); // AJAX

require_once( $libdir . 'sm_user.php' ); // Custom User actions & Hooks
require_once( $libdir . 'sm_rewrites.php' ); // Custom rewrite rules
require_once( $libdir . 'sm_javascripts.php' ); // Javascripts
require_once( $libdir . 'sm_body_classes.php' ); // Modify body classes
require_once( $libdir . 'sm_sidebars.php' ); // Custom sidebars
require_once( $libdir . 'sm_sidebar_widgets.php' ); // Sidebar widgets
require_once( $libdir . 'sm_footer_widgets.php' ); // Sidebar widgets
require_once( $libdir . 'dashboard-widgets/dashboard_widgets.php'); // WP Dashboard widgets
require_once( $libdir . 'taxonomies/taxonomies.php'); // Custom taxonomies
require_once( $libdir . 'post_types/post_types.php'); // Custom post types

function sm_curl_get($url){
	$useragent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	$data=curl_exec($ch);
	curl_close($ch);
	return $data;
}

?>