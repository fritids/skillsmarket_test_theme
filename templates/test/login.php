<div id="" class="test test-page">
	<div class="custom_login">
		<input type="hidden" id="wp_nonce" value="<?php echo wp_create_nonce('test_ajax_user_login'); ?>">
		<h2>Custom AJAX login form</h2>
		<form id="login" action="login" method="post">
			<h1>Site Login</h1>
			<p class="status"></p>
			<label for="username">Username</label>
			<input id="username" type="text" name="username">
			<label for="password">Password</label>
			<input id="password" type="password" name="password">
			<a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
			<input class="submit_button" type="submit" value="Login" name="submit">
			<a class="close" href="">(close)</a>
			<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
		</form>
	</div>
	<?php if (is_user_logged_in()) { ?>
		<a class="login_button" href="<?php echo wp_logout_url( wp_get_referer() ); ?>">Logout</a>
	<?php } else { ?>
		<a class="login_button" id="show_login" href="">Login</a>
	<?php } ?>
</div>