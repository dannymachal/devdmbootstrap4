<?php if (get_theme_mod('devdmbootstrap4_show_header_setting', 1)) : ?>

    <div class="container dmbs-header">

        <div class="row">
            <?php
                $dmbsCustomLogoUrl = devdmbootstrap4_custom_logo();
                $dmbsHeaderText    = get_theme_mod('header_text', 1)
            ?>
            <?php if (!empty($dmbsCustomLogoUrl)) : ?>
                <div class="col-sm-<?php echo ($dmbsHeaderText == 0 ? '12' : '4'); ?> dmbs-header-left">
                    <a class="dmbs-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="dmbs-logo-image" src="<?php echo $dmbsCustomLogoUrl; ?>" alt="<?php bloginfo('name'); ?>" />
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($dmbsHeaderText == 1) : ?>
                <div class="col-sm-<?php echo (!empty($dmbsCustomLogoUrl) ? "8" : "12"); ?> dmbs-header-right">

                    <h1 class="dmbs-header-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                    <h4 class="dmbs-header-description"><?php bloginfo( 'description' ); ?></h4>

                </div>
            <?php endif; ?>

        </div>

    </div>

<?php endif; ?>
