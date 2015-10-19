<?php if ( is_single() || is_page() && comments_open() ) : ?>

    <div class="dmbs-comments">

        <a name="comments"></a>

        <?php if ( have_comments() ) : ?>

            <h4 id="comments">
                <span class="fa fa-comment"></span>
                <?php comments_number('0 ' . __('Comments','devdmbootstrap4'), '1 ' . __('Comment','devdmbootstrap4'), '%' . __(' Comments','devdmbootstrap4') );?>
            </h4>

            <ul class="list-unstyled">

                <?php
                // Register Custom Comment Walker
                require_once(__DIR__ . '/../includes/class-wp-bootstrap-comment-walker.php');

                wp_list_comments( array(
                    'style'         => 'ul',
                    'short_ping'    => true,
                    'avatar_size'   => '64',
                    'walker'        => new Bootstrap_Comment_Walker(),
                ) );
                ?>

                <?php paginate_comments_links(); ?>
                <?php wp_enqueue_script( "comment-reply" ); ?>
            </ul>

        <?php endif; ?>

        <hr class="dmbs-comments-separator">

        <?php comment_form(); ?>

    </div>

<?php endif; ?>