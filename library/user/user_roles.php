<?php
// User Roles
add_role(
	'teacher', 'Teacher', array(
		'read' => true,
		'publish_posts' => true,
		'read_class' => true,
		'edit_class' => true,
		'delete_class' => true,
		'publish_classes' => true,
		'manage_class_types' => true,
		'manage_categories' => false
	)
);
add_role(
	'learner', 'Learner', array(
		'read' => true,
		'publish_posts' => true,
		'read_class' => true,
		'edit_posts' => true,
		'delete_posts' => true
	)
);

?>