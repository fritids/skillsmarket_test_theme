<?php

/* Insights Dashboard */

global $wp_query, $current_user;

$insights_sections = 'templates/dashboard/insights-sections-templates/';

?>
<div id="insights-dashboard">
	<header>
		<h1>Insights Dashboard</h1>
	</header>
	<div class="dashboard-content">
		<ul id="masonry-container">
		<?php 
			/* Display all Dahboard widgets */
			if ( function_exists( 'dynamic_sidebar' ) )
				dynamic_sidebar( 'insights-dashboard-sidebar' );
		?>
		</ul>
	</div>
</div>
<div id="map-canvas"></div>
<!--
	Include the maps javascript with sensor=true because this code is using a
	sensor (a GPS locator) to determine the user's location.

-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
var map;

function initialize() {
	var mapOptions = {
		zoom: 6,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	// Try HTML5 geolocation
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

			var infowindow = new google.maps.InfoWindow({
				map: map,
				position: pos,
				content: position.coords.latitude+', '+position.coords.longitude
			});

			map.setCenter(pos);
		}, function() {
			handleNoGeolocation(true);
		});
	} else {
		// Browser doesn't support Geolocation
		handleNoGeolocation(false);
	}
}

function handleNoGeolocation(errorFlag) {
	if (errorFlag) {
		var content = 'Error: The Geolocation service failed.';
	} else {
		var content = 'Error: Your browser doesn\'t support geolocation.';
	}

	var options = {
		map: map,
		position: new google.maps.LatLng(60, 105),
		content: content
	};

	var infowindow = new google.maps.InfoWindow(options);
	map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);
//http://ws.geonames.org/countryCode?lat=51.517098999999995&lng=-0.146084
</script>
