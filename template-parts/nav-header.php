<?php if ( has_nav_menu( 'headermenu' ) ) : ?>

    <div class="container dmbs-header-nav-container">
        <div class="row">
            <nav class="navbar navbar-dark bg-inverse dmbs-header-navbar">

                <!-- Toggle Button -->
                <button class="navbar-toggler dmbs-header-nav-mobile-toggle" type="button" data-toggle="collapse" data-target="#header-nav-content">
                    <span class="fa fa-bars"></span> <?php _e('Menu','devdmbootstrap4'); ?>
                </button>

                <!-- Nav Content -->
                <div class="collapse navbar-toggleable-md" id="header-nav-content">
                    <?php

                    //grab the Theme Mod Setting for Enabling the Enhanced Menu Walker
                    $loadEnhancedMenu = get_theme_mod('devdmbootstrap4_enhanced_menu_setting', 1);

                    if ($loadEnhancedMenu == 1) {
                        $dmbswalker = new devdmbootstrap_enhanced_nav_walker();
                    } else {
                        $dmbswalker = new devdmbootstrap_nav_walker();
                    }

                    wp_nav_menu( array(
                            'theme_location'    => 'headermenu',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => '',
                            'menu_class'        => 'dmbs-header-nav nav navbar-nav',
                            'walker'            => $dmbswalker)
                    );
                    ?>
                </div>

            </nav>
        </div>
    </div>
<?php endif; ?>