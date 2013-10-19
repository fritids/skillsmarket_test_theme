<?php

/**
 * Add Class types taxonomy
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
	// Add new "Classes" taxonomy to Posts
	register_taxonomy( 'class-types-taxonomy', 'class', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Class types', 'taxonomy general name' ),
			'singular_name' => _x( 'Class type', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Class types' ),
			'all_items' => __( 'All Class types' ),
			'parent_item' => __( 'Parent Class type' ),
			'parent_item_colon' => __( 'Parent Class type:' ),
			'edit_item' => __( 'Edit Class type' ),
			'update_item' => __( 'Update Class type' ),
			'add_new_item' => __( 'Add New Class type' ),
			'new_item_name' => __( 'New Class type Name' ),
			'menu_name' => __( 'Class types' ),
		),
		'show_ui' => true,
		'query_var' => 'class-type',
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'class-type', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/classes/"
			'hierarchical' => true // This will allow URL's like "/classes/guitar-class/advanced/"
		),
	));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

?>