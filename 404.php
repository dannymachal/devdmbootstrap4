<?php get_header(); ?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/nav','header'); ?>

    <div class="container dmbs-content-wrapper">
        <div class="row">

            <?php get_template_part( 'template-parts/sidebar', 'left' ); ?>

            <?php $dmbsColumnSize = devdmbootstrap_column_size('main'); ?>
            <div class="col-md-<?php echo sanitize_html_class( $dmbsColumnSize, '8' ); ?> dmbs-main">

                    <article id="post-<?php the_ID(); ?>" <?php post_class('dmbs-page'); ?>>

                        <header class="dmbs-page-header">
                            <h2 class="dmbs-page-title"><?php esc_html_e('404 No Page Found','devdmbootstrap4'); ?></h2>
                        </header>

                        <div class="dmbs-page-content">

                            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'devdmbootstrap4'); ?></p>

                            <?php get_search_form(); ?>

                        </div>

                    </article>

            </div>

            <?php get_template_part( 'template-parts/sidebar', 'right' ); ?>

        </div>
    </div>

<?php get_footer(); ?>