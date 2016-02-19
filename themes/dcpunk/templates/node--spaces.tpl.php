<?php
	global $base_path;		
	$term = $node->field_spaces_categories['und'][0]['taxonomy_term'];
	$url = "http://digdc.dclibrary.org/cdm/search/collection/myfirst/searchterm/" . urlencode($node->title) . "/field/all/mode/all/";
?>

<div id="venue-detail-page" style="padding:80px 0 100px;" data-nodeid="<?php print $node->nid; ?>">
<main>
			<div class="container">
				<div class="row">
					<article>
					<div class="col-sm-7 col-sm-offset-1">
						<p class="breadcrumbs">
							<a style="text-decoration: none;" href="<?php print url('spaces'); ?>">Spaces</a> / <a style="text-decoration: none;" href="<?php print urldecode(url('spaces?category_id=' . $term->tid)); ?>"><?php print $term->name; ?></a> 
						</p>
						<h1>
							<?php print $node->title; ?>
							
							<small class="digdc-link" style="font-size:50%; text-transform: none;">
								<a style="text-decoration: none;" target="_blank" href="<?php print $url; ?>">
								View in DigDC &raquo;
								</a>
							</small>
						</h1>
						
						<?php if($node->body['und'][0]['value']): ?>
							<p><?php print $node->body['und'][0]['value']; ?></p>
						<?php endif; ?>
					</div>
				</article>
				<aside>
					<div class="col-sm-4">
						<?php if($node->field_image): ?>
							<div class="profile-image">
								<img
									class="img-responsive" 
									src="<?php print file_create_url($node->field_image['und'][0]['uri']); ?>" 
									alt="<?php print $node->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>" 
								/>
							</div>
						<?php endif; ?>
						
						<?php if($node->field_caption): ?>
							<p class="profile-caption">
								<?php print $node->field_caption['und'][0]['value'] ?>
							</p>
						<?php endif; ?>
						
						<?php if($node->field_location): ?>
							<div class="map-container">
							<div id="map"></div>
						<?php endif; ?>
						
						<?php if($node->field_external_links): ?>
							<h4>Also see</h4>
							<ul>
								<li><a href="">Lorem ipsum venue link goes here</a></li>
								<li><a href="">Lorem ipsum venue link goes here</a></li>
							</ul>
						<?php endif; ?>
					</div>
				</aside>
				</div> <!-- END ROW -->
			</div> <!-- END CONTAINER -->
		
		<?php
    		$events = $node->field_events['und'];
    		$objects = $node->field_objects['und'];
    	?>
    	
<?php if($events || $objects): ?>
    <section class="grid-section">
		<div class="container">
    		<div class="row">
	            <div class="masonry">
		        
		        	<?php foreach ($events as $e): ?>
	                	<?php $event = $e["entity"]; ?>
            			<?php
				           	$preset = 'grid-square-225';
				           	
				           	switch ($event->field_block_size['und'][0]['value']) {
							    case "grid-item--horizontal":
							        $preset = "grid-horizontal";
							        break;
							    case "grid-item--lg-square":
							        $preset = "grid-square-480";
							        break;
							    case "grid-item--rectangle":
							        $preset = "grid-vertical";
							        break;
							}
				           	
				            $src = $event->field_image['und'][0]['uri'];
				            $dst = image_style_path($preset, $src);
				            $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
					    ?>
					    
							<div class="item ">
								<a href="<?php print url('node/'.$event->field_reference['und'][0]['target_id']); ?>"> <img 
									src="<?php print file_create_url($dst); ?>" 
									alt="<?php print $event->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>" />
								
									<div class="overlay-content">
										<div class="year">
											<?php 
												$fulldate = $event->field_date['und'][0]['from']['year'];
												$enddate =  $event->field_date['und'][0]['to']['year']; 
												
												if($enddate && $enddate != $fulldate) {
													$fulldate .= "-" . $enddate;
												} 
											
												print $fulldate;	
											?>
										</div>
										<div class="caption">
											<?php print $event->title; ?>
										</div>
									</div>
                                 </a>
							</div>
							
					<?php endforeach; ?>
					
					<?php foreach ($objects as $e): ?>
	                	<?php $event = $e["entity"]; ?>
	            			<?php
					           	$preset = 'grid-square-225';
					           	
					           	switch ($event->field_block_size['und'][0]['value']) {
								    case "grid-item--horizontal":
								        $preset = "grid-horizontal";
								        break;
								    case "grid-item--lg-square":
								        $preset = "grid-square-480";
								        break;
								    case "grid-item--rectangle":
								        $preset = "grid-vertical";
								        break;
								}
					           	
					            $src = $event->field_image['und'][0]['uri'];
					            $dst = image_style_path($preset, $src);
					            $success = file_exists($dst) || image_style_create_derivative(image_style_load($preset), $src, $dst);
						    ?>
					    
							<div class="item ">
								<a href="<?php print url('node/'.$event->field_reference['und'][0]['target_id']); ?>"> <img 
									src="<?php print file_create_url($src); ?>" 
									alt="<?php print $event->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>" />
								
									<div class="overlay-content">
										<div class="year">
											<?php 
												$fulldate = $event->field_date['und'][0]['from']['year'];
												$enddate =  $event->field_date['und'][0]['to']['year']; 
												
												if($enddate && $enddate != $fulldate) {
													$fulldate .= "-" . $enddate;
												} 
											
												print $fulldate;	
											?>
										</div>
										<div class="caption">
											<?php print $event->title; ?>
										</div>
									</div>
                                 </a>
							</div>
							
					<?php endforeach; ?>
						
						
		        
	            </div>
    		</div>
		</div>
    </section>
<?php endif; ?>
		
	</main>
</div>

<script>
	$(document).ready(function(){
		var id = $('#venue-detail-page').data('nodeid');
		
		callJson('../json/node/map?node_id=' + id);
	});
</script>

<script type="text/javascript" src="<?php print $base_path; ?>themes/dcpunk/js/map.js"></script>