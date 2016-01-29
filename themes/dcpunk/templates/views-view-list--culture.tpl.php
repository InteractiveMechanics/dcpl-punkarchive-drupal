<?php
	$vocabulary = taxonomy_vocabulary_machine_name_load('culture_subcategories');
	$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));	
	
	$term_id = $_GET['category_id'];
?>

<div id="culture-landing-page">
	
	<main>
		<div class="jumbotron">
  			<div class="container">
  				<div class="row">
  					<div class="col-sm-10 col-sm-offset-1">
	  					<div class="subnav">
		  					<ul>
			  					<li><a href="<?php print url('collections'); ?>">All Stories</a></li>
			  					<?php foreach($terms as $term): ?>
			  						<?php   $result = taxonomy_select_nodes($term->tid) ?>
			  							<?php if($result): ?>
					  						<li>
					  							<a data-termid="<?php print $term->tid; ?>" href="<?php print urldecode(url('collections?category_id=' . $term->tid)); ?>">
						  							<?php print $term->name; ?>
						  						</a>
						  					</li>
						  				<?php endif; ?>
					  					
			  					<?php endforeach; ?>
		  					</ul>
		  				</div>
	  				</div> <!-- END SUBNAV -->
  				</div> <!-- END ROW -->
  				<div class="col-sm-8 col-sm-offset-2">
	  				<?php if($term_id): ?>
	  				
	  					<?php 
		  					$current_term = taxonomy_term_load($term_id);	
		  				?>
	  				
	  					<h2>
		  					<?php print $current_term->name; ?>
	  					</h2>
		  				<h4>
			  				<?php print $current_term->description; ?>
		  				</h4>
		  			<?php else: ?>
		  				<h2>
		  					DC PUNK COLLECTIONS
	  					</h2>
		  				<h4>
			  				<p>
			  				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate nulla elit, a suscipit purus 
			  				posuere vel. Nulla facilisi. Fusce vestibulum, felis quis mattis mattis, lacus lorem consequat lacus, vitae 
			  				viverra nulla nisl sed justo
			  				</p>
			  			</h4>
	  				<?php endif; ?>
  				
    			</div>
  			</div> <!-- END CONTAINER -->
		</div> <!-- END JUMBOTRON -->
		
		<?php if($term_id): ?>
			<section>
				<div class="container">
					<div class="row">
						<div class="grid">
							<?php foreach ($view->result as $delta => $item): ?>
								<?php $n = $view->result[$delta]->_field_data['nid']['entity'];  ?>
								<a href="<?php print url('node/'.$n->nid); ?>">
									<div class="grid-item grid-item--rectangle">
										<?php if($n->field_image): ?>
											<img 
												src="<?php print file_create_url($n->field_image['und'][0]['uri']); ?>" 
												alt="<?php print $n->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>"
											>
										<?php else: ?>
											<img src="http://placehold.it/750x450" />
										<?php endif; ?>
										
										<div class="overlay-content">
											<div class="year">
												
													<?php 
														
														print $n->field_date['und'][0]['from']['year']; ?>
														<?php if($n->field_date['und'][0]['to']['year']): ?>
															- <?php print $n->field_date['und'][0]['to']['year']; ?>
														<?php endif; ?>
											</div>
											
											<div class="caption">
												
													<?php print $n->title; ?>
											
											</div>
										</div>
									</div>
								</a>
							<?php endforeach; ?>
						</div> <!-- END GRID -->
					</div> <!-- END ROW -->
				</div> <!-- END CONTAINER -->
			</section>
		<?php endif; ?>
	</main>
	
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		var term_id = getParameterByName('category_id');
		
		if(term_id) {
			$('.subnav ul li a[data-termid="' + term_id + '"]').attr("id","active-page");
		} else {
			$('.subnav ul li:eq(0) a').attr("id","active-page");
		}
	});
	
	
	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
</script>