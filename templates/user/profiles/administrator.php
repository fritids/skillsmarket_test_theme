<?php

global $wp_query, $current_user;

?>

<div id="profile" class="span12">
	<div id="top-card" class="clearfix">
		<div id="user_vcard" class="clearfix">
			<div class="profile-picture profile-photo-hover clearfix">
				<?php echo get_wp_user_avatar( $current_user->ID, 150, 'left' ); ?>
			</div>
			<div class="profile-overview">
				<div class="profile-overview-content">
					<div id="member-<?php echo $current_user->ID; ?>" class="masthead">
						<div class="account-icons">
							<div id="badge-container">
								<div id="badge" class=""></div>
							</div>
						</div>
						<div id="user_basic_info_panel">
							<div id="user_name">
								<h1>
									<span class="fn"><?php echo $current_user->display_name; ?></span>
								</h1>
							</div>
							<div id="headline-container">
								<div id="headline" class="">
									<p class="title"><?php echo $current_user->roles[0]; ?></p>
								</div>
							</div>
						</div>
						<div class="demographic-info" id="demographics">
							<div id="location-container">
								<div id="location">
									<dl>
										<dt>Location</dt>
										<dd>
											<span class="locality">
												<?php echo get_user_meta( $current_user->ID, '_geolocation', true ); ?>
											</span>
										</dd>
										<dt>Industry</dt>
										<dd>
											<span class="industry">
												<?php echo get_user_meta( $current_user->ID, '_industry', true ); ?>
											</span>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>