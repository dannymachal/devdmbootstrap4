<form role="search" method="get" class="search-form form" action="<?php echo esc_url(get_site_url()); ?>">
    <div class="input-group">
        <span class="sr-only"><?php echo esc_html('Search for','devdmbootstrap4'); ?></span>
        <input type="search" class="search-field form-control" placeholder="<?php esc_attr_e('Search ...','devdmbootstrap4'); ?>" value="" name="s" title="<?php esc_attr_e('Search for:','devdmbootstrap4'); ?>">
              <span class="input-group-btn">
                <button class="btn btn-primary search-submit" type="submit" value="<?php esc_attr_e('Search','devdmbootstrap4'); ?>"><span class="fa fa-search"></span></button>
              </span>
    </div>
</form>