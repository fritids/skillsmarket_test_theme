<?php

// Function that outputs the contents of the dashboard widget
function sm_insights_dashboard_widget_template_function() {
	?>
	<div id="smInsightsDashboard" class="insights-inside">
		<header>
			<h1 id="sm_branding">
				<a href="http://www.theskillsmarket.org/" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/growth-hacks/assets/logo.png" id="sm_logo" height="80">
				</a>
			</h1>
		</header>
	</div>
	<?php
}

// Function used in the action hook
function add_sm_insights_dashboard_widget() {
	wp_enqueue_style( 'sm-insights-dashboard', get_template_directory_uri() . '/compass/stylesheets/widgets/dashboard.css', array(), null, 'screen' );
	wp_add_dashboard_widget('sm_insights_dashboard_widget', 'Insights', 'sm_insights_dashboard_widget_template_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_sm_insights_dashboard_widget' );