<!doctype html>
<!--[if IEMobile 7 ]><html <?php language_attributes(); ?>class="no-js iem7"><![endif]-->
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title( '|', true, 'right' ); ?></title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
		<link href="<?php echo get_template_directory_uri(); ?>/growth-hacks/css/jquery-ui.min.css" rel="stylesheet">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<script id="skills-market-ajax-js" type="text/javascript">var SkillsMarket_AJAX = { ajaxurl: '<?php echo admin_url( "admin-ajax.php" ); ?>' }</script>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
		<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>

	</head>
	
	<body <?php body_class(); ?>>
				
		<header role="banner">
		
			<div id="inner-header" class="clearfix">
				
				<div class="navbar">
					<div class="navbar-inner">
						<div class="container-fluid nav-container">
							<nav role="navigation">
								<a class="brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/growth-hacks/assets/logo.png" alt="<?php echo get_bloginfo('description'); ?>">
								</a>
								
								<div id="header-right">
									<div id="top-login">
										<a href="http://www.goup.co.uk/skills-market/wp-login.php" target="_blank">Log In</a>
										<a href="http://www.goup.co.uk/skills-market/wp-login.php?action=register" target="_blank">Join Us</a>
									</div>
									<div id="navigation" class="menu-main-menu-container">
										<ul id="menu-main-menu" class="dropdown">
											<li id="menu-item-10" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-10"><a href="http://www.goup.co.uk/skills-market/" target="_blank">Home</a></li>
											<li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11"><a href="http://www.goup.co.uk/skills-market/about/" target="_blank">About</a></li>
											<li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12"><a href="http://www.goup.co.uk/skills-market/features/" target="_blank">Features</a></li>
											<li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a href="http://www.goup.co.uk/skills-market/want-to-learn/" target="_blank">Want to Learn?</a></li>
											<li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="http://www.goup.co.uk/skills-market/want-to-teach/" target="_blank">Want To Teach?</a></li>
											<li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#" target="_blank">Blog</a></li>
										</ul>
									</div>
								</div>
							</nav>							
						</div> <!-- end .nav-container -->
					</div> <!-- end .navbar-inner -->
				</div> <!-- end .navbar -->
			
			</div> <!-- end #inner-header -->
		
		</header> <!-- end header -->
		
		<div class="container-fluid">
