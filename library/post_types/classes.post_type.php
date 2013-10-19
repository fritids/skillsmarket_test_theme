<?php
function register_custom_post_type_clases() {
	$labels = array(
		'name' => 'Classes',
		'singular_name'      => 'Class',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Class',
		'edit_item'          => 'Edit Class',
		'new_item'           => 'New Class',
		'all_items'          => 'All Classs',
		'view_item'          => 'View Class',
		'search_items'       => 'Search Classes',
		'not_found'          => 'No classes found',
		'not_found_in_trash' => 'No classes found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Classes'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'class' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'class', $args );
}
add_action( 'init', 'register_custom_post_type_clases' );

//add filter to ensure the text Class, or class, is displayed when user updates a class

function classes_updated_messages( $messages ) {
	global $post, $post_ID;

	$messages['class'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Class updated. <a href="%s">View class</a>', ''), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', ''),
		3 => __('Custom field deleted.', ''),
		4 => __('Class updated.', ''),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Class restored to revision from %s', ''), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Class published. <a href="%s">View class</a>', ''), esc_url( get_permalink($post_ID) ) ),
		7 => __('Class saved.', ''),
		8 => sprintf( __('Class submitted. <a target="_blank" href="%s">Preview class</a>', ''), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Class scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview class</a>', ''),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Class draft updated. <a target="_blank" href="%s">Preview class</a>', ''), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'classes_updated_messages' );

//display contextual help for Classes

function classes_add_help_text( $contextual_help, $screen_id, $screen ) {
	//$contextual_help .= var_dump( $screen ); // use this to help determine $screen->id
	if ( 'class' == $screen->id ) {
		$contextual_help =
		'<p>' . __('Things to remember when adding or editing a class:', 'your_text_domain') . '</p>' .
		'<ul>' .
		'<li>' . __('Specify the correct genre such as Mystery, or Historic.', 'your_text_domain') . '</li>' .
		'<li>' . __('Specify the correct writer of the class.  Remember that the Author module refers to you, the author of this class review.', 'your_text_domain') . '</li>' .
		'</ul>' .
		'<p>' . __('If you want to schedule the class review to be published in the future:', 'your_text_domain') . '</p>' .
		'<ul>' .
		'<li>' . __('Under the Publish module, click on the Edit link next to Publish.', 'your_text_domain') . '</li>' .
		'<li>' . __('Change the date to the date to actual publish this article, then click on Ok.', 'your_text_domain') . '</li>' .
		'</ul>' .
		'<p><strong>' . __('For more information:', 'your_text_domain') . '</strong></p>' .
		'<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>', 'your_text_domain') . '</p>' .
		'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'your_text_domain') . '</p>';
	} 
	elseif ( 'edit-class' == $screen->id ) {
		$contextual_help =
		'<p>' . __('This is the help screen displaying the table of Classes blah blah blah.', 'your_text_domain') . '</p>' ;
	}
	return $contextual_help;
}
add_action( 'contextual_help', 'classes_add_help_text', 10, 3 );

function classes_custom_help_tab() {

	$screen = get_current_screen();

	// Return early if we're not on the class post type.
	if ( 'class' != $screen->post_type )
		return;

	// Setup help tab args.
	$args = array(
		'id'      => 'sm_classes_help', //unique id for the tab
		'title'   => 'Classes Help', //unique visible title for the tab
		'content' => '<h3>What do you need to know about Classes</h3><p>Help content</p>',  //actual help text
	);

	// Add the help tab.
	$screen->add_help_tab( $args );

}
add_action('admin_head', 'classes_custom_help_tab');

?>