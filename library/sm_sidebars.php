<?php

/* Require all custom sidebars here */

$libdir = trailingslashit( get_template_directory() ) . 'library/';

require_once( $libdir . 'sidebars/insights_dashboard_sidebar.php' );
require_once( $libdir . 'sidebars/footer_sidebar.php' );