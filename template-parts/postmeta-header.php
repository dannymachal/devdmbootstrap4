<div class="dmbs-post-meta-header">

    <div class="row">

        <div class="col-sm-8">
            <span class="dmbs-post-date"><span class="fa fa-calendar"></span> <?php the_time(get_option( 'date_format' )); ?></span> <span class="fa fa-user"></span> <span class="dmbs-post-author"><?php the_author_posts_link(); ?></span>
        </div>

        <?php  if ( comments_open() ) : ?>
            <div class="col-sm-4 dmbs-post-comment-counter">
                <a href="<?php esc_url( the_permalink() ); ?>#comments"><span class="fa fa-comment"></span>  <?php comments_number('0 ' . __('Comments','devdmbootstrap4'), '1 ' . __('Comment','devdmbootstrap4'), '%' . __(' Comments','devdmbootstrap4') );?></a>
            </div>
        <?php endif; ?>

    </div>

</div>