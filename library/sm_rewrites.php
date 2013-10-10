<?php
/* A bunch of rewrite rules */

add_filter("query_vars", "add_sm_query_vars");
function add_sm_query_vars ($qvars) {
	$qvars[] = "dashboard";
	return $qvars;
}

// hook add_sm_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_sm_rewrite_rules');
function add_sm_rewrite_rules($aRules) {
	$aNewRules = array(
	  'dashboard/?$' => 'index.php?insights_dashboard=1',
	);
	$aRules = $aNewRules + $aRules;
	return $aRules;
}