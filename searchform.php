<form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php bloginfo('url'); ?>">
    <div class="form-group">
        <label class="screen-reader-text sr-only" for="s"><?php _e('Search', 'affilicious-theme'); ?></label>
        <input type="email" name="s" class="<?php _e('Search', 'affilicious-theme'); ?>form-control" id="s" placeholder="<?php _e('Search', 'affilicious-theme'); ?>">
    </div>
    <button type="submit" id="searchsubmit" class="btn btn-default"><i class="fa fa-search"></i></button>
</form>
