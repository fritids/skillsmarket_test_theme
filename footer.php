		</div> <!-- end #container -->
		<footer role="contentinfo" class="footer">
			<div id="inner-footer" class="clearfix">
				<ul class="wrapper">
					<?php 
						/* Display all Dahboard widgets */
						if ( function_exists( 'dynamic_sidebar' ) )
							dynamic_sidebar( 'sm-footer-sidebar' );
					?>
				</ul>
			</ul> <!-- end #inner-footer -->
		</footer> <!-- end footer -->
		<!--[if lt IE 7 ]>
			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<?php wp_footer(); // js scripts are inserted using this function ?>
	</body>
</html>