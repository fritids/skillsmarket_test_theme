<?php

// User growth hacks options

// Add options after user registration
add_action('user_register', 'growth_hacks_registration_save');
function growth_hacks_registration_save($user_id) {
	add_user_meta( $user_id, '_growth_hack_tweet-to-unlock-color-scheme', "locked" );
}