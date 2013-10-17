<?php

function sm_modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['street_number'] = 'Street number';
	$profile_fields['administrative_area'] = 'Administrative area';
	$profile_fields['country_name'] = 'Country name';
	$profile_fields['city_name'] = 'City name';
	$profile_fields['post_code'] = 'Postal code';
	$profile_fields['latitude'] = 'Latitude';
	$profile_fields['longitude'] = 'Longitude';

	// Remove old fields
	unset($profile_fields['aim']);

	return $profile_fields;
}
add_filter('user_contactmethods', 'sm_modify_contact_methods');