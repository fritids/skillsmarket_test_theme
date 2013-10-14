<?php

/* Insights Dashboard sidebar */

if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
		'name' => 'Insights Dashboard Sidebar',
		'id' => 'insights-dashboard-sidebar',
		'description' => 'Appears as the widgets holder on the custom Dashboard page',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}