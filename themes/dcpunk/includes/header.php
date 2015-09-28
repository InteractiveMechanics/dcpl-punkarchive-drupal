<?php
 global $base_path;
 $main_menu = menu_load_links('main-menu');
?>
<header>
	<nav class="navbar navbar-default navbar-inverse">
		<div class="container-fluid">
    	 	<!-- Brand and toggle get grouped for better mobile display -->
    		<div class="navbar-header">
    	     	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    	        <span class="sr-only">Toggle navigation</span>
    	        <span class="icon-bar"></span>
    	        <span class="icon-bar"></span>
    	        <span class="icon-bar"></span>
    	      	</button>
      			<a class="navbar-brand" href="<?php print $base_path; ?>">DC Punk Archive</a>
    		</div>
    
        	<!-- Collect the nav links, forms, and other content for toggling -->
    	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	      	<ul class="nav navbar-nav">
                    <?php foreach($main_menu as $menu): ?>
						<li><a href="<?php print $base_path . drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a></li>
					<?php endforeach; ?>
    				<li>
                        <a href="<?php print $base_path . drupal_get_path_alias('search') ?>" id="search-link">
                            <?php include($directory . '/images/icon-search.svg') ?>
                        </a>
                    </li>
    	      	</ul>
    	      	<a href="<?php print path_to_theme(); ?>/audioplayer.php" onclick="window.open(this.href, 'mywin','right=20,bottom=20,width=450,height=100, titlebar=no, scrollbars=no, resizable=no, location=no, menubar=no'); return false;">
    		      	<div id="audioplayer">
    		      		<div class="album-cover-placeholder">
                            <div id="nowPlay">
    				        	<div id="npAction"></div>
    				        </div>
    				    </div> <!-- END ALBUM -->
    		    		<h6>Listen now</h6>
          				<h2>DC Punk Mix</h2>
    		        </div> <!-- END #AUDIOPLAYER -->
    	        </a>
    		</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>