<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>

    <div class="container dropup dmbs-footer-nav-container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark dmbs-footer-navbar col-12">

                <!-- Toggle Button -->
                <button class="navbar-toggler dmbs-footer-nav-mobile-toggle" type="button" data-toggle="collapse" data-target="#footer-nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> <?php esc_html_e('Menu','devdmbootstrap4'); ?>
                </button>

                <!-- Nav Content -->
                <div class="collapse navbar-collapse" id="footer-nav-content">
                    <?php

                    //grab the Theme Mod Setting for Enabling the Enhanced Menu Walker
                    $loadEnhancedMenu = get_theme_mod('devdmbootstrap4_enhanced_menu_setting', 1);

                    if ($loadEnhancedMenu == 1) {
                        $dmbswalker = new devdmbootstrap_enhanced_nav_walker();
                    } else {
                        $dmbswalker = new devdmbootstrap_nav_walker();
                    }

                    wp_nav_menu( array(
                            'theme_location'    => 'footer_menu',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => '',
                            'menu_class'        => 'dmbs-footer-nav navbar-nav mr-auto',
                            'walker'            => $dmbswalker
                        )
                    );
                    ?>
                </div>

            </nav>
        </div>
    </div>

<?php endif; ?>