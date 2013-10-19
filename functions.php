<?php

$libdir = trailingslashit( get_template_directory() ) . 'library/';
// Get Bones Core Up & Running!
require_once( $libdir.'bones.php' ); // core functions (don't remove)
require_once( $libdir.'plugins.php' ); // plugins & extra functions (optional)

// Options panel
require_once( $libdir.'options-panel.php' );

// Shortcodes
require_once( $libdir.'shortcodes.php' );

// The Skills Market growth hacks
require_once( 'growth-hacks/functions.php' );
require_once( 'growth-hacks/lib/ajax.php' );
require_once( $libdir.'theskillsmarket.php' );


// Admin Functions (commented out by default)
require_once( 'library/admin.php' ); // custom admin functions


// Set content width
if ( ! isset( $content_width ) ) $content_width = 970;

require_once( $libdir.'bones_functions.php');

?>