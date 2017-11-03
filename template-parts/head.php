<?php if (get_theme_mod('devdmbootstrap4_show_header_setting', 1)) : ?>

    <div class="container dmbs-header">

        <div class="row">

            <div class="col-sm-4 dmbs-header-left">

                <a class="dmbs-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="dmbs-logo-image" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" />
                </a>

            </div>

            <div class="col-sm-8 dmbs-header-right">

                <h1 class="dmbs-header-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                <h4 class="dmbs-header-description"><?php bloginfo( 'description' ); ?></h4>

            </div>

        </div>

    </div>

<?php endif; ?>
