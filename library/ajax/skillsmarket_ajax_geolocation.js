$(document).ready(function() {
   
   // Try HTML5 geolocation
   if (navigator.geolocation) {
      var timeoutVal = 10 * 1000 * 1000;
      navigator.geolocation.getCurrentPosition(
         sm_get_user_geolocation_test,
         displayError, {
            enableHighAccuracy: true,
            timeout: timeoutVal,
            maximumAge: 0
         }
      );
   }
   else {
      alert("Geolocation is not supported by this browser");
   }

});

/* Add Coordinates */
var map, latlng;
var geocoder = new google.maps.Geocoder();

google.maps.event.addDomListener(window, 'load', initialize); // Add Event Listener

function initialize() {
   var mapOptions = {
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP
   };
   if( $('body').hasClass('geolocation-test') ) {
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      // Try HTML5 geolocation
      if(navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            var infowindow = new google.maps.InfoWindow({
               map: map,
               position: pos,
               content: 'The SkillsMarket knows where you are mate...'
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

/* ################################################################################# */
/* AJAX FUNCTIONS */

/* Get user geo location details */
function sm_get_user_geolocation_test(position) {
   var sm_lat = position.coords.latitude;
   var sm_long = position.coords.longitude;
   var nonce = $('#wp_nonce').val();
   var ajax_loader = $('span#ajax_loader.country_code');
   var maps_api_url = 'http://maps.googleapis.com/maps/api/geocode/json';

   ajax_loader.show();

   $.ajax({
      data: {
         action: "TEST_AJAX_Get_Geocode",
         from: maps_api_url+"?latlng="+sm_lat+","+sm_long+"&sensor=false"
      },
      success: function(geolocation) {
         $('.my-location').html(geolocation);
         ajax_loader.hide();
      }
   });
}

function displayError(error) {
   var errors = {
      1: 'Permission denied',
      2: 'Position unavailable',
      3: 'Request timeout'
   };
   alert("Error: " + errors[error.code]);
}