<?php

function sm_modify_contact_methods($profile_fields) {

	// Remove old fields
	unset($profile_fields['aim']);

	return $profile_fields;
}
add_filter('user_contactmethods', 'sm_modify_contact_methods');