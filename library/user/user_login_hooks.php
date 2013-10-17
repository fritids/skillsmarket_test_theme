<?php

/* User login actions and hooks only */

/** Other helpful User functions
	
	You should add functions used in this
	template only

	Below...
**/

function skillsmarket_redirect_after_login() {
	if( ! is_admin() )
		return home_url() . '/insights/';
	else
		return admin_url();
}
add_filter('login_redirect', 'skillsmarket_redirect_after_login');