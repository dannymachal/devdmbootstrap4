<?php get_header(); ?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/nav','header'); ?>

<div class="container dmbs-content-wrapper">
    <div class="row">

        <?php get_template_part( 'template-parts/sidebar', 'left' ); ?>

        <div class="col-sm-<?php echo devdmbootstrap_column_size('main'); ?> dmbs-main">

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
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>

                        <div class="card-block dmbs-post-content">

                            <?php if ( has_excerpt() ) : ?>
                                <div class="dmbs-post-summary">
                                    <?php the_excerpt(); ?>
                                </div><!-- .entry-summary -->
                            <?php endif; ?>

                            <?php
                            the_content( sprintf(
                                wp_kses( esc_html__( 'Continue reading %s', 'devdmbootstrap4' ), array( 'span' => array( 'class' => array() ) ) ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ) );
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

            <?php else :  ?>

                <?php get_404_template(); ?>

            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/sidebar', 'right' ); ?>

    </div>
</div>

<?php get_footer(); ?>