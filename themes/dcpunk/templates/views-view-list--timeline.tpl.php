<div id="timeline-page">


<main>
		<div class="jumbotron">
  			<div class="container">
  				<div class="col-sm-8 col-sm-offset-2">
  				<h2>The History of DC Punk</p>
  				<h4>As America celebrated its bicentennial, a new revolution was brewing in the nation's capital. Over the next several years, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tellus ante, auctor eget feugiat here are a few more words.
  				</h4>
  				<div class="star-group">
  					<svg version="1.1" id="star_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
						<g id="_x37_26-star-selected_x40_2x.png">
							<g>
								<polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
							</g>
						</g>
					</svg>
					<svg version="1.1" id="star_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">	
						<g id="_x37_26-star-selected_x40_2x.png">
							<g>
								<polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
							</g>
						</g>
					</svg>
					<svg version="1.1" id="star_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
						<g id="_x37_26-star-selected_x40_2x.png">
							<g>
								<polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
							</g>
						</g>
					</svg>
				</div> <!-- END STAR GROUP -->
					<div class="star-group-underline" id="underline_1"></div>
					<div class="star-group-underline" id="underline_2"></div>
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
										<p>
											<?php print $n->body['und'][0]['value']; ?>
										</p>
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
												<a href="javascript: void(0);" title=""> <img 
													src="<?php print file_create_url($event->field_image['und'][0]['uri']); ?>" 
													alt="<?php print $event->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>" 
												/> </a>
												
												<div class="overlay-content">
													<div class="year">
														<p>2012</p>
													</div>
													<div class="caption">
														<p>This is a sample caption.</p>
													</div>
												</div>
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

	<div data-spy="affix" data-offset-top="100" id="dotNav" class="pull-right">
		<ul>
			<?php if ($view->result): ?>
				<?php foreach ($view->result as $delta => $item): ?>
					<?php $n = $view->result[$delta]->_field_data['nid']['entity'];  ?>
						<li 
							data-toggle="popover" 
							data-trigger="hover" 
							title="<?php print $n->field_date['und'][0]['from']['year']; ?>-<?php print $n->field_date['und'][0]['to']['year']; ?>" 
							data-content="<?php print $n->title; ?>" 
							data-placement="right">
							
								<a href="#timeline-section-<?php print $n->field_date['und'][0]['from']['year']; ?>"></a>
							
						</li>
				<?php endforeach; ?>
			<?php endif; ?>
	     </ul>
	</div>


	</main>
	
</div>