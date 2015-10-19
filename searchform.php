<form role="search" method="get" class="search-form form" action="<?php echo get_site_url(); ?>">
    <div class="input-group">
        <span class="sr-only"><?php echo __('Search for','dmbs_swatcher'); ?></span>
        <input type="search" class="search-field form-control" placeholder="<?php echo __('Search ...','dmbs_swatcher'); ?>" value="" name="s" title="<?php echo __('Search for:','dmbs_swatcher'); ?>">
              <span class="input-group-btn">
                <button class="btn btn-primary search-submit" type="submit" value="Search"><span class="fa fa-search"></span></button>
              </span>
    </div>
</form>