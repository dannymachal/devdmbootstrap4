<?php get_header(); ?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/nav','header'); ?>

    <div class="container dmbs-content-wrapper">
        <div class="row">

            <?php get_template_part( 'template-parts/sidebar', 'left' ); ?>

            <?php $dmbsColumnSize = devdmbootstrap_column_size('main'); ?>
            <div class="col-md-<?php echo sanitize_html_class( $dmbsColumnSize, '8' ); ?> dmbs-main">

                <?php

                    if (is_author()) {

                        get_template_part( 'template-parts/archive-types/author' );

                    } elseif (is_category()) {

                        get_template_part( 'template-parts/archive-types/category' );

                    } elseif (is_date()) {

                        get_template_part( 'template-parts/archive-types/date' );

                    } elseif (is_tag()) {

                        get_template_part( 'template-parts/archive-types/tag' );
                    }

                ?>

                <?php if ( have_posts() ) : ?>

                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('card dmbs-post'); ?>>

                            <header class="card-header dmbs-post-header">
                                <?php the_title( sprintf( '<h2 class="dmbs-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                <?php get_template_part('template-parts/postmeta','header'); ?>
                            </header>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="dmbs-post-featured-image">
                                    <?php the_post_thumbnail('featured', array('class' => 'card-img-top')); ?>
                                </div>
                            <?php endif; ?>

                            <div class="card-body dmbs-post-content">

                                <?php if ( has_excerpt() ) : ?>
                                    <div class="dmbs-post-summary">
                                        <?php the_excerpt(); ?>
                                    </div><!-- .entry-summary -->
                                <?php endif; ?>

                                <?php
                                /* translators: %s: Name of current post */
                                the_content( sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'devdmbootstrap4' ),
                                    get_the_title()
                                ) );

                                wp_link_pages();
                                ?>

                            </div>

                            <footer class="card-footer dmbs-post-footer">
                                <?php get_template_part('template-parts/postmeta','footer'); ?>
                            </footer>

                        </article>

                    <?php
                        // End the loop.
                    endwhile;
                    ?>

                <?php endif; ?>
            </div>

            <?php get_template_part( 'template-parts/sidebar', 'right' ); ?>

        </div>
    </div>

<?php get_template_part('template-parts/nav','footer'); ?>

<?php get_footer(); ?>