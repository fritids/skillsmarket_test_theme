<?php get_header(); ?>
<?php $current_user = wp_get_current_user(); ?>
<div id="content" class="clearfix row-fluid">
	<input type="hidden" id="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>">
	<input type="hidden" id="assets_dir" value="<?php echo get_template_directory_uri(); ?>/growth-hacks/assets/">
	<input type="hidden" id="userid" value="<?php echo $current_user->ID; ?>">
	<input type="hidden" id="color-scheme-feature" value="<?php echo get_user_meta( $current_user->ID, '_growth_hack_tweet-to-unlock-color-scheme', true ); ?>">
	<div id="main" class="span12 clearfix" role="main">
		<?php if( isset( $wp_query->query_vars['hacks'] ) && get_query_var( 'hacks' ) == 1 ) { ?>
			<?php get_template_part('growth-hacks/tmp/base'); ?>
		<?php } else { ?>
			<?php get_template_part('templates/template'); ?>
		<?php } ?>
	</div> <!-- end #main -->
</div> <!-- end #content -->

<?php get_footer(); ?>