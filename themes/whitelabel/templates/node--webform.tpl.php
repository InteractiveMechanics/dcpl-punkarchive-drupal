<div class="my-collection-header" style="padding:110px 0 60px">
	<div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <?php if ($title): ?>
                    <h1><?php print $title; ?></h1>
                <?php endif; ?>
                
                <?php if ($_SERVER['QUERY_STRING'] == 'done'): ?>
                    <div class="alert alert-success" role="alert">Thank you! We will get back to you shortly for further information.</div>
                <?php endif; ?>

                <?php
                // We hide the comments and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                ?>
                <?php print render($content); ?>
                <?php print render($content['links']); ?>
                <?php print render($content['comments']); ?>
            </div>
        </div>
	</div>
</div>
