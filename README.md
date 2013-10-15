README
======


This is an attempt to create separate functions and hacks so they 
can be moved over to a structured template system that will be 
easier to maintain and to locate relevant code modules.

Does not require any plugins.

**Directories:**

<pre>
/growth-hacks - main directory for testing growth hacks
	/tweet-to-unlock - one of growth hacks. It has its own stylesheets
		/compass - stylesheet compiler that builds final stylesheet based on SASS partials
			/config.rb - configuration for compass compiler
			/.sass-cache - temp files used for building (should not be in git)
			/sass - source stylesheet files
			/stylesheets - compiled stylesheets to import into theme's style.css

			IMPORTANT: DO NOT EDIT FILES IN /compass/stylesheets

		/assets - images
	/css - jQuery UI stylesheet and icons
	/images - jQuery UI icons (not sure why here...)
	/javascripts - all javascript files
	/lib - repository for The Skills Market functions
	/tmp - repository for The Skills Market template files
</pre>
**Other theme directories**

<pre>
/admin - admin functions repository
/images - default layout images
/languages - language repository
/library - repository for The Skills Market current theme functions
/compass - stylesheet compiler that builds final stylesheet based on 
		   SASS partials - theme stylesheets
</pre>

**Theme files**

<pre>
/header.php - theme header file
/footer.php - theme footer file
/functions.php - theme library functions. In general, we only set up calls here
/index.php
/options.php
/style.php - WordPress theme's required stylesheet file. Should not include CSS
			 customisations - these should be done in the compass/sass folder
</pre>
