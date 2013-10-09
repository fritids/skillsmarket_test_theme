jQuery(function($) {
	$("a[href=\"#\"]").on( "click", function( event ) {
		event.preventDefault();
	});
	
	$( ".unlock-with-tweet" ).dialog({
		width: 455,
		height: 511,
		autoOpen: false,
		resizable: false,
		modal: true,
		draggable: false,
		dialogClass: "unlock-with-tweet",
		closeOnEscape: false
	});
	// Link to open the dialog
	$( "#save_color_scheme" ).button().click( function() {
		$('span.saved').remove();
		if( $('input#color-scheme-feature').val() == "unlocked" ) {
			imitate_save_settings();
		}
		else {
			$( ".modal" ).dialog( "open" );
		}
	});
	// Close modal
	$('.close-modal').click(function() {
		$( ".modal" ).dialog( "close" );
	})

	var API_URL = "http://cdn.api.twitter.com/1/urls/count.json";
    var TWEET_URL = "https://twitter.com/intent/tweet";

	$(".tweet").each(function() {
		var elem = $(this);
		// Use current page URL as default link
		var url = encodeURIComponent(elem.attr("data-url") || document.location.href);
		// Use page title as default tweet message
		var text = elem.attr("data-text") || document.title;
		var related = encodeURIComponent(elem.attr("data-related")) || "";
		var hashtags = encodeURIComponent(elem.attr("data-hashtags")) || "";

		// Set href to tweet page
		elem.attr({
			href: TWEET_URL + "?hashtags=" + hashtags + "&original_referer=" +
			encodeURIComponent(document.location.href) + "&related=" + related +
			"&source=tweetbutton&text=" + text + "&url=" + url,
			target: "_blank"
		});
	});

	$(".social img").hover(function () {
		$(this).attr("src",$(this).attr("src").replace('-normal','-hover'));
	}, function() {
		$(this).attr("src",$(this).attr("src").replace('-hover','-normal'));
	});
});
jQuery(document).ready(function($) {
	twttr.ready(function (twttr) {
		//######## trigger when the user publishes his tweet
		twttr.events.bind('tweet', function(event) {

			$('[data-step="1"]').hide(10);
			$('#tweet').html('<div class="ajax_loader large"></div>');
			
			ajax_update_color_scheme_status();
		});
	});
});
function ajax_update_color_scheme_status() {
	var assets_dir = jQuery('input#assets_dir').val();
	var userID = jQuery('input#userid').val();
	var ajax_url = jQuery('input#ajax_url').val();
	jQuery.ajax({
		url: ajax_url, 
		type: 'POST',
		data: {
			action: 'AJAX_SM_unlock_color_scheme_feature',
			user_id: userID
		}, 
		success: function(response) {
			if( response == "unlocked" ) {
				jQuery('button#save_color_scheme').attr('data-feature-unlocked','unlocked');
				jQuery('input#color-scheme-feature').val('unlocked');
				jQuery('.ajax_loader.large').remove();
				jQuery('#tweet').parents('.tweet-frame')
					.addClass('tweet-posted')
					.html('<img src="'+assets_dir+'yuss.png" border="0"><br/><h2>Now we\'ll let you get back to it!');
				jQuery('input#tweet_sent').val(1);
				jQuery('#demo-data .color_scheme_status').html('Feature <span class="name">unlocked</span>');

				imitate_save_settings();

				setTimeout(function() {
					jQuery('span.saved').fadeOut(3000, function(){
						jQuery(this).remove();
					})
					jQuery( '.ui-dialog.unlock-with-tweet' ).fadeOut(1000, function(){
						jQuery('.modal').dialog('close');
					})
				}, 1000);
			}
			else
				jQuery('#tweet').parents('.tweet-frame').html("Sorry... Didn't work...");
		},
		error: function(xhr,textStatus,errorThrown) {
			alert(errorThrown);
		}
	});	
}
function imitate_save_settings() {
	jQuery('.ajax_loader.small').css('display','inline-block');
	setTimeout(function() {
		jQuery('.ajax_loader.small').css('display', 'none');
		jQuery('.ajax_loader.small').after('<span class="saved">Color scheme saved!</span>');
		jQuery('span.saved').fadeOut(3000)
	}, 2000);
}
