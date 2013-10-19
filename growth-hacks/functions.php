<?php

require_once('lib/user-growth-hacks-options.php');

require_once('lib/javascripts.php');

function growth_hacks_assets_dir() {
	return trailingslashit( get_template_directory_uri() ) . 'growth-hacks/assets/';
}