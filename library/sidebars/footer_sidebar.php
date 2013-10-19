<?php

/* Footer sidebar */

if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
		'name' => 'Skills Market Footer Sidebar',
		'id' => 'sm-footer-sidebar',
		'description' => 'Appears as the footer widgets holder',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>'
	) );
}

?>