<?php

// User Roles

$add_teacher_role = add_role(
	'teacher', 'Teacher', array(
		'read'         => true,  // True allows this capability
		'edit_posts'   => true,
		'delete_posts' => false, // Use false to explicitly deny
	)
);
$add_learner_role = add_role(
	'learner', 'Learner', array(
		'read'         => true,  // True allows this capability
		'edit_posts'   => true,
		'delete_posts' => false, // Use false to explicitly deny
	)
);