<?php if ( has_nav_menu( 'footermenu' ) ) : ?>

    <div class="container dropup dmbs-footer-nav-container">

        <nav class="navbar navbar-dark bg-inverse dmbs-footer-navbar">

                <!-- Nav Content -->
                <div class="navbar-toggleable-md" id="footer-nav-content">
                    <?php

                    //grab the Theme Mod Setting for Enabling the Enhanced Menu Walker
                    $loadEnhancedMenu = get_theme_mod('devdmbootstrap4_enhanced_menu_setting', 1);

                    if ($loadEnhancedMenu == 1) {
                        $dmbswalker = new devdmbootstrap_enhanced_nav_walker();
                    } else {
                        $dmbswalker = new devdmbootstrap_nav_walker();
                    }

                    wp_nav_menu( array(
                            'theme_location'    => 'footermenu',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => '',
                            'menu_class'        => 'dmbs-footer-nav nav navbar-nav',
                            'walker'            => $dmbswalker)
                    );
                    ?>
                </div>

        </nav>

    </div>

<?php endif; ?>