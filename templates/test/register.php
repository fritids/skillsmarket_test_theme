<a class="login_button" href="<?php echo wp_logout_url( wp_get_referer() ); ?>">Logout</a>
<div id="" class="test test-page">
	<div class="custom_register">
		<div class="form-wrapper">
			<h2 class="register-heading">Register with The Skills Market</h2>
			<div id="error-message"></div>
			<form method="post" name="st-register-form">
				<div class="form-label">
					<label for="st-role">You are</label>
				</div>
				<div class="field role-select">
					<select name="info" id="st-role" class="select-block">
						<option value="teacher">Teacher</option>
						<option value="learner">Learner</option>
					</select>
				</div>
				<div class="form-label">
					<label for="st-username">Username</label>
				</div>
				<div class="field">
					<input type="text" autocomplete="off" name="username" id="st-username" class="form-control" />
				</div>
				<div class="form-label">
					<label for="st-email">Email</label>
				</div>
				<div class="field">
					<input type="text" autocomplete="off" name="mail" id="st-email" class="form-control" />
				</div>
				<div class="form-label">
					<label for="st-fname">First Name</label>
				</div>
				<div class="field">
					<input type="text" autocomplete="off" name="fname" id="st-fname" class="form-control" />
				</div>
				<div class="form-label">
					<label for="st-lname">Last Name</label>
				</div>
				<div class="field">
					<input type="text" autocomplete="off" name="lname" id="st-lname" class="form-control" />
				</div>
				<div class="frm-button">
					<div style="display:none;visibility:hidden;width:0;height:0;padding:0;margin:0;">
						<input type="hidden" id="has_user_geo">
						<input type="hidden" id="user_lat">
						<input type="hidden" id="user_lng">
						<input type="hidden" id="gmapi">
					</div>
					<a href="#" class="btn btn-block btn-lg btn-danger" id="register">Register</a>
					<span class="ajax_loader register_loader"></span>
					<span class="ajax_action"></span>
				</div>
			</form>
		</div>
	</div>
</div>
