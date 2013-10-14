<?php

/* Insights Dashboard */

global $wp_query, $current_user;

$insights_sections = 'templates/dashboard/insights-sections-templates/';

?>
<div id="insights-dashboard">
	<header>
		<h1>Insights Dashboard</h1>
	</header>
	<div class="dashboard-content">
		<ul id="masonry-container">
		<?php 
			/* Display all Dahboard widgets */
			if ( function_exists( 'dynamic_sidebar' ) )
				dynamic_sidebar( 'insights-dashboard-sidebar' );
		?>
		</ul>
	</div>
</div>