<nav class="navbar navbar-dark bg-inverse">
    <div class="container">
        <!-- Toggle Button -->
        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#nav-content">
            <span class="fa fa-bars"></span> Menu
        </button>

        <!-- Nav Content -->
        <div class="collapse navbar-toggleable-sm" id="nav-content">
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
                        'menu_class'        => 'nav navbar-nav',
                        'walker'            => $dmbswalker)
                );
            ?>
        </div>
    </div>
</nav>
