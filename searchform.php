<form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php bloginfo('url'); ?>">
    <div class="form-group">
        <label class="screen-reader-text sr-only" for="s"><?php _e('Search', 'projektaffiliatetheme'); ?></label>
        <input type="email" name="s" class="<?php _e('Search', 'projektaffiliatetheme'); ?>form-control" id="s" placeholder="<?php _e('Search', 'projektaffiliatetheme'); ?>">
    </div>
    <button type="submit" id="searchsubmit" class="btn btn-default"><i class="fa fa-search"></i></button>
</form>
