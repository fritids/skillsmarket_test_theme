<div id="" class="test test-page">
	<div class="locate_me">
		<input type="hidden" id="wp_nonce" value="<?php echo wp_create_nonce('test_ajax_get_country_code'); ?>">
		<h2>My location on a map</h2>
		<h4 id="coordinates">
			My location: <span class="my-location"></span>
			<span class="country_code" id="ajax_loader" style="display: none;">
				<img src="<?php echo get_template_directory_uri(); ?>/library/img/fb_loader.gif" border="0">
			</span>
		</h4>
		<div id="map-canvas"></div>
	</div>
</div>