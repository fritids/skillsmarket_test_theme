	<a class="login_button" href="<?php echo wp_logout_url( wp_get_referer() ); ?>">Logout</a>
	<div id="" class="test test-page">
		<div class="custom_register">
			<div class="form-wrapper">
				<h2 class="register-heading"><?php _e( 'Register with The Skills Market', 'skillsmarket' ); ?></h2>
				<div id="error-message"></div>

				<form method="post" name="st-register-form">
					<div class="form-label">
						<label for="st-role"><?php _e( 'You are', 'skillsmarket' ); ?></label>
					</div>
					<div class="field role-select">
						<select name="info" id="st-role" class="select-block">
							<option value="teacher"><?php _e( 'Teacher', 'skillsmarket' ); ?></option>
							<option value="learner"><?php _e( 'Learner', 'skillsmarket' ); ?></option>
						</select>
					</div>
					<div class="form-label">
						<label for="st-username"><?php _e( 'Username', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="username" id="st-username" class="form-control" />
					</div>
					<div class="form-label">
						<label for="st-email"><?php _e( 'Email', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="mail" id="st-email" class="form-control" />
					</div>
					<div class="form-label">
						<label for="st-fname"><?php _e( 'First Name', 'skillsmarket' );// update_option( 'ajax_login_register_redirect', home_url() . '/insights/' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="fname" id="st-fname" class="form-control" />
					</div>
					<div class="form-label">
						<label for="st-lname"><?php _e( 'Last Name', 'skillsmarket' ); ?></label>
					</div>
					<div class="field">
						<input type="text" autocomplete="off" name="lname" id="st-lname" class="form-control" />
					</div>
					<div class="frm-button">
						<a href="#" class="btn btn-block btn-lg btn-danger" id="register">Register</a>
						<span class="ajax_loader register_loader"></span>
						<span class="ajax_action"></span>
					</div>
				</form>
			</div>
		</div>
	</div>