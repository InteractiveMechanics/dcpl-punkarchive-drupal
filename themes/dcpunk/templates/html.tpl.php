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
	<?php print $styles; ?>
	
    <!-- Favicon -->
    <link rel="shortcut icon" sizes="32x32 64x64" href="<?php print path_to_theme(); ?>/images/icons/favicon.png">
    
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php print path_to_theme(); ?>/images/icons/apple-touch-icon-180x180.png" />

    <!-- Facebook: OpenGraph -->
    <meta property="og:title" content="<?php print $head_title_array['title']; ?>" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php print $base_path . request_uri(); ?>">
    <meta property="og:site_name" content="<?php print $head_title_array['name']; ?>"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.1/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php  print $directory; ?>/js/audioplayer.js"></script>
    <script type="text/javascript" src="<?php print $directory; ?>/js/main.js"></script>
    
    <!-- TYPEKIT FONTS -->
    <script src="https://use.typekit.net/zby8kfw.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	
	<style type="text/css" media="screen">
		body.toolbar-drawer {
			padding-top: 2.2em;
		}
		
		.grid-item {
			cursor: pointer;
		}
		
		.overlay-content {
			position: absolute;
			top: 0;
			left: 0;
			background-color: rgba(0, 178, 238, .8);
			width: 100%;
			height: 100%;
			display: none;
		}
		
		.grid-item:hover .overlay-content {
			display: block;
		}
		
		#spaces-landing-page .map-container {
		    position: relative;
		}
	</style>
</head>
<body class="<?php print $classes; ?>">
    <?php include($directory . '/includes/header.php'); ?>
    
    <main>
        <?php print $page_top; ?>
        <?php print $page; ?>
    </main>
		
    <?php include($directory . '/includes/footer.php'); ?>
</body>
</html>
