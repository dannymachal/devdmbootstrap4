<nav class="dmbs-header-navbar navbar navbar-dark bg-inverse">
    <div class="container">
        <!-- Toggle Button -->
        <button class="navbar-toggler dmbs-header-nav-mobile-toggle" type="button" data-toggle="collapse" data-target="#nav-content">
            <span class="fa fa-bars"></span> <?php _e('Menu','devdmbootstrap4'); ?>
        </button>

        <!-- Nav Content -->
        <div class="collapse navbar-toggleable-md" id="nav-content">
            <?php
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
    </div>
</nav>
