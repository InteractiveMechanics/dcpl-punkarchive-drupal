
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="http://staging.interactivemechanics.com/rememberinglincoln/themes/lincoln/assets/js/salvattore.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print $base_path; ?>themes/dcpunk/js/audioplayer.js"></script>
    <script type="text/javascript" src="<?php print $base_path; ?>themes/dcpunk/js/main.js"></script>
    
    <!-- TYPEKIT FONTS -->
    <script src="https://use.typekit.net/zby8kfw.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	
	<style type="text/css" media="screen">
		body.toolbar-drawer {
			padding-top: 2.2em;
		}
		
/*
		#spaces-landing-page .map-container {
		    position: relative;
		}
*/
		
		.views-exposed-form {
			display: none !important;
		}
		
		@media screen and (max-width: 768px) {
			header .navbar-nav li > a:hover:after {
	            background: none;
	        }
	        
	        header .navbar-nav li > a:after {
	            background: none;
	        }
		}
		
		p.breadcrumbs {
			font-size: 13px;
			text-transform: uppercase;
			color: #BFB9B6;
			font-weight: 700;
		}
		
		
.form-item {
  margin: 0 0 20px; }
  .form-item label:not(.option) {
    font-size: 14px;
    text-transform: uppercase;
    color: #BFB9B6;
    display: block; }
  .form-item label.option {
    margin-left: 6px;
    top: 4px;
    position: relative;
    font-size: 16px; }
  .form-item input[type="password"],
  .form-item input[type="text"],
  .form-item input[type="email"],
  .form-item textarea {
    height: 44px;
    background: #f1f2f2;
    border: 1px solid #e4e6e6;
    border-radius: 6px;
    padding: 6px 14px 8px;
    box-shadow: none;
    width: 100%;
    transition: all 0.25s;
    font-size: 16px;
    font-weight: 300; }
    .form-item input[type="password"]:focus, .form-item input[type="password"]:hover, .form-item input[type="password"]:active,
    .form-item input[type="text"]:focus,
    .form-item input[type="text"]:hover,
    .form-item input[type="text"]:active,
    .form-item input[type="email"]:focus,
    .form-item input[type="email"]:hover,
    .form-item input[type="email"]:active,
    .form-item textarea:focus,
    .form-item textarea:hover,
    .form-item textarea:active {
      box-shadow: 0 0 8px rgba(26, 135, 200, 0.45);
      outline: none; }
  .form-item textarea {
    height: auto; }

.webform-submit {
  margin: 0 auto;
  display: block; }
  
.webform-submit {
    background: white;
    border: 3px solid #acd156;
    font-weight: 600;
    font-size: 18px;
    font-style: italic;
    padding: 12px 30px 14px;
    color: #acd156;
    transition: all 0.25s;
}

.webform-submit:hover {
	color:white;
	background: #acd156;
}

/*
#search-page label {
	font-size: 14px;
    text-transform: uppercase;
    color: #BFB9B6;
    display: block;
}
*/
  	@media screen and (max-width: 768px){
    	.grid-item {
	    	width:100% !important;
    	}
	}
	
/*
	@media screen and (max-width: 640px){
    	#spaces-landing-page .table_letter_border {
	    	text-align: center;
	    	border: none;
    	}
    	
    	.space-text {
	    	text-align: center;
	    	margin: 15px 0;
    	}
	}
*/
	
	.touch-device .grid .grid-item .overlay-content {
		opacity: 1 !important;
	}
	
	a.navbar-brand span {
		background: url(<?php print $base_path; ?>themes/dcpunk/images/grunge-texture.jpg)repeat;
		color: transparent;
    	-webkit-background-clip: text;
    	-moz-background-clip: text;
    	
    	-webkit-text-fill-color: transparent;
    	-moz-text-fill-color: transparent;
    	background-position-y: -230px;
	}
	
.hero-unit.error  .jumbotron{
    margin: 0;
    border: none;
    background: url(../themes/dcpunk/images/404.jpg) !important;
    height:650px;
    background-position-y:200px;
}

.digdc-link {
	padding-left: 10px;
}

@media screen and (max-width: 1074px){
    .audio-player-area {
	    display: none;
    }
}
	</style>
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
