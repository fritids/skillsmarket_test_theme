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
		<?php get_template_part( $insights_sections . 'teachers' ); // load Teachers ?>
		<?php get_template_part( $insights_sections . 'students' ); // load Students ?>
		<?php get_template_part( $insights_sections . 'classes' ); // load Students ?>
	</div>
</div>