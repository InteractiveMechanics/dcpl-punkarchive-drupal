<?php
	global $base_path;		
	$term = $node->field_culture_category['und'][0]['taxonomy_term'];
?>



<div id="venue-detail-page" style="padding:80px 0 100px;">
<main>
			<div class="container">
				<div class="row">
					<article>
					<div class="col-sm-7 col-sm-offset-1">
						<p class="breadcrumbs">
							<strong><a style="text-decoration: none;" href="<?php print url('culture'); ?>">Collections</a></strong> / <strong><a style="text-decoration: none;" href="<?php print urldecode(url('collections?category_id=' . $term->tid)); ?>"><?php print $term->name; ?></a> </strong>
						</p>
						
						
						<h1>
							<?php print $node->title; ?>
						</h1>
						
						<?php if($node->body['und'][0]['value']): ?>
							<h4>Description</h4>
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
					</div>
				</aside>
				</div> <!-- END ROW -->
			</div> <!-- END CONTAINER -->
		
		<?php
    		$events = $node->field_objects['und'];
    	?>
    	
    	<?php if($event): ?>
			<section class="grid-section">
				<div class="container">
					<div class="row">
						<div class="grid">
							
							<?php foreach ($events as $e): ?>
								<?php $event = $e["entity"]; ?>
								<div class="grid-item <?php print $event->field_block_size['und'][0]['value']?>">
									<a href="javascript: void(0);" title=""> <img 
										src="<?php print file_create_url($event->field_image['und'][0]['uri']); ?>" 
										alt="<?php print $event->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>" />
									
										<div class="overlay-content">
											<div class="year">
												<p>
													<?php 
														
														print $event->field_date['und'][0]['from']['year']; ?>-<?php print $event->field_date['und'][0]['to']['year']; 
														
													?>
												</p>
											</div>
											<div class="caption">
												<p><?php print $event->title; ?></p>
											</div>
										</div>
	                                 </a>
								</div>
								
							<?php endforeach; ?>
						</div>
					</div> <!-- END ROW -->
				</div> <!-- END CONTAINER -->
			</section>
		<?php endif; ?>
		
	</main>
</div>