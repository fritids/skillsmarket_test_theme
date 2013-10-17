<?php if (is_user_logged_in()) { ?>
	<a class="login_button" href="<?php echo wp_logout_url( wp_get_referer() ); ?>">Logout</a>
<?php } else { ?>
	<div id="" class="test test-page">
		<div class="custom_register">
			<div class="form-wrapper">
				<h2 class="register-heading"><?php _e( 'Sign Up', 'skillsmarket' ); ?></h2>
				<div id="error-message"></div>

				<form method="post" name="st-register-form">
					<div class="form-label">
						<label for="st-username"><?php _e( 'Username', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="username" id="st-username" />
					</div>
					<div class="form-label">
						<label for="st-email"><?php _e( 'Email', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="mail" id="st-email" />
					</div>
					<div class="form-label">
						<label for="st-psw"><?php _e( 'Password', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="password" name="password" id="st-psw" />
					</div>
					<div class="form-label">
						<label for="st-fname"><?php _e( 'First Name', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="fname" id="st-fname" />
					</div>
					<div class="form-label">
						<label for="st-lname"><?php _e( 'Last Name', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="lname" id="st-lname" />
					</div>
					<div class="frm-button">
						<a href="#" class="" id="register">Register</a>
					</div>
				</form>
			</div>
		</div>
	</div><?php
}