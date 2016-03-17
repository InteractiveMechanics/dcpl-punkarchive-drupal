<?php
	 $bands = array();
	 
	 
	foreach($view->result as $delta => $item) {
		 $str = $view->result[$delta]->node_title;
		 
		 if(count($bands[strtoupper($str[0])]) == 0) {
			 $bands[strtoupper($str[0])] = array();	
		 }
		 
		 array_push($bands[strtoupper($str[0])], array(
			 'id' => $view->result[$delta]->nid,
			 'title' => $view->result[$delta]->node_title
		 ));
	}
	 
	$vocabulary = taxonomy_vocabulary_machine_name_load('music_subcategories');
	$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));	
	
	$term_id = $_GET['category_id'];
	 
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
			  					<li><a href="<?php print url('music'); ?>">All Music</a></li>
			  					<?php foreach($terms as $term): ?>
			  						<?php   $result = taxonomy_select_nodes($term->tid) ?>
			  							<?php if($result): ?>
					  						<li>
					  							<a data-termid="<?php print $term->tid; ?>" href="<?php print urldecode(url('music?category_id=' . $term->tid)); ?>">
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
		
		
		
		<section>
			
			<div class="container">
				<?php foreach ($bands as $delta => $item): ?>
					<div class="space-row">
						<div class="row">
							<div class="col-md-1 col-sm-12 col-xs-12 space-text">
								<span class="table_letter_border"><?php print $delta; ?></span>
							</div>
							
							<div class="col-md-10 col-sm-12 col-xs-12 spaces-link" style="padding: 10px;">
								<div class="row" style="margin:0px;">
								<?php foreach($bands[$delta] as $s): ?>
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
				<p><small>Missing information about your favorite music? <a href="<?php print url('contribute-to-the-archive'); ?>">Contribute to the archive &raquo;</a></small></p>
			</div>
		</section>
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