<?php

global $wp_query;

$username = str_replace('%20', '', get_query_var( 'sm_term' ));
$current_user = get_userdatabylogin( $username );

$user_role = $current_user->roles[0];

$user_location = get_user_meta( $current_user->ID, '_geolocation', true );
$user_location = unserialize( $user_location );

$lat = $user_location->results[0]->geometry->location->lat;
$lng = $user_location->results[0]->geometry->location->lng;

$street_number = $user_location->results[0]->address_components[0]->long_name;
$street_name = $user_location->results[0]->address_components[1]->long_name;
$short_street_name = $user_location->results[0]->address_components[1]->short_name;
$administrative_area = $user_location->results[0]->address_components[2]->long_name;
$short_administrative_area = $user_location->results[0]->address_components[2]->short_name;
$country_name = $user_location->results[0]->address_components[3]->long_name;
$short_country_name = $user_location->results[0]->address_components[3]->short_name;
$city_name = $user_location->results[0]->address_components[5]->long_name;
$post_code = $user_location->results[1]->address_components[0]->long_name;

$geometry_lat = $user_location->results[0]->geometry->location->lat;
$geometry_lng = $user_location->results[0]->geometry->location->lng;

$formatted_address = $street_number . ' ' . $street_name . ', ' . $city_name . ' ' . $post_code . ', ' . $administrative_area . ', ' . $country_name;

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
												<?php echo $formatted_address; ?>
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
	</div><!-- top-card -->
	<div id="background">

	</div>
</div>