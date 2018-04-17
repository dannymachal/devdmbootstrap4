<?php if ( (is_single() || is_page()) && comments_open() ) : ?>

    <div class="dmbs-comments">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a name="comments"></a>

                    <?php if ( have_comments() ) : ?>

                        <h4 id="comments">
                            <span class="fa fa-comment"></span>
                            <?php comments_number('0 ' . __('Comments','devdmbootstrap4'), '1 ' . __('Comment','devdmbootstrap4'), '%' . __(' Comments','devdmbootstrap4') );?>
                        </h4>

                        <ul class="list-unstyled">

                            <?php
                                wp_list_comments( array(
                                    'style'         => 'ul',
                                    'short_ping'    => true,
                                    'avatar_size'   => '64',
                                    'walker'        => new devdmbootstrap_comment_walker(),
                                ) );
                            ?>

                            <?php paginate_comments_links(); ?>
                        </ul>

                    <?php endif; ?>

                    <hr class="dmbs-comments-separator">
                    <?php comment_form(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>