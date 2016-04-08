 <div class="container" style="padding: 150px 15px 150px;">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><?php if (!$logged_in): echo 'Login to Account'; else: echo 'My Profile'; endif; ?></div>
                <div class="panel-body">
                    <?php if ($tabs && $logged_in): ?>
                        <?php print render($tabs); ?>
                    <?php endif; ?>
                    <?php print render($page['content']); ?>                
                </div>
            </div>
        </div>
    </div>
</div>