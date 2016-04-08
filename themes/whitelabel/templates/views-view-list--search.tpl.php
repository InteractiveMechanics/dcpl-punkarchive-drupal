<?php

	
	
	$showResults = false;
	
	$title = $_GET['title'];
	$body = $_GET['body'];
	if($title || $body) {
		$showResults = true;
	}	
?>

<div id="search-page">
	
	
	<main>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<h1>Site Search</h1>
					<label>Search by Keywords</label>
						
					  	<div class="input-group col-sm-12">
					      	<input type="text" class="form-control search-control" name="query" placeholder="Type your search term here">
       					 </div> 
       					 
       					</div>
       					
       					<?php if($showResults): ?>
       						
       					 <?php foreach ($view->result as $delta => $item): ?>
	       						<?php $n = $view->result[$delta]->_field_data['nid']['entity'];  ?>
			       					 <section>
			       					 	<div class="col-sm-7 col-sm-offset-2">
				       					 	<br />
				       					 	<div class="search-result-heading">
				       					 		<h3 style="text-transform: none;">
					       					 		<a href="<?php print url('node/'.$n->nid); ?>"><?php print $n->title; ?></a>
					       					 	</h3>
				       					 		<h5>The <?php print node_type_get_name($n); ?></h5>
				       					 	</div>
				       					 	
				       					 	<?php $body = $n->body['und'][0]['value']; ?>
			       					 		
				       					 		<?php if(strlen($body) < 230): ?>
				       					 			<p><?php print $body; ?></p>
				       					 		<?php else: ?>
				       					 			<p><?php print substr($body, 0, 229); ?></p>
				       					 		<?php endif; ?>
				       					 	
			       					 	</div>
			       					 	<div class="col-sm-1">
			       					 		<div class="search-result-arrow">
			       					 			<p>
				       					 			<a href="<?php print url('node/'.$n->nid); ?>" style="color:black;">
					       					 			<i class="fa fa-caret-right fa-lg"></i>
				       					 			</a>
					       					 	</p>
			       					 		</div>
			       					 	</div> <!-- END COL-SM-1 -->
			       					 	<div class="col-sm-8 col-sm-offset-2">
			       					 	<div class="divider"></div>
			       					 </div>
			       					</section>
				   					
	       					<?php endforeach; ?>
       					
       					<?php endif; ?>
       					
					
				</div> <!-- END COL-SM-8 COL-SM-OFFSET-2 -->
			</div> <!-- END ROW -->
		</div> <!-- END CONTAINER -->		
	</main>
	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-search').click(function(){
			var search_term = $('.search-control').val();
			if(search_term) {
				window.location.href = window.location.origin + window.location.pathname + "?title=" + search_term + "&body=" + search_term;
			}
		});
		
		$("input.search-control").keypress(function(event) {
		    if (event.which == 13) {
		        event.preventDefault();
		        var search_term = $('.search-control').val();
				if(search_term) {
					window.location.href = window.location.origin + window.location.pathname + "?title=" + search_term + "&body=" + search_term;
				}
		    }
		});
	});
</script>