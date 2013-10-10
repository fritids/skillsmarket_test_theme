<?php

global $current_user;

$current_user = wp_get_current_user();

// Function that outputs the contents of the dashboard widget
function sm_insights_dashboard_widget_template_function() {
	global $current_user;
	?>
	<div id="smInsightsDashboard" class="insights-inside">
		<header>
			<h2>Welcome back, <span class="user_name"><?php echo $current_user->display_name; ?></span>
		</header>
		<div class="content">
			<section id="students-rank"></section>
			<section id="students-whereabouts"></section>
			<section id="money"></section>
		</div>
	</div>
	<?php
}

// Function used in the action hook
function add_sm_insights_dashboard_widget() {
	global $current_user;
	$dashboard_header = '</span><div id="holder-left">Insights Dashboard</div><div id="holder-right"><a href="http://www.theskillsmarket.org/" target="_blank"><img src="'.get_template_directory_uri().'/growth-hacks/assets/logo.png" id="sm_logo" height="40"></a></div><span>';
	wp_enqueue_style( 'sm-insights-dashboard', get_template_directory_uri() . '/compass/stylesheets/widgets/dashboard.css', array(), null, 'screen' );
	wp_enqueue_style( 'LobsterFont', 'http://fonts.googleapis.com/css?family=Lobster', array(), null, 'screen' );
	wp_enqueue_style( 'OpenSansCondensedFont', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700', array(), null, 'screen' );
	wp_add_dashboard_widget('sm_insights_dashboard_widget', $dashboard_header, 'sm_insights_dashboard_widget_template_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_sm_insights_dashboard_widget' );