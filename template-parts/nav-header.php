<nav class="navbar navbar-dark bg-inverse">
    <div class="container">
        <!-- Toggle Button -->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#nav-content">
            Menu
        </button>

        <!-- Nav Content -->
        <div class="collapse navbar-toggleable-sm" id="nav-content">
            <?php
            wp_nav_menu( array(
                    'theme_location'    => 'headermenu',
                    'depth'             => 2,
                    'container'         => '',
                    'container_class'   => '',
                    'menu_class'        => 'nav navbar-nav',
                    'walker'            => new devdmbootstrap_enhanced_nav_walker())
            );
            ?>
        </div>
    </div>
</nav>
