<?php
global $current_user;
$color_scheme_lock_status = get_user_meta( $current_user->ID, '_growth_hack_tweet-to-unlock-color-scheme', true ); ?>
<?php //update_user_meta( $current_user->ID, '_growth_hack_tweet-to-unlock-color-scheme', "locked" ); ?>
<div id="tweet-to-unlock">
	<?php $feature_unlocked = ( $color_scheme_lock_status == "unlocked" ) ? true : false; ?>

	<div class="wrapper">
		<header><?php echo "<h2>Change color scheme feature</h2>"; ?></header>
		<form>
			<div id="demo-data">
				<span class="user_name">User: <span class="name"><?php echo $current_user->display_name; ?></span></span>
				<span class="user_role">Role: <span class="name"><?php echo $current_user->roles[0]; ?></span></span>
				<span class="color_scheme_status">Feature <span class="name"><?php echo $color_scheme_lock_status; ?></span></span>
			</div>
			<button id="save_color_scheme" type="button" data-feature-unlocked="<?php echo $color_scheme_lock_status; ?>">Save color scheme</button>
			<span class="ajax_loader small" style="display:none"></span>
		</form>
		<div class="modal unlock-with-tweet step-one" style="display:none">
			<span class="close-modal"><img src="<?php echo growth_hacks_assets_dir(); ?>cross.png" border="0" alt=""></span>
			<h1 data-step="1">Tweet to<br/>save this colour<br/>scheme</h1>
			<div data-step="1" class="floppy"><img src="<?php echo growth_hacks_assets_dir(); ?>floppy.png" border="0" alt=""></div>
			<div data-step="1" class="arrow down"><img src="<?php echo growth_hacks_assets_dir(); ?>arrow-down.png" border="0" alt=""></div>
			<div data-step="1" class="tweet-button">
				<input type="hidden" id="tweet_text" value="<?php echo $tweet_text; ?>">
				<input type="hidden" id="phpid" value="<?php echo base64_encode(session_id());?>">
				<input type="hidden" id="tweet_sent" value="<?php echo $_SESSION['tweet_sent']; ?>">
				<a href="#"
					class="tweet"
					data-url="http://theskillsmarket.org"
					data-text="<?php echo $tweet_text; ?>"
					data-related="SkillsMarket"
					data-hashtags="SkillsMarket">
					<img src="<?php echo growth_hacks_assets_dir(); ?>tweet-button.png" border="0" alt="">
				</a>
			</div>
			<div data-step="2" class="tweet-frame">
				<div id="tweet"></div>
			</div>
		</div><!-- .modal -->
	</div><!-- .wrapper -->
</div><!-- .content -->