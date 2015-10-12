<div class="dmbs-post-meta-header">

    <div class="row">

        <div class="col-sm-8">
            <span class="dmbs-post-date"><?php the_time('F jS, Y'); ?></span> <span class="dmbs-post-author"><?php the_author_posts_link(); ?></span>
        </div>

        <?php  if ( comments_open() ) : ?>
            <div class="col-sm-4 dmbs-post-comment-counter">
                <a href="<?php esc_url( the_permalink() ); ?>#comments"><?php comments_number(__('0'), __('1'), '%' . __(' Comments',devdmbootstrapTextDomain()) );?> <span class="fa fa-comment"></span></a>
            </div>
        <?php endif; ?>

    </div>

</div>