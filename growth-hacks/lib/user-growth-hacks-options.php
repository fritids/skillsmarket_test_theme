<?php

// User growth hacks options

// Add options after user registration
add_action('user_register', 'myplugin_registration_save');
function myplugin_registration_save($user_id) {
	add_user_meta( $user_id, '_growth_hack_tweet-to-unlock-color-scheme', 0 );
}