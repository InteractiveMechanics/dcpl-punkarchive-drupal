<?php
	 $spaces = array();
	 
	 
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
		  						<li><a href="" id="active-page">All Spaces</a></li>
		  						<li><a href="">Venues</a></li>
		  						<li><a href="">Record Stores</a></li>
		  						<li><a href="">Studios</a></li>
		  						<li><a href="">Houses</a></li>
		  					</ul>
		  				</div>
	  				</div> <!-- END SUBNAV -->
					</div> <!-- END ROW -->
				</div> <!-- END CONTAINER -->
		</div> <!-- END JUMBOTRON -->
		<section>
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
				<div class="row">
					<div class="col-sm-12">
						<table class="table">
							
							
							<?php foreach ($spaces as $delta => $item): ?>
								<tr>
									<td class="table_letter"><span class="table_letter_border"><?php print $delta; ?></span></td>
									<?php foreach($spaces[$delta] as $s): ?>
										<td><a href="<?php print url('node/'.$s['id'], array('absolute' => TRUE)); ?>"><?php print $s['title'] ?></a></td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach; ?>
						</table>
						<p><small>Missing information about your favorite venue? <a href="">Contribute to the archive &raquo;</a></small></p>
					</div>
				</div> <!-- END ROW -->
			</div> <!-- END CONTAINER -->
		</section>
</main>
</div>

<script type="text/javascript" src="<?php print $base_path; ?>themes/dcpunk/js/map.js"></script>