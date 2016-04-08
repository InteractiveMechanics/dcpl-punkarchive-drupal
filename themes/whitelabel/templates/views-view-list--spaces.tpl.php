<?php
	 $spaces = array();
	 
	 
	 $vocabulary = taxonomy_vocabulary_machine_name_load('spaces_subcategories');
	 $terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));	
	 
	 $term_id = $_GET['category_id'];
	 
	 foreach($view->result as $delta => $item) {
		 $str = $view->result[$delta]->node_title;
		 
		 if(count($spaces[strtoupper($str[0])]) == 0) {
			 $spaces[strtoupper($str[0])] = array();	
		 }
		 
		 array_push($spaces[strtoupper($str[0])], array(
			 'id' => $view->result[$delta]->nid,
			 'title' => $view->result[$delta]->node_title
		 ));
	 }
	 
    global $base_path;
?>

<div id="spaces-landing-page">
	<main>	
		<div class="jumbotron">
				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
		  				<div class="subnav">
		  					<ul>
		  						<li><a href="<?php print urldecode(url('spaces')); ?>">All Spaces</a></li>
		  						<?php foreach($terms as $term): ?>
			  						<?php   $result = taxonomy_select_nodes($term->tid) ?>
			  							<?php if($result): ?>
					  						<li>
					  							<a data-termid="<?php print $term->tid; ?>" href="<?php print urldecode(url('spaces?category_id=' . $term->tid)); ?>">
						  							<?php print $term->name; ?>
						  						</a>
						  					</li>
						  				<?php endif; ?>
					  					
			  					<?php endforeach; ?>
		  					</ul>
		  				</div>
	  				</div> <!-- END SUBNAV -->
					</div> <!-- END ROW -->
				</div> <!-- END CONTAINER -->
		</div> <!-- END JUMBOTRON -->
		<section class="hidden-xs">
			<div class="container">
				<div class="row map-container">
					<div id="map"></div>
					<div id="legend">
						<ul>
							<li>
								<svg version="1.1" id="venue_marker" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve"> <g id="_x37_26-star-selected_x40_2x.png"> <g> <polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
								</g>
								</g>
								</svg>
								Venues
							</li>
							<li>
								<svg version="1.1" id="record_store_marker" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve"> <g id="_x37_26-star-selected_x40_2x.png"> <g> <polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
								</g>
								</g>
								</svg>
								Record Stores
							</li>
							<li>
								<svg version="1.1" id="studios_marker" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve"> <g id="_x37_26-star-selected_x40_2x.png"> <g> <polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
								</g>
								</g>
								</svg>
								Studios
							</li>
							<li>
								<svg version="1.1" id="houses_marker" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve"> <g id="_x37_26-star-selected_x40_2x.png"> <g> <polygon points="58,24 36.6,24 30,4 23.4,24 2,24 19.2,36.2 13,56 30,44.5 47,56 40.8,36.2 		"/>
								</g>
								</g>
								</svg>
								Houses
							</li>
						</ul>
					</div>
				</div> <!--END ROW -->
			</div>
		</section>
		<section>
			
			<div class="container">
				<?php foreach ($spaces as $delta => $item): ?>
					<div class="space-row">
						<div class="row">
							<div class="col-md-1 col-sm-12 col-xs-12 space-text">
								<span class="table_letter_border"><?php print $delta; ?></span>
							</div>
							
							<div class="col-md-10 col-sm-12 col-xs-12 spaces-link" style="padding: 10px;">
								<div class="row" style="margin:0px;">
								<?php foreach($spaces[$delta] as $s): ?>
									<div class="col-md-3">
										<a href="<?php print url('node/'.$s['id'], array('absolute' => TRUE)); ?>">
											<?php print $s['title'] ?>
										</a>
									</div>
								<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>
			</div>
			
		</section>
</main>
</div>

<script type="text/javascript" src="<?php print $base_path; ?>themes/whitelabel/js/map.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
		var term_id = getParameterByName('category_id');
		
		if(term_id) {
			$('.subnav ul li a[data-termid="' + term_id + '"]').attr("id","active-page");
		} else {
			$('.subnav ul li:eq(0) a').attr("id","active-page");
		}
		
		var jsonurl = '' + term_id;
		callJson('json/map?category_id=' + term_id);
	});
	
	
	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
</script>


<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>