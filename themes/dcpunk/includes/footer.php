<?php
 global $base_path;
 $footer_menu = menu_load_links('menu-footer-menu');
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<ul class="footer-nav">
                    <?php foreach($footer_menu as $menu): ?>
					    <li><a href="<?php print $base_path . drupal_get_path_alias($menu['link_path']) ?>"><?php print $menu['link_title'] ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="https://dclibrary.org/contact">Contact Us</a></li>
				</ul>
			</div> 		
		</div> <!-- END ROW -->
	</div> <!-- END CONTAINER -->
	<div class="divider"></div>
	<div class="container">
		<div class="row">
			<div class="address-block">
				<p><a href="http://www.dclibrary.org"><img src="<?php print $base_path . $directory; ?>/images/logo-dcpl.svg" alt="DC Public Library logo" id="logo"></a></p>
				<p class="copyright"><small>Copyright &copy; <?php echo date('Y'); ?> DC Public Library. All rights reserved.</small></p>
				<ul>
					<li><a href="http://dclibrary.org/"><small>DC Public Library</small></a></li>
					<li><a href="http://dclibrary.org/terms"><small>Terms &amp; Conditions</small></a></li>
					<li><a href="http://dclibrary.org/node/2095"><small>Accessiblity</small></a></li>
				</ul>
			</div>
		</div> <!-- END ROW -->
	</div> <!-- END CONTAINER -->
</footer>
