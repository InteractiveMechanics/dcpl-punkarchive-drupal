
<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
 global $base_path;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="<?php print $head_title_array['name']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />   

	<?php print $head; ?>
	<title><?php print $head_title; ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
	<?php print $styles; ?>
	
    <!-- Favicon -->
    <link rel="shortcut icon" sizes="32x32 64x64" href="<?php print path_to_theme(); ?>/images/favicon.png">

    <!-- Facebook: OpenGraph -->
    <meta property="og:title" content="<?php print $head_title_array['title']; ?>" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php print $base_path . request_uri(); ?>">
    <meta property="og:site_name" content="<?php print $head_title_array['name']; ?>"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="http://staging.interactivemechanics.com/rememberinglincoln/themes/lincoln/assets/js/salvattore.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print $base_path; ?>themes/dcpunk/js/audioplayer.js"></script>
    <script type="text/javascript" src="<?php print $base_path; ?>themes/dcpunk/js/main.js"></script>
    
    <!-- TYPEKIT FONTS -->
    <script src="https://use.typekit.net/zby8kfw.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	
	</head>
<body class="<?php print $classes; ?>" data-spy="scroll" data-target="#dotNav" data-offset="380">
    <?php include($directory . '/includes/header.php'); ?>
    
    <main>
        <?php print $page_top; ?>
        <?php print $page; ?>
    </main>
		
    <?php include($directory . '/includes/footer.php'); ?>
    
    <script>
    	$(document).ready(function(){
	    	var current_index = localStorage.getItem('current_music_index');
	    	var music_files = localStorage.getItem('music_data');
	    	
	    	if(current_index) {
		    	var data = JSON.parse(music_files);
		    	
		    	if(current_index == 3) {
			    	current_index -=1;
		    	}
		    	
		    	$('.album-cover-placeholder').html('<img src="' + data[current_index].album_cover  + '" width="60" height="60" />')
	    	}
	    	
	    	if(Modernizr.touch) {
		    	$('body').addClass('touch-device');
	    	}
    	});
    </script>
    
    <script>

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-4879095-3', 'auto');
		ga('send', 'pageview');
	
	</script>
</body>
</html>
