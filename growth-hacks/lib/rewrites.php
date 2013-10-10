<?php

/* A bunch of rewrite rules */

add_filter("query_vars", "add_hacks_query_vars");
function add_hacks_query_vars ($qvars) {
	$qvars[] = "hacks";
	$qvars[] = "hack_term";
	return $qvars;
}

// hook add_hacks_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_hacks_rewrite_rules');
function add_hacks_rewrite_rules($aRules) {
	$aNewRules = array(
	  'hacks/?$' => 'index.php?hacks=1',
	  'hacks/([^/]+)/?$' => 'index.php?hacks=1&hack_term=$matches[1]',
	);
	$aRules = $aNewRules + $aRules;
	return $aRules;
}