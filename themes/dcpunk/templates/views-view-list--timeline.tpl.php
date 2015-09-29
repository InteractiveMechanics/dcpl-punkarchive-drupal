<div id="timeline-page">
	<div class="jumbotron">
		<div class="container">
			<div class="col-sm-8 col-sm-offset-2">
    			<h1>The History of DC Punk</h1>
    			<h3>As America celebrated its bicentennial, a new revolution was brewing in the nation's capital. Over the next several years, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tellus ante, auctor eget feugiat here are a few more words.
    			</h3>
                <img src="<?php print $base_path . $directory; ?>/images/accent-stars.svg" />
            </div>
		</div> <!-- END CONTAINER -->
	</div> <!-- END JUMBOTRON -->

	<div id="mainContainer">
	<?php if ($view->result): ?>
	<?php foreach ($view->result as $delta => $item): ?>
        <?php $n = $view->result[$delta]->_field_data['nid']['entity'];  ?>
        	<section id="timeline-section-<?php print $n->field_date['und'][0]['from']['year']; ?>" class="sec pull-center">
            	<div class="container">
                	<div class="row">
                		<div class="col-sm-10 col-sm-offset-1">
	                		<div class="col-sm-10 col-sm-offset-1">
								<h2><?php print $n->field_date['und'][0]['from']['year']; ?>-<?php print $n->field_date['und'][0]['to']['year']; ?></h2>
								<h4><?php print $n->title ?></h4>
								<p><?php print $n->body['und'][0]['value']; ?></p>
							</div>
                		</div>
                	</div>
                	
                	<?php
	                	$wrapper = entity_metadata_wrapper('node', $n);
						$events = $wrapper->field_events->value();
	                ?>
                	
                	<?php if ($events): ?>
                		<div class="row">
	                		<div class="grid">
	                			<?php foreach ($events as $event): ?>
									<div class="grid-item <?php print $event->field_block_size['und'][0]['value']?>">
										<a href="<?php print url('node/'.$event->field_reference['und'][0]['target_id']); ?>"> <img 
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
                		</div>
					<?php endif; ?>	                	
            	</div>
        	</section>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<div data-spy="affix" data-offset-top="-10" data-offset-bottom="200" id="dotNav" class="pull-right">
		<ul class="nav">
			<?php if ($view->result): ?>
				<?php foreach ($view->result as $delta => $item): ?>
					<?php $n = $view->result[$delta]->_field_data['nid']['entity'];  ?>
						<li 
							data-toggle="popover" 
							data-trigger="hover" 
							title="<?php print $n->field_date['und'][0]['from']['year']; ?>-<?php print $n->field_date['und'][0]['to']['year']; ?>" 
							data-content="<?php print $n->title; ?>" 
							data-placement="right"
                            data-container="body">
							
								<a href="#timeline-section-<?php print $n->field_date['und'][0]['from']['year']; ?>"></a>
							
						</li>
				<?php endforeach; ?>
			<?php endif; ?>
	     </ul>
	</div>	
</div>