<pre>
	<?php var_dump($node); ?>
</pre>

<main>
			<div class="container">
				<div class="row">
					<article>
					<div class="col-sm-7 col-sm-offset-1">
						<h1><?php print $node->title; ?></h1>
						<h4>Description</h4>
						<?php print $node->body['und'][0]['value']; ?>
					</div>
				</article>
				<aside>
					<div class="col-sm-4">
						<div class="profile-image">
							<img
								class="img-responsive" 
								src="<?php print file_create_url($node->field_image['und'][0]['uri']); ?>" 
								alt="<?php print $node->field_image['und'][0]['field_file_image_alt_text']['und'][0]['value']; ?>" 
							/>
						</div>
						<div class="map-container">
						<div id="map"></div>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="modal-button">Click to Expand</button>
					</div>
						<h4>Also see</h4>
						<ul>
							<li><a href="">Lorem ipsum venue link goes here</a></li>
							<li><a href="">Lorem ipsum venue link goes here</a></li>
						</ul>
					</div>
				</aside>
				</div> <!-- END ROW -->
			</div> <!-- END CONTAINER -->
		
		<section class="grid-section">
			<div class="container">
				<div class="row">
					<div class="grid">
						<div class="grid-item grid-item--portrait-rectangle"><img class="zoomed-in-175" src="images/Flier_for_a_concert_featuring_Government_Issue_Scream_No_Trend_Freeze_and_Kraut_March_31.jpg" alt="flier for Governemnt Issue Kraut concert"></div>
						<div class="grid-item"><img src="images/Flier_for_a_Teen_Idles_concerts_where_the_band_performs_alternately_with_The_Untouchables_GoGo_Lunch_Zones_and_Judies_Fixation_on_June_28_June_30_and_July_2.jpg" alt="flier for Teen Idles concert"></div>
						<div class="grid-item"><img src="images/Flier_for_two_concerts_featuring_SOA_with_Minor_Threat_Youth_Brigade_Assault_and_Battery_and_Red_C_May_8_and_9_1981.jpg" alt="SOA flier"></div>
						<div class="grid-item"><img src="images/Flier_for_a_concert_featuring_the_Ramones_and_the_Slickee_Boys_June_8_1980.jpg" alt="flier for Ramones Slickee Boys concert"></div>
						<div class="grid-item"><img class="zoomed-in-150" src="images/publishreq-6.jpg" alt="concert photo"></div>
						<div class="grid-item grid-item--rectangle"><img src="images/publishreq-9.jpg" alt="concert photo">
	</div>
					</div>
				</div> <!-- END ROW -->
			</div> <!-- END CONTAINER -->
		</section>
	</main>