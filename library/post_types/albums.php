<?php
function register_custom_post_type_albums() {
	$labels = array(
		'name' => 'Albums',
		'singular_name'      => 'Album',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Album',
		'edit_item'          => 'Edit Album',
		'new_item'           => 'New Album',
		'all_items'          => 'All Albums',
		'view_item'          => 'View Album',
		'search_items'       => 'Search Albums',
		'not_found'          => 'No albums found',
		'not_found_in_trash' => 'No albums found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Albums'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'album' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'album', $args );
}
add_action( 'init', 'register_custom_post_type_albums' );

//add filter to ensure the text Album, or album, is displayed when user updates a album

function albums_updated_messages( $messages ) {
	global $post, $post_ID;

	$messages['album'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Album updated. <a href="%s">View album</a>', ''), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', ''),
		3 => __('Custom field deleted.', ''),
		4 => __('Album updated.', ''),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Album restored to revision from %s', ''), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Album published. <a href="%s">View album</a>', ''), esc_url( get_permalink($post_ID) ) ),
		7 => __('Album saved.', ''),
		8 => sprintf( __('Album submitted. <a target="_blank" href="%s">Preview album</a>', ''), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Album scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview album</a>', ''),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Album draft updated. <a target="_blank" href="%s">Preview album</a>', ''), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'albums_updated_messages' );

//display contextual help for Albums

function albums_add_help_text( $contextual_help, $screen_id, $screen ) {
	//$contextual_help .= var_dump( $screen ); // use this to help determine $screen->id
	if ( 'album' == $screen->id ) {
		$contextual_help =
		'<p>' . __('Things to remember when adding or editing a album:', 'your_text_domain') . '</p>' .
		'<ul>' .
		'<li>' . __('Specify the correct genre such as Mystery, or Historic.', 'your_text_domain') . '</li>' .
		'<li>' . __('Specify the correct writer of the album.  Remember that the Author module refers to you, the author of this album review.', 'your_text_domain') . '</li>' .
		'</ul>' .
		'<p>' . __('If you want to schedule the album review to be published in the future:', 'your_text_domain') . '</p>' .
		'<ul>' .
		'<li>' . __('Under the Publish module, click on the Edit link next to Publish.', 'your_text_domain') . '</li>' .
		'<li>' . __('Change the date to the date to actual publish this article, then click on Ok.', 'your_text_domain') . '</li>' .
		'</ul>' .
		'<p><strong>' . __('For more information:', 'your_text_domain') . '</strong></p>' .
		'<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>', 'your_text_domain') . '</p>' .
		'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'your_text_domain') . '</p>';
	} 
	elseif ( 'edit-album' == $screen->id ) {
		$contextual_help =
		'<p>' . __('This is the help screen displaying the table of Albums blah blah blah.', 'your_text_domain') . '</p>' ;
	}
	return $contextual_help;
}
add_action( 'contextual_help', 'albums_add_help_text', 10, 3 );

function albums_custom_help_tab() {

	$screen = get_current_screen();

	// Return early if we're not on the album post type.
	if ( 'album' != $screen->post_type )
		return;

	// Setup help tab args.
	$args = array(
		'id'      => 'rumbler_albums_help', //unique id for the tab
		'title'   => 'Albums Help', //unique visible title for the tab
		'content' => '<h3>What do you need to know about Albums</h3><p>Help content</p>',  //actual help text
	);

	// Add the help tab.
	$screen->add_help_tab( $args );

}
add_action('admin_head', 'albums_custom_help_tab');