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
      			<a class="navbar-brand" href="<?php print $base_path; ?>"><span><?php print $head_title_array['name']; ?></span></a>
    		</div>
    
        	<!-- Collect the nav links, forms, and other content for toggling -->
    	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	      	<ul class="nav navbar-nav">
                    <?php foreach($main_menu as $menu): ?>
                        <?php 
                            $title = menu_get_active_title();
                            if ($title == $menu['link_title']) { $active = true; } else { $active = false; }
                        ?>
                        <?php if($menu['link_path'] != 'culture'): ?>
							<li <?php if($active){ echo "class='active'"; } ?>><a href="<?php print $base_path . drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a></li>
						<?php endif; ?>
					<?php endforeach; ?>
					<li><a href="<?php print $base_path; ?>search" id="search-link"><svg version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 					viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
						<g>
							<path d="M87.6,76.3L66.4,55c3.2-5.3,5.1-11.5,5.1-18.1c0-19.1-16.6-35.8-35.9-35.8S0.8,16.6,0.8,35.9s16.6,35.9,35.9,35.9
								c6.4,0,12.4-1.7,17.5-4.7l21.4,21.4c2.1,2.1,5.5,2.1,7.5,0l5.3-5.3C90.5,81,89.8,78.4,87.6,76.3z M11.5,35.9
								c0-13.3,10.8-24.1,24.1-24.1c13.4,0,25.2,11.8,25.2,25.2c0,13.3-10.8,24.1-24.1,24.1C23.4,61.1,11.5,49.2,11.5,35.9z"/>
						</g>
						</svg></a></li>
    				<!--<li>
                        <a href="<?php print $base_path . drupal_get_path_alias('search') ?>" id="search-link">
                            <?php include($directory . '/images/icon-search.svg') ?>
                        </a>
                    </li>-->
    	      	</ul>
    	      	<a class="hidden-sm hidden-xs audio-player-area" href="<?php print path_to_theme(); ?>/audioplayer.php" onclick="window.open(this.href, 'mywin','right=20,bottom=20,width=450,height=100, titlebar=no, scrollbars=no, resizable=no, location=no, menubar=no'); return false;">
    		      	<div id="audioplayer">
    		      		<div class="album-cover-placeholder">
                            <div id="nowPlay">
    				        	<div id="npAction"></div>
    				        </div>
    				    </div> <!-- END ALBUM -->
    		    		<h6>Listen now</h6>
          				<h2>DCPL Playlist</h2>
    		        </div> <!-- END #AUDIOPLAYER -->
    	        </a>
    		</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>