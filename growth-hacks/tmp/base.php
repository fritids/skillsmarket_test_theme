<?php

global $wp_query, $current_user;

$current_user = wp_get_current_user();

if( isset( $wp_query->query_vars['hack_term'] ) ) {
	$hack_name = ucfirst(str_replace('-', ' ', get_query_var('hack_term')));
	echo '<div class="crumbs"><a href="'.home_url().'/hacks/">Growth Hacks</a> | <span>'.$hack_name.'</span></div>';
	get_template_part( 'growth-hacks/tmp/' . get_query_var( 'hack_term' ) );
}
else
	get_template_part( 'growth-hacks/tmp/home' );