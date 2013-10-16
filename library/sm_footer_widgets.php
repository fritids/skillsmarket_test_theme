<?php

/* Insights Dashboard widgets only */

// register all Insights widgets
function sm_register_footer_widgets() {
    register_widget( 'Skills_Market_Footer_Rights' ); // Copyrights widget
    register_widget( 'Skills_Market_Footer_Sitemap' ); // The Skills Market sitemap
    register_widget( 'Skills_Market_Footer_Social' ); // The Skills Market Social links
    register_widget( 'Skills_Market_Footer_Supporters' ); // The Skills Market Supporters
}
add_action( 'widgets_init', 'sm_register_footer_widgets' );

/**
 * Adds Copyrights widget.
 */
class Skills_Market_Footer_Rights extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Skills_Market_Footer_Rights', // Base ID
			__('Footer - Copyright', 'skillsmarket'), // Name
			array( 'description' => __( 'A Copyright footer widget', 'skillsmarket' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		get_template_part('templates/footer/widgets/copyright');

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	}

} // class Copyright

/**
 * Adds Sitemap widget.
 */
class Skills_Market_Footer_Sitemap extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Skills_Market_Footer_Sitemap', // Base ID
			__('Footer - Sitemap', 'skillsmarket'), // Name
			array( 'description' => __( 'A sitemap footer widget', 'skillsmarket' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		get_template_part('templates/footer/widgets/sitemap');

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	}

} // class Sitemap

/**
 * Adds Social widget.
 */
class Skills_Market_Footer_Social extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Skills_Market_Footer_Social', // Base ID
			__('Footer - Social', 'skillsmarket'), // Name
			array( 'description' => __( 'A social footer widget', 'skillsmarket' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		get_template_part('templates/footer/widgets/social');

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	}

} // class Social

/**
 * Adds Supporters widget.
 */
class Skills_Market_Footer_Supporters extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Skills_Market_Footer_Supporters', // Base ID
			__('Footer - Supporters', 'skillsmarket'), // Name
			array( 'description' => __( 'A supporters footer widget', 'skillsmarket' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		get_template_part('templates/footer/widgets/supporters');

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	}

} // class Social